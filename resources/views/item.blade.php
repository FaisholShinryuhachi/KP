@extends('layout.mylayout')

@section('title', 'Enol - Data Item')
@section('pageHeader','Data Item')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Data Item</li>
          </ol>
@endsection
@section('content')
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Nama Product</th>
                <th>Stock</th>
                <th>Satuan</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
	<script>
	$(function() {
	    $('#users-table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{"/item/json"}}',
	        columns: [
	            { data: 'name', name: 'name' },
	            { data: 'stock', name: 'stock' },
	            { data: 'satuan', name: 'satuan' },
	            { data: 'category_name', name: 'category_name' },
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ]
	    });
	});
	</script>
	@endpush
