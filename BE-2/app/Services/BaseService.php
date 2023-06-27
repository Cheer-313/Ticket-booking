<?php

namespace App\Services;

use App\Repositories\Artist\ArtistRepository;
use App\Repositories\Code\CodeRepository;
use App\Repositories\Event\EventRepository;
use App\Repositories\Venue\VenueRepository;
use Exception;
use Illuminate\Http\Request;

class BaseService
{
    public function __construct(
        protected ArtistRepository $artistRepository,
        protected EventRepository $eventRepository,
        protected VenueRepository $venueRepository,
        protected CodeRepository $codeRepository,
    )
    {
        
    }

    public function getDataSearch(Request $request) {
        $result = [];
        try {
            $searchParam = $request['search_param'] ?? '';

            $searchArtist = $this->artistRepository->findByCondition([
                ['artist_name', 'like', "%$searchParam%"],
                ['deleted_flag', 0],
            ]);
            $searchEvent = $this->eventRepository->findByCondition([
                ['event_name', 'like', "%$searchParam%"],
                ['deleted_flag', 0],
            ]);
            $searchVenue = $this->venueRepository->findByCondition([
                ['venue_name', 'like', "%$searchParam%"],
                ['deleted_flag', 0],
            ]);

            // Conver image from binary to hex
            foreach ($searchArtist as $key => $artist) {
                $artist['artist_img'] = base64_encode($artist['artist_img']);
                $artist['item_label'] = $artist['artist_name'];
                $searchArtist[$key] = $artist;
            }
            $resultArtist = [
                'group_label' => 'Artist',
                'items' => $searchArtist ?? [],
            ];
            foreach ($searchVenue as $key => $venue) {
                $venue['venue_img'] = base64_encode($venue['venue_img']);
                $venue['item_label'] = $venue['venue_name'];
                $searchVenue[$key] = $venue;
            }
            $resultVenue = [
                'group_label' => 'Venue',
                'items' => $searchVenue ?? [],
            ];
            foreach ($searchEvent as $key => $event) {
                $event['event_img'] = base64_encode($event['event_img']);
                $event['item_label'] = $event['event_name'];
                $searchEvent[$key] = $event;
            }
            $resultEvent = [
                'group_label' => 'Event',
                'items' => $searchEvent ?? [],
            ];
            $result = [$resultArtist, $resultVenue, $resultEvent];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function modifyValueToKey($arr, $key) {
        $result = [];
        foreach($arr as $item) {
            $result[$item[$key]] = $item;
        }
        return $result;
    }

    public function modifyDataHaveImage($listData, $listKeyImg) {
        $result = [];
        try {
            foreach($listData as $key => $data) {
                foreach ($listKeyImg as $keyImg) {
                    if (!empty($data[$keyImg])) {
                        $data[$keyImg] = base64_encode($data[$keyImg]);
                    }
                    $listData[$key] = $data;
                }
            }
            $result = $listData;
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
