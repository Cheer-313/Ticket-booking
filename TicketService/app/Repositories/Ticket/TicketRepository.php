<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\BaseRepository;
use Exception;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{
    public function __construct(
        protected Ticket $ticket,
    )
    {
        parent::__construct($ticket);
    }

    public function getDataTicketSlot($eventId)
    {
        $result = [];
        try {
            $query = $this->model
                ->select([
                    't_slots.*',
                ])
                ->leftJoin('t_slots', function ($join) {
                    $join->on('t_slots.ticket_id', 't_tickets.id')
                        ->where('t_slots.deleted_flag', 0);
                })
                ->where('t_tickets.deleted_flag', 0)
                ->where('t_tickets.event_id', $eventId)
                ->orderBy('t_slots.sort_no');
                // $sql = str_replace(array('?'), array('\'%s\''), $query->toSql());
                // $sql = vsprintf($sql, $query->getBindings());
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}