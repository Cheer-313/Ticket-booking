<?php
namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    public function __construct(
        protected Event $event,
    )
    {
        parent::__construct($event);
    }
}