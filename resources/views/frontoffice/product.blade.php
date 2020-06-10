@extends('layouts.app')
@section('content')
<div class="row">
 <div class="col-lg-12">
  <h1 style="margin-left: 3%;">Produk</h1>
 </div>
</div>
<div class="row">
<div class="col-lg-12 content-container">
@foreach($product as $value)
  <div class="card card-content">
   <img class="card-img-top" src={{$value->picture}} alt="Card image cap">
    <div class="card-body">
      <h5>{{$value->code}} - {{$value->name}}</h5>
      <h5>Rp. {{$value->price}}</h5>
      <a href="{{ url('/customer/orders/'.$value->id) }}" style="color: white" class="btn btn-block btn-md btn-success">Beli</a>
    </div>
  </div>
@endforeach
</div>
</div>
@endsection