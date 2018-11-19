@extends('layout.mylayout')

@section('title', 'Enol - New Category')
@section('pageHeader','Form Tambah Category')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">New Category</li>
          </ol>
@endsection

@section('content')

          <div class="row">
            <div class="col-md-6">
          <form action="{{ url('category/save') }}" method="POST">
          	  <div class="form-group row">
			    <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
			    <div class="col-sm-8">
			      <input name="category" type="text" class="form-control" id="inputCategory" placeholder="Category Baru" value="{{old('category')}}">
            @if($errors->has('category'))
                <small class="form-text text-muted" >
                Category Tidak Boleh Kosong
            </small>
          @endif
			    </div>
			  </div> 
              <button type="submit" class="btn btn-raised btn-primary pull-right col-md-12">Simpan</button>
            {{csrf_field()}}
          </form>
           </div>
            <div class="col-md-6">
            <table class="table table-bordered" id="users-table">
              <thead>
                <tr>
                    <th>Category</th>
                    <th>Waktu Pembuatan</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

@push('scripts')
  <script>
  $(function() {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
           order: [ [1, 'desc'] ],
          ajax: '{{"/category/json-form"}}',
          columns: [
              { data: 'category_name', name: 'category_name' },
              { data: 'created_at', name: 'created_at' },
          ]
      });
  });
  </script>
@endpush

@endsection