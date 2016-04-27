@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row">
            <div class="col-md-10" style="margin-top:50px">
                <h2>Order Details</h2>
                {!! Form::model($order, ['method'=>'PATCH']) !!}
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
        </div>
    </div>
    <div class="container">
        <div class="row"> 
			<div class="col-md-10">
				<table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Delete</th>

                        </tr>
                        @foreach($order as $or)
                        <tr>
                           	<td>{{ $or->id }}</td>
                            <td><a href="orderd_{{ $or->order_id }}">{{ $or->order_id }}</a></td>
                            <td>{{ $or->created_at }}</td>
                            <td>$1.99</td>
                            <td>{{ DB::table('order_state')->whereid($or->state_id)->first()->type }}</td>
                            {!! Form::model($order, ['method'=>'DELETE','class'=>'form-inline']) !!}
                            {!! Form::hidden('id',$or->id) !!}
                                <td>{!! Form::submit('',['class'=>'del_button']) !!}</td>
                            {!! Form::close() !!} 

                                
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>    

@stop




    