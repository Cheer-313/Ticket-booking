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
}