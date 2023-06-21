<?php

namespace App\Services;

use App\Repositories\Artist\ArtistRepository;
use App\Repositories\Code\CodeRepository;
use App\Repositories\Event\EventRepository;
use Exception;
use Illuminate\Http\Request;

class ListService extends BaseService
{
    public function __construct(
        protected ArtistRepository $artistRepository,
        protected CodeRepository $codeRepository,
        protected EventRepository $eventRepository,
    )
    {
        
    }

    public function getDataSearchList(Request $request, $search) 
    {
        $result = [];
        try {
            if ($request['code'] != null) { // Case view all on home page
                $condition = [
                    'code' => $request['code'],
                    'search' => null,
                ];
            } else if ($search != null) { // Case search on header without code
                $search = str_replace('-', ' ', $search);
                $condition = [
                    'code' => null,
                    'search' => $search,
                ];
            } else { // Another case
                $condition = [
                    'code' => null,
                    'search' => null,
                ];
            }

            // Get list artist
            $listArtist = $this->artistRepository->getListArtistByCondition($condition['code'], $condition['search']);
            $listArtist = $this->modifyDataHaveImage($listArtist, 'artist_img');

            //Get list event
            $listEvent = $this->eventRepository->getListEventByCondition($condition['code'], $condition['search']);
            $listEvent = $this->modifyDataHaveImage($listEvent, 'event_img');
            $result = [
                'artist' => $listArtist ?? [],
                'event' => $listEvent ?? [],
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function modifyDataHaveImage($listData, $keyImg) {
        $result = [];
        try {
            foreach($listData as $key => $data) {
                $data[$keyImg] = base64_encode($data[$keyImg]);
                $listData[$key] = $data;
            }
            $result = $listData;
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
