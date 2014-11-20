@extends('pendaftaran.master')

@section('content')
	<a  href="{{URL::to('/daftar_ulang')}}" class="btn btn-primary pull-right"> Total <i class="badges">{{$total}}</i> </a>
     
        <h2>List Pendaftar baru</h2>
      <div >
        <span >Pencarian berdasarkan </span> 
        <span  class="btn btn-primary cari" rel="no-order"> NO ORDER </span> 
        <span  class="btn btn-primary cari" rel="email"> EMAIL </span>
        <span  class="btn btn-primary cari" rel="nama"> NAMA </span>
     </div>
    <div id="form-s"  style="margin-top:20px"    >   
		 <form role="form" method="GET" action="/daftar_ulang"  @if(Input::has('s'))style="display:block" @else style="display:none"  @endif >
			  <div class="form-group">
			    <label for="t_nama">No Order</label>
			    <input  class="large"@if(Input::has('s'))value="{{Input::get('s')}}" @endif name="s" type="text" class="form-control " id="t_nama" placeholder="Search">
			  </div>
		</form>
     <form role="form" method="GET" action="/daftar_ulang"  @if(Input::has('e'))style="display:block" @else style="display:none"  @endif >
        <div class="form-group">
          <label for="t_nama">Email</label>
          <input  class="large"@if(Input::has('e'))value="{{Input::get('e')}}" @endif name="e" type="text" class="form-control " id="t_nama" placeholder="Search">
        </div>
        
    </form>
    <form role="form" method="GET" action="/daftar_ulang"   @if(Input::has('n'))style="display:block" @else style="display:none"  @endif >
        <div class="form-group">
          <label for="t_nama">Nama</label>
          <input  class="large" @if(Input::has('n'))value="{{Input::get('n')}}" @endif name="n" type="text" class="form-control " id="t_nama" placeholder="Search">
        </div>
        
    </form>
	</div>
        
       
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

	 <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr class="info">
          <th>#</th>
          <th>No Order</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Paket</th>
          <th>Total Price</th>
          <th>Payment Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($list as $x => $row)
        <tr>
          <td>{{$offset +=1}}</td>
          <td>{{$row->sold_id}}</td>
          <td>{{$row->sso_name}}</td>
          <td>{{$row->sso_email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->paket}}</td>
          <td>{{$row->total_price}}</td>
          <td>
             @if($row->payment_status == 0)
                  <i class="btn btn-danger">Belum bayar</i>
              @else
                 <i class="btn btn-success">Sudah bayar</i>
              @endif
          </td>
          <td>
           @if($row->is_coming == 0)
              <a href="{{URL::to('/check/')}}?no_order={{$row->sold_id}}" class="btn btn-warning" > CHECK </a>
             @else
                 <a href="#" class="btn btn-success" > CHECKED </a>
            @endif
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <div class="pull-right" > 
    {{$paging->links()}}
    </div>


@stop