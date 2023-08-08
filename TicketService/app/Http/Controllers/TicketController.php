<?php

namespace App\Http\Controllers;

use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function __construct(
        protected TicketService $ticketService,
    )
    {
        
    }
    /**
     * [Top] - Get data home page
     */
    public function ticketSlot (Request $request) {
        $response = $this->ticketService->getDataTicketSlot($request);
        return response()->json($response, 200);
    }

    public function bookingSlot (Request $request) {
        $response = $this->ticketService->insertBookingTicket($request);
        return response()->json($response, 200);
    }
}
