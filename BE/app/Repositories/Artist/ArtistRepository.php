<?php
namespace App\Repositories\Artist;

use App\Models\Artist;
use App\Repositories\BaseRepository;
use Exception;

class ArtistRepository extends BaseRepository implements ArtistRepositoryInterface
{
    public function __construct(
        protected Artist $Artist,
    )
    {
        parent::__construct($Artist);
    }

    public function getDataDisplayHome()
    {
        $result = [];
        try {
            $query = $this->model
                ->select([
                    'm_artists.*',
                    'code_category.code as category_code',
                    'code_category.code_name as category_name',
                    'code_genre.code as genre_code',
                    'code_genre.code_name as genre_name',
                ])
                ->leftJoin('m_genres', function ($join) {
                    $join->on('m_artists.artist_type', 'm_genres.genre_code')
                        ->where('m_genres.deleted_flag', 0);
                })
                ->leftJoin('m_codes as code_category', function ($join) {
                    $join->on('code_category.code', 'm_genres.category_code')
                        ->where('code_category.code_group_code', 'CG0001');
                })
                ->leftJoin('m_codes as code_genre', function ($join) {
                    $join->on('code_genre.code', 'm_genres.genre_code')
                        ->where('code_genre.code_group_code', 'CG0002');
                })
                ->where('m_artists.deleted_flag', 0)
                ->orderBy('code_category.sort_no')
                ->orderBy('code_genre.sort_no');
                // $sql = str_replace(array('?'), array('\'%s\''), $query->toSql());
                // $sql = vsprintf($sql, $query->getBindings());
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}