<?php

namespace App\Services;

use App\Repositories\AccountingUser\AccountingUserRepository;
use App\Repositories\Payment\PaymentRepository;
use App\Repositories\PaymentSlot\PaymentSlotRepository;
use App\Repositories\Slot\SlotRepository;
use App\Repositories\Ticket\TicketRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketService extends BaseService
{
    public function __construct(
        protected TicketRepository $ticketRepository,
        protected AccountingUserRepository $accountingUserRepository,
        protected PaymentRepository $paymentRepository,
        protected PaymentSlotRepository $paymentSlotRepository,
        protected SlotRepository $slotRepository,
    )
    {
        
    }

    public function getDataTicketSlot(Request $request) {
        $result = [];
        try {
            $ticketSlot = $this->ticketRepository->getDataTicketSlot($request['event_id']);

            $result = [
                'ticket_slot' => $ticketSlot ?? [],
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function insertBookingTicket(Request $request) {
        $result = [];
        try {
            DB::beginTransaction();

            $totalPrice = 0;
            $bookedSlot = [];
            $arrSlotId = [];
            foreach($request['ticket'] as $ticket) {
                if ($ticket['booked_slot'] > 0) {
                    $totalPrice += $ticket['booked_slot'] * $ticket['price'];
                    array_push($bookedSlot, [
                        'payment_id' => null,
                        'slot_id' => $ticket['id'],
                        'booked_slot' => $ticket['booked_slot'],
                    ]);
                    array_push($arrSlotId, $ticket['id']);
                }
            }
            $bookedSlot = $this->modifyValueToKey($bookedSlot, 'slot_id');
            // Check remaining slot before booking
            $totalSlotBooked = $this->paymentSlotRepository->getTotalSlotBooked($arrSlotId);
            $totalSlotBookMod = [];
            foreach($totalSlotBooked as $key => $slot) {
                $totalSlotBookMod[$slot['slot_id']][] = $slot;
                $totalSlotBookMod[$slot['slot_id']]['total_slot'] = $slot['total_slot'];

                if (!array_key_exists('booked_slot', $totalSlotBookMod[$slot['slot_id']])) {
                    $totalSlotBookMod[$slot['slot_id']]['booked_slot'] = 0;
                }
                $totalSlotBookMod[$slot['slot_id']]['booked_slot'] += $slot['booked_slot'];
            }
            $errMessage = [];
            foreach($totalSlotBookMod as $key => $slotBookMod) {
                if ($totalSlotBookMod[$key]['booked_slot'] + $bookedSlot[$key]['booked_slot'] > $totalSlotBookMod[$key]['total_slot']) {
                    $remainingSlot = $totalSlotBookMod[$key]['total_slot'] - $totalSlotBookMod[$key]['booked_slot'];
                    $seatName = $totalSlotBookMod[$key][0]['seat_name'];
                    $errMessage[] = "The $seatName ticket has only $remainingSlot available tickets";
                }
            }
            if (!empty($errMessage)) {
                return ['message' => $errMessage];
            }
            // Check available payment of user
            $userAccounting = $this->accountingUserRepository->findByCondition(['user_id' => $request['userId']])[0] ?? [];

            if (empty($userAccounting)) {
                return ['message' => ['Your account is not available!']];
            } elseif ($userAccounting['available_money'] < $totalPrice) {
                return ['message' => ['Your money is not enough to buy!']];
            }

            // Update user's money
            $dataUpdate = [
                'available_money' => $userAccounting['available_money'] - $totalPrice,
            ];
            $this->accountingUserRepository->update($dataUpdate, ['user_id' => $request['userId']]);

            // Insert booked ticket
            $paymentId = $this->paymentRepository->insertGetId([
                'user_id' => $request['userId'],
                'total_price' => $totalPrice,
                'payment_status' => 1, // Complete,
            ]);

            foreach($bookedSlot as $key => $slot) {
                $bookedSlot[$key]['payment_id'] = $paymentId;
            }
            $this->paymentSlotRepository->insert($bookedSlot);

            DB::commit();
            $result = [
                'status' => true,
                'payment_id' => $paymentId,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $result;
    }

    public function insertBookingTicketByChart(Request $request) {
        $result = [];
        try {
            DB::beginTransaction();
            $totalPrice = 0;
            $bookedSlot = [];
            $arrSlotId = [];
            // Find slot of event
            $slots = $this->slotRepository->findSlotIdByList($request['slot_ids']);
            $slots = $this->modifyValueToKey($slots, 'seat_name');
            $modifyTicket = collect($request['ticket'])->mapToGroups(function ($item, $key) {
                return [$item['category']['label'] => $item['id']];
            });
            foreach($modifyTicket as $key => $ticket) {
                $totalPrice += count($ticket) * $slots[$key]['price'];
                array_push($bookedSlot, [
                    'payment_id' => null,
                    'slot_id' => $slots[$key]['id'],
                    'booked_slot' => count($ticket),
                ]);
            }
            $bookedSlot = $this->modifyValueToKey($bookedSlot, 'slot_id');
            // Check available payment of user
            $userAccounting = $this->accountingUserRepository->findByCondition(['user_id' => $request['userId']])[0] ?? [];

            if (empty($userAccounting)) {
                return ['message' => ['Your account is not available!']];
            } elseif ($userAccounting['available_money'] < $totalPrice) {
                return ['message' => ['Your money is not enough to buy!']];
            }

            // Update user's money
            $dataUpdate = [
                'available_money' => $userAccounting['available_money'] - $totalPrice,
            ];
            $this->accountingUserRepository->update($dataUpdate, ['user_id' => $request['userId']]);

            // Insert booked ticket
            $paymentId = $this->paymentRepository->insertGetId([
                'user_id' => $request['userId'],
                'total_price' => $totalPrice,
                'payment_status' => 1, // Complete,
            ]);

            foreach($bookedSlot as $key => $slot) {
                $bookedSlot[$key]['payment_id'] = $paymentId;
            }
            $this->paymentSlotRepository->insert($bookedSlot);

            DB::commit();
            $result = [
                'status' => true,
                'payment_id' => $paymentId,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $result;
    }
}
