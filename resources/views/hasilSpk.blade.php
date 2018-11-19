@extends('layout.mylayout')

@section('title', 'Enol - Data Hasil DSS')
@section('pageHeader','Data Hasil DSS')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Data Hasil DSS</li>
          </ol>
@endsection
@section('content')
	<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
            	<th>Nilai Preferensi</th>
                <th>Nama Product</th>
                <th>Stock</th>
                <th>Satuan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Keuntungan</th>
                <th>Biaya</th>
                <th>Category</th>
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
	        order: [ [0, 'desc'] ],
	        ajax: '{{"/spk/json"}}',
	        columns: [
	        	{ data: 'v', name: 'v'  },
	            { data: 'name', name: 'name' },
	            { data: 'stock', name: 'stock' },
	            { data: 'satuan', name: 'satuan' },
	            { data: 'masuk', name: 'masuk' },
	            { data: 'keluar', name: 'keluar' },
	            { data: 'keuntungan', name: 'keuntungan' },
	            { data: 'biaya', name: 'biaya' },
	            { data: 'category_name', name: 'category_name' }
	        ]
	    });
	});
	</script>
	@endpush
