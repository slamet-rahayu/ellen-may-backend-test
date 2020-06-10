@extends('layouts.app')
@section('content')

<div style="margin: 10px;"  class="row">
 <div class="col-lg-10">
    <h4><b>Products</b></h4>
 </div>
 <div class="col-lg-2">
  <a href="{{ url('/admin/products/addproduct')}}" style="margin-left: 40%; color:white;" class="btn btn-success">Add Product</a>
 </div>
</div>
<div class="row" style="margin: 1px;">
 <div class="col-lg-12"> 
  <table class="table data-table">
    <thead>
     <tr>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
     </tr>
    </thead>
    <!-- <tbody>
     <tr>
      <td scope="row">123123123123</td>
      <td>L24 - Teayason Korean Liquid Lip</td>
      <td>Rp. 10000</td>
      <td>Edit | Hapus</td>
     </tr>
    </tbody> -->
  </table>
 </div>
</div>
<script type="text/javascript">
   $(function () {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.datatable') }}",
        columns: [
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('.data-table').on('click', '.btn-delete[data-remote]', function (e) { 
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = $(this).data('remote');
    // confirm then
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('.data-table').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});
  });
</script>
@endsection