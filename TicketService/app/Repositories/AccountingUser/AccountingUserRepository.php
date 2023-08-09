<?php
namespace App\Repositories\AccountingUser;

use App\Models\AccountingUser;
use App\Repositories\BaseRepository;
use Exception;

class AccountingUserRepository extends BaseRepository implements AccountingUserRepositoryInterface
{
    public function __construct(
        protected AccountingUser $accountingUser,
    )
    {
        parent::__construct($accountingUser);
    }

}