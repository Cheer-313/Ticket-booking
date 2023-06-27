<?php
namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;
use Exception;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    public function __construct(
        protected Event $event,
    )
    {
        parent::__construct($event);
    }

    public function getListEventByCondition($code, $search) {
        $result = [];
        try {
            $query = $this->model
                ->select([
                    't_events.*',
                    'code_category.code as category_code',
                    'code_category.code_name as category_name',
                    'code_genre.code as genre_code',
                    'code_genre.code_name as genre_name',
                ])
                ->leftJoin('m_genres', function ($join) {
                    $join->on('t_events.genre_id', 'm_genres.id')
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
                ->where('t_events.deleted_flag', 0);
                
                if ($code != null) {
                    $query->where('code_category.code', $code);
                } elseif ($search != null) {
                    $query->where('t_events.event_name', 'LIKE', "%$search%");
                }

                $query->orderBy('code_category.sort_no')
                    ->orderBy('code_genre.sort_no');
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getListEventBySearchName($search)
    {
        $result = [];
        try {
            $query = $this->model
                ->select([
                    't_events.*',
                    'code_category.code as category_code',
                    'code_category.code_name as category_name',
                    'code_genre.code as genre_code',
                    'code_genre.code_name as genre_name',
                ])
                ->leftJoin('m_genres', function ($join) {
                    $join->on('t_events.genre_id', 'm_genres.id')
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
                ->where('t_events.deleted_flag', 0)
                ->where('t_events.event_name', 'LIKE', "%$search%")
                ->orderBy('code_category.sort_no')
                ->orderBy('code_genre.sort_no');
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function getDetailEvent($id) {
        $result = [];
        try {
            $select = [
                't_events.id',
                't_events.venue_id',
                't_events.genre_id',
                't_events.event_name',
                't_events.event_date',
                't_events.start_time',
                't_events.end_time',
                't_events.event_img',
                't_events.event_description',
                'm_venues.venue_name',
                'm_venues.address',
                'm_venues.post_code',
                'm_venues.venue_img',
            ];
            $query = $this->model->select($select)
                    ->leftJoin('m_venues', function ($join) {
                        $join->on('m_venues.id', 't_events.venue_id')
                            ->where('m_venues.deleted_flag', 0);
                    })
                    ->where([
                        ['t_events.id', $id],
                        ['t_events.deleted_flag', 0],
                    ]);
            // $sql = str_replace(array('?'), array('\'%s\''), $query->toSql());
            // $sql = vsprintf($sql, $query->getBindings());
            $result = $query->get()->toArray() ?? [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}