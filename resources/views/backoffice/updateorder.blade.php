@extends('layouts.app')
@section('content')

<div style="margin: 10px;"  class="row">
 <div class="col-lg-12">
    <h4><b>Update Order</b></h4>
 </div>
</div>
<div style="margin: 10px;" class="row">
 <div class="col-lg-12">
  <form role="form" action="{{ route('orders.update', $data->id)}}" method="post">
  @csrf
  @method('PUT')
  <input type="hidden" name="id" value="{{$data->id}}" />
   <div class="form-group">
    <label>Name</label>
    <input value="{{$data->customer_name}}" type="text" name="customer_name" class="form-control" />
   </div>
   <div class="form-group">
    <label>Phone</label>
    <input value="{{$data->phone}}" type="number" name="phone" class="form-control" />
   </div>
   <div class="form-group">
    <label>Address</label>
    <input value="{{$data->address}}" type="text" style="resize: none;" name="address" class="form-control" />
   </div>
   <button type="submit" class="btn btn-success btn-block">Save</button>
  </form>
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
@endsection