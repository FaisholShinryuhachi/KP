@extends('layout.mylayout')

@section('title', 'Enol - Hapus Category')
@section('pageHeader','Confirm Hapus Category')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Hapus Category</li>
          </ol>
@endsection

@section('content')

          <form action="{{ url('category/delete') }}" method="POST">
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
			      <input readonly="true" name="category" type="text" class="form-control" id="inputCategory" placeholder="Category Baru" value="{{$category->category_name}}">
			    </div>
			  </div> 
              <button type="submit" class="btn btn-raised btn-danger pull-right col-md-12">Hapus</button>
            {{csrf_field()}}
          </form>
           </div>
        </div>

@endsection