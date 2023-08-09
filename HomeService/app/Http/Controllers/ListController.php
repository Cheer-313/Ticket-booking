<?php

namespace App\Http\Controllers;

use App\Services\ListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListController extends Controller
{
    public function __construct(
        protected ListService $listService,
    )
    {
        
    }
    
    public function list (Request $request, string $search = null) {
        $response = $this->listService->getDataSearchList($request, $search);
        return response()->json($response, 200);
    }
}
