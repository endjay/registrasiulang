@extends('pendaftaran.master')

@section('content')
	
	 <a  href="{{URL::to('/peserta')}}" class="btn btn-primary pull-right"> Terdaftar <i class="badges">{{$total}}</i> </a>
        
        <h2>Pendaftaran Baru</h2>
        
       
      </div>
	
	@if (Session::has('alert_message'))
		


	<div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      {{Session::get('alert_message')}}
    </div>

    @endif

    @if (Session::has('success_message'))
	<div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      {{Session::get('success_message')}}
    </div>
    @endif
	<form role="form" method="post" action="post/register_baru">
		  <div class="form-group">
		    <label for="t_nama">Nama</label>
		    <input  @if(Session::has('data'))value="{{Session::get('data')['nama']}}" @endif name="nama" type="text" class="form-control " id="t_nama" placeholder="Masukan Nama">
		  </div>
		  <div class="form-group">
		    <label for="t_email">Email</label>
		    <input  @if(Session::has('data'))value="{{Session::get('data')['email']}}" @endif  name="email" type="email" class="form-control" id="t_email" placeholder="Masukan Email">
		  </div>
		   <div class="form-group">
		    <label for="t_phone">Phone</label>
		    <input  @if(Session::has('data'))value="{{Session::get('data')['phone']}}" @endif  name="phone" type="text" class="form-control" id="t_phone" placeholder="Masukan No Telp">
		  </div>
		  <div class="form-group">
		    <label for="t_kota">Kota</label>
		    <input  @if(Session::has('data'))value="{{Session::get('data')['kota']}}" @endif  name="kota" type="text" class="form-control" id="t_kota" placeholder="Masukan Kota">
		  </div>
		   <div class="form-group">
		    <label for="t_kota">Username Kompasiana ( jika ada ) </label>
		    <input  @if(Session::has('data'))value="{{Session::get('data')['username_kompasiana']}}" @endif  name="username_kompasiana" type="text" class="form-control" id="t_kota" placeholder="Masukan username kompasiana">
		  </div>
		  <div class="pull-right">
		  <button type="submit" class="btn btn-primary">Submit</button>
		  <button type="button" class="btn btn-default">Reset</button>
		  </div>
   </form>	
@stop