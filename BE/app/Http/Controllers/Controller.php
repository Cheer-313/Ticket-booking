<?php

namespace App\Http\Controllers;

use App\Repositories\CodeGroup\CodeGroupRepository;
use App\Services\BaseService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct(
        protected CodeGroupRepository $codeGroupRepository,
        protected BaseService $baseService,
    )
    {
        
    }

    public function SearchBar (Request $request) {
        $response = $this->baseService->getDataSearch($request);
        return response()->json($response, 200);
    }
}
