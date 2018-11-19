@extends('layout.mylayout')

@section('title', 'Enol - Edit Category')
@section('pageHeader','Edit Category')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
@endsection

@section('content')

          <form action="{{ url('category/update') }}" method="POST">
               <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
          <label for="id" class="col-sm-4 col-form-label">Id</label>
          <div class="col-sm-8">
            <input readonly="true" name="id" type="text" class="form-control" id="id" value="{{$category->id_category}}">
          </div>
        </div> 
          	  <div class="form-group row">
			    <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
			    <div class="col-sm-8">
			      <input name="category" type="text" class="form-control" id="inputCategory" placeholder="Category Baru" value="{{$category->category_name}}">
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
        </div>

@endsection