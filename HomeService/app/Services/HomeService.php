<?php

namespace App\Services;

use App\Repositories\Artist\ArtistRepository;
use App\Repositories\Code\CodeRepository;
use Exception;
use Illuminate\Http\Request;

class HomeService extends BaseService
{
    public function __construct(
        protected ArtistRepository $artistRepository,
        protected CodeRepository $codeRepository,
    )
    {
        
    }

    public function getDataHome(Request $request) 
    {
        $result = [];
        try {
            $listArtist = $this->artistRepository->getDataDisplayHome();
            $listCategory = $this->codeRepository->findByCodeGroup('CG0001');
            $listArtistModify = [];

            // Modify data
            foreach($listArtist as $data) {
                $data['artist_img'] = base64_encode($data['artist_img']);
                $listArtistModify[$data['category_code']]['category_code'] = $data['category_code'];
                $listArtistModify[$data['category_code']]['category_name'] = $data['category_name'];
                $listArtistModify[$data['category_code']]['list_artist'][] = $data;

            }
            $result = [
                'listArtist' => $listArtistModify,
                'listCategory' => $listCategory,
            ];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
