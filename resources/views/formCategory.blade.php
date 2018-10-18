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

          <form>
          	<div class="col-md-6">
          	  <div class="form-group row">
			    <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputCategory" placeholder="Category Baru">
			    </div>
			  </div> 
            <a class="btn btn-primary btn-block" href="login.html">Tambah</a>
        </div>
          </form>
          

@endsection