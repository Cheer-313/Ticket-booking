<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct(
        protected HomeService $homeService,
    )
    {
        
    }
    /**
     * [Top] - Get data home page
     */
    public function index (Request $request) {
        $response = $this->homeService->getDataHome($request);
        return response()->json($response, 200);
    }
}
