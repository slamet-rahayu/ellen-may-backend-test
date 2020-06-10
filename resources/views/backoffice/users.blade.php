@extends('layouts.app')
@section('content')

<div style="margin: 10px;"  class="row">
 <div class="col-lg-10">
    <h4><b>Products</b></h4>
 </div>
</div>
<div class="row" style="margin: 1px;">
 <div class="col-lg-12"> 
  <table class="table data-table">
    <thead>
     <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
     </tr>
    </thead>
  </table>
 </div>
</div>
<script type="text/javascript">
   $(function () {
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.datatable') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
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