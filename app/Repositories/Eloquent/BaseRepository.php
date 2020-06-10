<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use DB;

class BaseRepository implements BaseRepositoryInterface
{
    private $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findOne($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        DB::beginTransaction();
        try {
          $created = $this->model->create($attributes);
        DB::commit();
        } catch (\Exception $e) {
        DB::rollback();
          throw $e;
        }
        return $created;
    }

    public function update($id, $attributes)
    {
        DB::beginTransaction();
        try {
            $find = $this->model->find($id);
            $find->update($attributes);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return $find;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $deleted = $this->model->find($id)->delete($id);
            DB::commit();
        } catch (\Exception $e) {
            throw $e;
        }
        return $deleted;
    }
}