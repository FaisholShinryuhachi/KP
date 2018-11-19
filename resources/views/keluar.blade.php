@extends('layout.mylayout')

@section('title', 'Enol - Data Kealuar')
@section('pageHeader','Pilih Customer')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Data Customer</li>
          </ol>
@endsection
@section('content')
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Nama Customer</th>
                <th>Vendor</th>
                <th>CP</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Alamat</th>
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
	        ajax: '{{"/keluar/json"}}',
	        columns: [
	            { data: 'customer_name', name: 'customer_name' },
	            { data: 'vendor', name: 'vendor' },
	            { data: 'cp', name: 'cp' },
	            { data: 'provinsi_name', name: 'provinsi_name' },
	            { data: 'kabupaten_name', name: 'kabupaten_name' },
	            { data: 'alamat', name: 'alamat' },
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ]
	    });
	});
	</script>
	@endpush
