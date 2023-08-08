<?php

namespace App\Http\Controllers;

use App\Services\DetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DetailController extends Controller
{
    public function __construct(
        protected DetailService $detailService,
    )
    {
        
    }
    /**
     *  Get data for event detail
     */
    public function event (Request $request) {
        $response = $this->detailService->getDataDetailEvent($request);
        return response()->json($response, 200);
    }

    /**
     *  Get data for artist detail
     */
    public function artist (Request $request) {
        $response = $this->detailService->getDataDetailArist($request);
        return response()->json($response, 200);
    }
}
