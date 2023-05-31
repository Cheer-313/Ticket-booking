<?php
namespace App\Repositories\CodeGroup;

use App\Models\CodeGroup;
use App\Repositories\BaseRepository;

class CodeGroupRepository extends BaseRepository implements CodeGroupRepositoryInterface
{
    public function __construct(
        protected CodeGroup $codeGroup,
    )
    {
        parent::__construct($codeGroup);
    }

    public function getCodeGroup()
    {
        return $this->model->get()->toArray();
    }
}