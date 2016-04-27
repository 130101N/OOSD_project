@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row" style="margin-top:50px;">
			<div class="col-md-10">
                <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach($newcustomer as $cus)
                            <li>
                                <img src="img/employee/{{$cus->image}}" alt="User Image" />
                                <a class="users-list-name" href="#">{{$cus->name}}</a>
                                <span class="users-list-date">Yesterday</span>
                            </li>

                        @endforeach
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
				
                </div>
      </div>

      
      <div class="col-md-10">
        <h2>Member Details</h2>
                {!! Form::model($customer, ['method'=>'PATCH']) !!}
                    <div class="col-md-5" style="height:50px;">
                            <div style="width:30%;float:left">
                            {!! Form::label('startate','Start Date:')!!}</div>
                            <div style="width:70%;float:left">
                            {!! Form::input('date','startdate',null,['class'=>'form-control']) !!}  
                        </div>
                    </div>
                        <div class="col-md-5" style="height:50px;">
                            <div style="width:30%;float:left">
                            {!! Form::label('enddate','End Date:')!!}</div>
                            <div style="width:70%;float:left">
                            {!! Form::input('date','enddate',null,['class'=>'form-control']) !!} 
                        </div>
                    </div>
                        <div style="height:50px;">
                        {!! Form::submit('search',['class'=>'btn btn-primary']) !!}
                        </div>
                {!! Form::close() !!}
            </div> 
      <div class="col-md-10">

        <table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Image</th>
                            

                        </tr>
                        @foreach($customer as $cus)
                        <tr>
                            <td>{{ $cus->id }}</td>
                            <td>{{ $cus->name }}</td>
                            <td>{{ $cus->dob }}</td>
                            <td>{{ $cus->country }}</td>
                            <td>{{ $cus->city }}</td>
                            <td>{{ $cus->email }}</td>
                            <td><img style="height:100px;width:80px;" src='img/employee/{{ $cus->image }}'></td>
                            
                        </tr>
                        @endforeach
                    </table>


        
      </div>
    </div>
  </div>

@stop