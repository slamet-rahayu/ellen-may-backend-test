@extends('layouts.app')
@section('content')
 <div style="margin: 10px">
  <h4><b>Order Information</b></h4>
  <h4><b>{{$order_info->code}} - {{$order_info->name}}</b></h4>
  <h4><b>Rp. {{$order_info->price}}</b></h4>
  <h4><b>Qty: 1</b></h4>
  <br />
  <h4>Customer Information</h4>
  <br />
  <form role="form" action="{{ route('customer.processorder')}}" method="POST">
   @csrf
   <input type="hidden" name="qty" value="1" />
   <input type="hidden" name="product_id" value="{{$order_info->id}}" />
    <div class="row">
     <div class="col-lg-6">
      <div class="form-group">
       <label>Name</label>
       <input class="form-control" type="text" name="customer_name" placeholder="name" />
      </div>
      <div class="form-group">
       <label>Phone</label>
       <input class="form-control" type="text" name="phone" placeholder="phone" />
      </div>
      <div class="form-group">
       <label>Address</label>
       <textarea class="form-control" name="address" style="resize: none" placeholder="address"></textarea>
      </div>
      <div class="form-group">
       <button type="submit" class="btn btn-md btn-success btn-block">Beli</button>
      </div>
     </div>
     <div class="col-lg-6">
     @if ($errors->any())
     <div>
     <h4 style="color: red;">Error!<b></b></h4>
     <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
     </div>
    @endif
     </div>
    </div>
  </form>
 </div>

@endsection