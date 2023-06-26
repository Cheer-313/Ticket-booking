<?php

namespace App\Services;

use App\Repositories\Ticket\TicketRepository;
use Exception;
use Illuminate\Http\Request;

class TicketService extends BaseService
{
    public function __construct(
        protected TicketRepository $ticketRepository,
    )
    {
        
    }

    public function getDataTicketSlot(Request $request) {
        $result = [];
        try {
            $ticketSlot = $this->ticketRepository->getDataTicketSlot($request['event_id']);

            $result = [
                'ticket_slot' => $ticketSlot ?? [],
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
