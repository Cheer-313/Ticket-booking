<?php
namespace App\Repositories\Code;

use App\Models\Code;
use App\Repositories\BaseRepository;
use Exception;

class CodeRepository extends BaseRepository implements CodeRepositoryInterface
{
    public function __construct(
        protected Code $code,
    )
    {
        parent::__construct($code);
    }

    public function findByCodeGroup(string $codeGroup)
    {
        $result = [];
        try {
            $query = $this->model
                ->where([
                    ['m_codes.code_group_code', $codeGroup],
                    ['m_codes.deleted_flag', 0]
                ])
                ->orderBy('m_codes.sort_no');
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}