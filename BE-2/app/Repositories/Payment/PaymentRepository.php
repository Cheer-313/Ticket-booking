<?php
namespace App\Repositories\Payment;

use App\Models\Payment;
use App\Repositories\BaseRepository;
use Exception;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    public function __construct(
        protected Payment $payment,
    )
    {
        parent::__construct($payment);
    }
}