@extends('layouts.app')

@section('content')
		


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welocme {{ Auth::user()->name }}</div>

                <div class="panel-body">
							
				<br />	<br />				
				
				<div class="page-heading">Your Preference & MESS DETAILS</div>
				@if($get_info != null)
					<table class="table table-hover table-bordered" style="font-family: 'Slabo 27px', serif;">
						<thead>
							<tr> 
								<th>MESS_NO</th>
								<th>MESS_TYPE</th>								
							</tr>
						</thead>					
					@foreach($get_info as $mess)
						<tbody>							
							<tr>
								<td>{{ $mess->id }}</td>
								<td>{{ $mess->type }}</td>								
							</tr>							
						</tbody>
					@endforeach
					</table>
				@else
					<span />SORRY NO MESS ALLOTED FOR YOU.
				</div>			
				@endif	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
