<?php
namespace App\Repositories\Venue;

use App\Models\Venue;
use App\Repositories\BaseRepository;
use Exception;

class VenueRepository extends BaseRepository implements VenueRepositoryInterface
{
    public function __construct(
        protected Venue $venue,
    )
    {
        parent::__construct($venue);
    }
}