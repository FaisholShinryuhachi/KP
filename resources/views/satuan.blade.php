@extends('layout.mylayout')

@section('title', 'Enol - Data Satuan')
@section('pageHeader','Data Satuan')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Data Satuan</li>
          </ol>
@endsection
@section('content')
	<div class="row">
	<div class="col-md-6">
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Satuan</th>
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
	        ajax: '{{"/satuan/json"}}',
	        columns: [
	            { data: 'satuan', name: 'satuan' },
	            { data: 'action', name: 'action' },
	        ]
	    });
	});
	</script>
@endpush
