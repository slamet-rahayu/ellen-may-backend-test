@extends('layouts.app')
@section('content')

<div style="margin: 10px;"  class="row">
 <div class="col-lg-12">
    <h4><b>Add Products</b></h4>
 </div>
</div>
<div style="margin: 10px;" class="row">
 <div class="col-lg-12">
  <form role="form" action="{{ route('products.store')}}" method="post">
  @csrf
   <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" />
   </div>
   <div class="form-group">
    <label>Price</label>
    <input type="number" name="price" class="form-control" />
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