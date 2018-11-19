@extends('layout.mylayout')

@section('title', 'Enol - Data Category')
@section('pageHeader','Data Category')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Data Category</li>
          </ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-6">
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Nama Category</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>
@endsection

@push('scripts')
	<script>
	$(function() {
	    $('#users-table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{"/category/json"}}',
	        columns: [
	            { data: 'category_name', name: 'category_name' },
	            { data: 'action', name: 'action' }
	        ]
	    });
	});
	</script>
	@endpush
