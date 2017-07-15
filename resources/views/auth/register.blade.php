@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
				<span>
					<div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                            <label for="dept" class="col-md-4 control-label">Dept  :  </label>

                            <div class="col-md-6">                                																
									<select id="dept"  class="form-control" name="dept" > 
										<option value="">---- </option>										
										<option value="cse">CSE </option>										
										<option value="ece">ECE </option>										
										<option value="cse">EEE </option>										
										<option value="ece">MECH </option>										
									</select> 								
								
								@if ($errors->has('dept'))
                                    <span class="help-block">
                                        <strong>This field shouldn't be empty</strong>
                                    </span>
                                @endif
                            </div>
                    </div>	
				</span>
						
						
						
						<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <select id="year"  class="form-control" name="year" > 										
										<option value="1">1</option>																				
								</select> 								

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address :</label>

                            <div class="col-md-6">                                								
									<textarea id="address"  class="form-control" name="address" > </textarea>								
									
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>Provide correct Address </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
				<span>
					<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type  :  </label>

                            <div class="col-md-6">                                																
									<select id="type"  class="form-control" name="type" > 
										<option value="">---- </option>										
										<option value="dote">Dote </option>										
										<option value="management">Management </option>										
									</select> 								
								
								@if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>This field shouldn't be empty</strong>
                                    </span>
                                @endif
                            </div>
                    </div>	
				</span>
				

					<div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label for="phone_no" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="tel" class="form-control" name="phone_no" value="{{ old('phone_no') }}" >

                                @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
					
					
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

					
					
					
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
