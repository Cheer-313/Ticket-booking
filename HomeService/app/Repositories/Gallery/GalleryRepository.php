<?php
namespace App\Repositories\Gallery;

use App\Models\Gallery;
use App\Repositories\BaseRepository;
use Exception;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    public function __construct(
        protected Gallery $gallery,
    )
    {
        parent::__construct($gallery);
    }
}