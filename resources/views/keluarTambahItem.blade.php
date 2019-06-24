@extends('layout.mylayout')

@section('title', 'Enol - Tambah Item Keluar')
@section('pageHeader','Tambah Item Keluar')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Keluar</li>
          </ol>
@endsection

@section('content')
       
          <form action="{{ url('keluar/savedata') }}" method="POST">

          <div class="col-md-6">
            <div class="form-group row">
              <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-5">
                  <input readonly="true" type="text" class="form-control" id="inputNama" placeholder="{{$customer->customer_name}}">
              </div>
              <label for="id_customer" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-2">
                  <input readonly="true" name="id_customer" type="text" class="form-control" id="id_customer" value="{{$customer->id_customer}}">
              </div>
            </div> 
          </div>

            <div class="copy-fields">
            <div class="col-md-6 control-group">
              <div class="form-group row">
                <label for="keluar" class="col-sm-2 col-form-label">Item</label>
            			<div class="col-sm-5">
                      <select name="keluar[]" class="form-control" id="keluar">
                          @foreach ($item as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                      </select>
            			</div>
                  <div class="col-sm-3">
                      <input name="jumlah[]" type="number" class="form-control" id="inputStock" placeholder="Jumlah" min="1">
                  </div>
                  <div class="col-sm-2">
                      <button type="submit" class="btn btn-raised btn-danger pull-right remove">Delete</button> 
                  </div>
              </div> 
            </div>
          </div>
            <div class="after-add-more"></div>
                <button type="submit" class="btn btn-raised btn-primary pull-right">Simpan</button> 
                <button type="button" class="btn btn-raised btn-succses pull-right add-more">Add</button>
                {{csrf_field()}}

          </form>
@section('javascript')
<script type="text/javascript">
 $(document).ready(function() {

          $(".add-more").click(function(){ 

              var html = $(".copy-fields").html();

              $(".after-add-more").after(html);

          });

          $("body").on("click",".remove",function(){ 

              $(this).parents(".control-group").remove();

          });


          });
 </script>
@endsection
          

@endsection