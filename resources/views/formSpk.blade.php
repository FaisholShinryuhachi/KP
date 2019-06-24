@extends('layout.mylayout')

@section('title', 'Enol - Form Category SPK')
@section('pageHeader','Form Category SPK')


@section('breadcumb')
   <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">SPK</li>
          </ol>
@endsection

@section('content')
        
          <form action="{{ url('spk/proses') }}" method="POST">
            <div class="col-md-6 control-group">
              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Jumlah Stock</label>
                  <div class="col-sm-3">
                      <select name="stock" class="form-control" id="stock">
                            <option value="benefit">Benefit</option>
                            <option selected="selected" value="cost" >Cost</option>
                      </select>
                  </div>
                  <label for="bobot_stock" class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-3">
                      <input name="bobot_stock" type="number" class="form-control" id="bobot_stock" value="3" min="1" max="5">
                  </div>              
              </div>

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Jumlah Masuk</label>
                  <div class="col-sm-3">
                      <select name="masuk" class="form-control" id="stock">
                            <option value="benefit">Benefit</option>
                            <option selected="selected" value="cost">Cost</option>
                      </select>
                  </div>
                  <label for="bobot_masuk" class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-3">
                      <input name="bobot_masuk" type="number" class="form-control" id="bobot_masuk" value="2" min="1" max="5">
                  </div>              
              </div> 

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Jumlah Keluar</label>
                  <div class="col-sm-3">
                      <select name="keluar" class="form-control" id="stock">
                            <option selected="selected" value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                      </select>
                  </div>
                  <label for="bobot_keluar" class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-3">
                      <input name="bobot_keluar" type="number" class="form-control" id="bobot_keluar" value="4" min="1" max="5">
                  </div>              
              </div> 

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Biaya</label>
                  <div class="col-sm-3">
                      <select name="biaya" class="form-control" id="stock">
                            <option value="benefit">Benefit</option>
                            <option selected="selected" value="cost">Cost</option>
                      </select>
                  </div>
                  <label for="bobot_stock" class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-3">
                      <input name="bobot_biaya" type="number" class="form-control" id="bobot_biaya" value="3" min="1" max="5">
                  </div>              
              </div> 

              <div class="form-group row">
                <label for="stock" class="col-sm-3 col-form-label">Keuntungan</label>
                  <div class="col-sm-3">
                      <select name="keuntungan" class="form-control" id="stock">
                            <option selected="selected" value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                      </select>
                  </div>
                  <label for="bobot_stock" class="col-sm-3 col-form-label">Bobot</label>
                  <div class="col-sm-3">
                      <input name="bobot_keuntungan" type="number" class="form-control" id="bobot_keuntungan" value="5" min="1" max="5">
                  </div>              
              </div>
              <div class="form-group row">
                <label for="bulan" class="col-sm-3 col-form-label">Waktu</label>
                  <div class="col-sm-9">
                      <select name="bulan" class="form-control" id="bulan">
                            <option value="month">Bulan Ini</option>
                            <option value="all">Semua Data</option>
                      </select>
                  </div>
              </div>  
            </div>
                <button type="submit" class="btn btn-raised btn-primary pull-right col-sm-6">Proses</button> 
                {{csrf_field()}}

          </form>

@endsection