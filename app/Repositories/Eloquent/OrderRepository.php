<?php

namespace App\Repositories\Eloquent;

use App\Order;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use DataTables;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    private $model;

    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function data_table()
    {
        $data = $this->model->all();     

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('action', function($data){
                $btn = '<a href="/admin/orders/update/'.$data->id.'" > Edit </a> | <button class="btn-delete" data-remote="'.route('orders.delete', $data->id).'"> Delete </button>';
                return $btn;
        })
        ->addColumn('product',function($data){
            $data = $data->Product->name;
            return $data;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}