@extends('pendaftaran.master')

@section('content')
	<a  href="{{URL::to('/peserta')}}" class="btn btn-primary pull-right"> Total <i class="badges">{{$total}}</i> </a>
     
     
	 	
	 
        <h2>List Pendaftar baru</h2>
    <div>   
		 <form role="form" method="GET" action="/peserta"  >
			  <div class="form-group">
			    <label for="t_nama">Search </label>
			    <input  class="large"@if(Input::has('s'))value="{{Input::get('s')}}" @endif name="s" type="text" class="form-control " id="t_nama" placeholder="Search">
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
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
        @foreach($list as $x => $row)
        <tr>
          <td>{{$x+1}}</td>
          <td>{{$row->nama}}</td>
          <td>{{$row->email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->username_kompasiana}}</td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <div class="pull-right" > 
    {{$paging->links()}}
    </div>
   
@stop