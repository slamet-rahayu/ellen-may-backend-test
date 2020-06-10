@extends('layouts.app')
@section('content')
<div class="row">
 <div style="margin: 10px" class="col-lg-12">
  <h4>Success!</h4>
  <h4>Order No: {{$inserted->order_no}}</h4>
  <h4>Produk Name: {{$product_data->code}} - {{$product_data->name}}</h4>
  <h4>Qty: {{$inserted->qty}}pcs</h4>
  <h4>Total: Rp. {{$inserted->total}}</h4>
 </div>
</div>
@endsection