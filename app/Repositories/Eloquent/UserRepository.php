<?php

namespace App\Repositories\Eloquent;

use App\User;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use DataTables;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function data_table()
    {        

        $data = $this->model->all();     

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('action', function($data){
            $btn = '<a href="/admin/users/update/'.$data->id.'" > Edit </a> | <button class="btn-delete" data-remote="'.route('users.delete', $data->id).'"> Delete </button>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}