<?php
namespace App\Repositories\PaymentSlot;

use App\Models\PaymentSlot;
use App\Repositories\BaseRepository;
use Exception;

class PaymentSlotRepository extends BaseRepository implements PaymentSlotRepositoryInterface
{
    public function __construct(
        protected PaymentSlot $paymentSlot,
    )
    {
        parent::__construct($paymentSlot);
    }

    public function getTotalSlotBooked($slotId)
    {
        $result = [];
        try {
            $query = $this->model
                ->select([
                    't_slots.seat_name',
                    't_slots.total_slot',
                    't_payment_slot.slot_id',
                    't_payment_slot.booked_slot',
                ])
                ->leftJoin('t_slots', 't_slots.id', 't_payment_slot.slot_id')
                ->whereIn('t_payment_slot.slot_id', $slotId)
                ->where('t_payment_slot.deleted_flag', 0);

            $result = !empty($query->exists()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}