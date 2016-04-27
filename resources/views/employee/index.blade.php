@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row" style="margin-top:50px;">
			<div class="well col-md-7">
				<h2>Add a New Employee</h2>
				{!! Form::model($employee,['method'=>'POST','files'=>true]) !!}
					<div class="form-group   {{ $errors->has('type')?'has-error': ''}}">
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('name','Name:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('name',null,['class'=>'form-control']) !!}	
							{!! $errors->first('name','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('nic','NIC:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('nic',null,['class'=>'form-control']) !!}	
							{!! $errors->first('nic','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('dob','Date of Birth:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::input('date','dob',null,['class'=>'form-control']) !!}	
							{!! $errors->first('dob','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">

							<div style="width:30%;float:left">
							{!! Form::label('gender','Gender:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::select('gender',$gender) !!}</div>
						</div>
						<div style="height:50px;">

							<div style="width:30%;float:left">
							{!! Form::label('job','Job:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::select('job',$role) !!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('email','Email:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::email('email',null,['class'=>'form-control']) !!}
							{!! $errors->first('email','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('tel','Tel NO:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('tel',null,['class'=>'form-control']) !!}
							{!! $errors->first('tel','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:250px;">

							<div style="width:30%;float:left">
							{!! Form::label('address','Address:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::textArea('address',null,['class'=>'form-control']) !!}
							{!! $errors->first('address','<span class="help-block">:message</span>')!!}</div>
						</div>

						<div style="height:50px;">
                            <div style="width:30%;float:left">
                            {!! Form::label('password','Password:')!!}</div>
                            <div style="width:70%;float:left">
                            {!! Form::password('password',['class'=>'form-control']) !!}
                            {!! $errors->first('password','<span class="help-block">:message</span>')!!}</div>
                        </div>
                        <div style="height:50px;">
                            <div style="width:30%;float:left">
                            {!! Form::label('password_confirmation','Confrim Password:')!!}</div>
                            <div style="width:70%;float:left">
                            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                            {!! $errors->first('password_confirmation','<span class="help-block">:message</span>')!!}</div>
                        </div>
						
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('image','Choose an imsge:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}</div>
						</div>
					</div>
					<div class="form-group">
						{!! Form::submit('Add new Employee',['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
				
			</div>
			<div class="col-md-10">
				<h2>Employee Details</h2>

				<table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>NIC</th>
                            <th>Tell No</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th></th>

                        </tr>
                        @foreach($employee as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->name }}</td>
                            <td>{{ $emp->dob }}</td>
                            <td>{{ $emp->nic }}</td>
                            <td>{{ $emp->tel }}</td>
                            <td>{{ $emp->address }}</td>
                            <td>{{ $emp->email }}</td>
                            <td><img style="height:100px;width:80px;" src='img/employee/{{ $emp->image }}'></td>
                            {!! Form::model($employee, ['method'=>'DELETE','class'=>'form-inline']) !!}
                            	{!! Form::hidden('id',$emp->id) !!}
							 	<td>{!! Form::submit('',['class'=>'del_button']) !!}</td>
							{!! Form::close() !!}
                        </tr>
                        @endforeach
                    </table>


				
			</div>
		</div>
	</div>

@stop