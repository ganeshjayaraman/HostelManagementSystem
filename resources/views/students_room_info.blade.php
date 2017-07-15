@extends('layouts.app')

@section('content')


@if (Session::has('errors'))			
			@foreach($errors->all() as $error)
				@if($error != "msg")
					<ul class="alert alert-info alert-dismissable col-md-6 col-md-offset-1">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
						<li> {{ $error }} </li>
					</ul>
				@endif
	@endforeach
		
@endif

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welocme {{ Auth::user()->name }}</div>

                <div class="panel-body">
					<span class="room_no">The Alloted Room is &nbsp;&nbsp;&nbsp;<strong>{{ $get->room_id }} </strong></span>
				<br />	<br />
				<div class="page-heading">ROOM DETAILS</div>
					<table class="table table-hover table-bordered" style="font-family: 'Slabo 27px', serif;">
						<thead>
							<tr> 
								<th>ROOM_NO</th>
								<th>FLOOR</th>
								<th>BLOCK</th>
								<th>BLOCK_WARDEN</th>				
							</tr>
						</thead>
					
						<tbody>							
							<tr>
								<td>{{ $get_info->id }}</td>
								<td>{{ $get_info->floor }}</td>
								<td>{{ $get_info->block }}</td>
								<td>{{ $get_info->block_warden }}</td>				
							</tr>							
						</tbody>
					</table>
					
					
				<br />	<br />
				@if($room_mate_list != [])
				<div class="page-heading">ROOMATE DETAILS</div>				
					<table class="table table-hover table-bordered" style="font-family: 'Slabo 27px', serif;">
						<thead>
							<tr> 
								<th>ID</th>
								<th>NAME</th>
								<th>DEPARTMENT</th>
								<th>YEAR</th>												
								<th>PHONE NUMBER</th>
								<th>TYPE</th>
								<th>CITY</th>				
							</tr>
						</thead>
					
						<tbody>			
						@foreach($room_mate_list as $r)
							<tr>
								<td>{{ $r->id }}</td>
								<td>{{ $r->name }}</td>
								<td>{{ $r->dept }}</td>
								<td>{{ $r->year }}</td>
								<td>{{ $r->phone_no }}</td>
								<td>{{ $r->type }}</td>
								<td>{{ $r->city }}</td>								
							</tr>							
						@endforeach
						</tbody>
					</table>	
				@else
					<div class="page-heading">SORRY YOU HAVE NO ROOM MATES ...</div>
				@endif
				</div>			
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
