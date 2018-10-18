@extends('coba')
 
@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stock</th>
                <th>Satuan</th>
                <th>Category At</th>
            </tr>
        </thead>
    </table>
@stop
 
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
            { data: 'category_name', name: 'category' }
        ]
    });
});
</script>
@endpush