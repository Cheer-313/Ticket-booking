<?php

namespace App\Services;

use App\Repositories\AccountingUser\AccountingUserRepository;
use App\Repositories\Payment\PaymentRepository;
use App\Repositories\PaymentSlot\PaymentSlotRepository;
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
            foreach($request['ticket'] as $ticket) {
                if ($ticket['booked_slot'] > 0) {
                    $totalPrice += $ticket['booked_slot'] * $ticket['price'];
                    array_push($bookedSlot, [
                        'payment_id' => null,
                        'slot_id' => $ticket['id'],
                        'booked_slot' => $ticket['booked_slot'],
                    ]);
                }
            }

            // Check remaining slot before booking

            // Check available payment of user
            $userAccounting = $this->accountingUserRepository->findByCondition(['user_id' => $request['userId']])[0] ?? [];

            if (empty($userAccounting)) {
                return ['message' => 'Your account is not available!'];
            } elseif ($userAccounting['available_money'] < $totalPrice) {
                return ['message' => 'Your money is not enough to buy!'];
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
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $result;
    }
}
