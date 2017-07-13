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
				</div>			
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
