@extends('master')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-md-10" style="padding:40px;">

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit Profile</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Order History</a></li>
		    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane" id="profile">
		    	{!! Form::open(array('action' => 'UserAccountsController@update','files'=>true)) !!}
					<div class="form-group   {{ $errors->has('type')?'has-error': ''}}" style="padding:70px;">
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('name','Name:')!!}</div>
							<div style="width:70%;float:left">
							<input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">							{!! $errors->first('name','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('dob','Date of Birth:')!!}</div>
							<div style="width:70%;float:left">
							<input type="date" name="dob" value="{{ Auth::user()->dob}}" class="form-control">
							{!! $errors->first('dob','<span class="help-block">:message</span>')!!}</div>
						</div>
						
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('email','Email:')!!}</div>
							<div style="width:70%;float:left">
							<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
							{!! $errors->first('email','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('tel','Tel NO:')!!}</div>
							<div style="width:70%;float:left">
							<input type="tel" name="tel" value="{{ Auth::user()->tel}}" class="form-control">
							{!! $errors->first('tel','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">

							<div style="width:30%;float:left">
							{!! Form::label('address','Address:')!!}</div>
							<div style="width:70%;float:left">
							<input type="text" name="address" value="{{ Auth::user()->address}}" class="form-control">
							{!! $errors->first('address','<span class="help-block">:message</span>')!!}</div>
						</div>

						
						
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('image','Choose an imsge:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div class="form-group">
						{!! Form::submit('Edit Profile',['class'=>'btn btn-primary']) !!}
					</div>
					</div>
					

				{!! Form::close() !!}
		    </div>
		    <div role="tabpanel" class="tab-pane" id="messages" style="padding:70px;">
		    	 <table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        @foreach($order as $or)
                        <tr>
                           	<td>{{ $or->id }}</td>
                            <td><a href="{{ url('my_account', $or->order_id) }}" class="showorderstate" data-toggle="modal" data-target="#myModal">
 								{{ $or->order_id }}
							</a></td>
                            <td>{{ $or->created_at }}</td>
                            <td>$1.99</td>
                            <td>{{ DB::table('order_state')->whereid($or->state_id)->first()->type }}</td>
                        </tr>
                        @endforeach
                    </table>

		    </div>
		    <div role="tabpanel" class="tab-pane" id="settings" style="padding:70px;">...</div>
		  </div>
	

		<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	
			  	
			</div>
	</div>
</div>

<script type="text/javascript">

		$('document').ready(function() {

			$('.showorderstate').on('click', function() {

				var elem = $(this);
				var url = elem.attr('href');

				$.get(url, function(data) {
				  	$('#myModal').html(data);
				});
			});

		});

	</script>




@stop