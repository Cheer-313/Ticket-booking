<?php

namespace App\Services;

use App\Repositories\Artist\ArtistRepository;
use App\Repositories\Code\CodeRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\Gallery\GalleryRepository;
use Exception;
use Illuminate\Http\Request;

class DetailService extends BaseService
{
    public function __construct(
        protected ArtistRepository $artistRepository,
        protected CodeRepository $codeRepository,
        protected EventRepository $eventRepository,
        protected GalleryRepository $galleryRepository,
    )
    {
        
    }

    public function getDataDetailEvent(Request $request) {
        $result = [];
        try {
            $eventDetail = $this->eventRepository->getDetailEvent($request['event_id']);
            $eventDetail = $this->modifyDataHaveImage($eventDetail, ['event_img', 'venue_img']);

            $result = [
                'event_detail' => $eventDetail ?? [],
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getDataDetailArist(Request $request) {
        $result = [];
        try {
            $artistDetail = $this->artistRepository->getDetailArtist($request['artist_id']);
            $artistDetail = $this->modifyDataHaveImage($artistDetail, ['artist_img']);

            $artistGallery = $this->galleryRepository->findByCondition([
                ['m_galleries.artist_id', $request['artist_id']],
                ['m_galleries.deleted_flag', 0],
            ]);
            $artistGallery = $this->modifyDataHaveImage($artistGallery, ['gallery_img']);
            $result = [
                'artist_detail' => $artistDetail ?? [],
                'artist_galerry' => $artistGallery ?? [],
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
