<?php
namespace App\Repositories\Slot;

use App\Models\Slot;
use App\Repositories\BaseRepository;
use Exception;

class SlotRepository extends BaseRepository implements SlotRepositoryInterface
{
    public function __construct(
        protected Slot $slot,
    )
    {
        parent::__construct($slot);
    }

    public function findSlotIdByList ($slotIds) {
        $result = [];
        try {
            $query = $this->model
                ->whereIn('t_slots.id', $slotIds)
                ->where('t_slots.deleted_flag', 0);

            $result = $query->exists() ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}