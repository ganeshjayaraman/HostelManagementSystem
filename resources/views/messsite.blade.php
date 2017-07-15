@extends('layouts.app')

@section('content')

 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welocme {{ Auth::user()->name }}</div>

                <div class="panel-body">					
				<ul class="sortable">					
					@foreach($mess as $m)												
							<li class='ui-state-default' value="{{ $m->id }}">{{ $m->type }}</li>																	
						@endforeach	
				</ul>
                </div>
            </div>
        </div>
    </div>
</div>

<center>
<form action="sortable" method="POST" name="sorted_form">
{{ csrf_field() }}
<input name="new_order" value="" type="hidden" > </input>
<input class="btn btn-primary" type="submit" id="submit" value="submit"></input>
</form>
</center>

@endsection
