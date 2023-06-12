<?php

namespace App\Http\Controllers;

use App\Repositories\CodeGroup\CodeGroupRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct(
        protected CodeGroupRepository $codeGroupRepository
    )
    {
        
    }
}
