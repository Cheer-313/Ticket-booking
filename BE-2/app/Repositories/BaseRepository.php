<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($data, $condition)
    {
        $result = [];
        try {
            $result = $this->model->where($condition)->update($data);
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function findByCondition($condition) {
        $result = [];
        try {
            $query = $this->model->where($condition);
            $result = !empty($query->get()) ? $query->get()->toArray() : [];
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function insertGetId($data) {
        $result = [];
        try {
            $result = $this->model->insertGetId($data);
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }

    public function insert($data) {
        $result = [];
        try {
            $result = $this->model->insert($data);
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}