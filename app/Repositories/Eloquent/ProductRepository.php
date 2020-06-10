<?php

namespace App\Repositories\Eloquent;

use App\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use DataTables;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function data_table()
    {   
        $data = $this->model->all();     

        return DataTables::of($data)->addIndexColumn()
        ->addColumn('action', function($data){
                $btn = '<a href="/admin/products/update/'.$data->id.'" > Edit </a> | <button class="btn-delete" data-remote="'.route('products.delete', $data->id).'"> Delete </button>';
                return $btn;
        })
        ->addColumn('price',function($data){
            $data = "Rp. ".number_format($data->price,2);
            return $data;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}