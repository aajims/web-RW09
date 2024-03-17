<style type="text/css">
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
@extends('layouts.master')

@section('content')
<div class="container">
      <div class="row">
     <br />
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   		
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $user->nama_lengkap }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                  <table id="dynamic-table" class="table table-user-information">
                    <tbody>
                       <tr>
                          <td><strong>Data Pengguna</stong></td>
                        <td><input type="hidden" name="id" value="{{ $user->id }}"> </td>
                      </tr>                      
                      <tr>
                        <td>Nama Lengkap</td>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                      </tr>   
                      <tr>
                        <td>Role User</td>
                        <td>{{ $user->role }}</td>
                      </tr>            
                    </tbody>
                  </table> 
                  <form role="form" method="post" enctype="multipart/form-data" action="{{ url('change-password') }}">
                    {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Password Lama</label>
                      <input type="password" name="current_password" class="form-control"  placeholder="Input Password Lama">
                      <span class="text-danger">{{ $errors->first('current_password') }}</span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Password Baru</label>
                      <input type="password" name="new_password" class="form-control"  placeholder="Input Password Baru">
                      <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" name="new_password" class="form-control"  placeholder="Input konfirmasi Password">
                      <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    </div>
                  </div>
                  <br />
                  <div class="btn-profil">
                    <button type="submit" class="btn btn-success"> Update Password </button>
                  </div>
                </div>   
              </form>            
              </div>
            </div>
             <div class="panel-footer">                        
            </div>            
          </div>
        </div>
      </div>
    </div>
    @endsection
<script type="text/javascript">

  </script>
  