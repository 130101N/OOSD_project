@extends('admin.index')

@section('content')
	<h2>Generate reports</h2>
	<div class="row">
        <div class="col-md-12" style="margin-top:50px;">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Order Summary Report</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class=" well box-body no-padding">
                     <div class="col-md-12" style="margin-top:0px">
		                <h2>Order Details</h2>
		                {!! Form::model($order, ['method'=>'POST']) !!}
		                    <div class="col-md-4" style="height:50px;">
		                            <div style="width:30%;float:left">
		                            {!! Form::label('startate','Start Date:')!!}</div>
		                            <div style="width:70%;float:left">
		                            {!! Form::input('date','startdate',null,['class'=>'form-control']) !!}  
		                        </div>
		                    </div>
		                        <div class="col-md-4" style="height:50px;">
		                            <div style="width:30%;float:left">
		                            {!! Form::label('enddate','End Date:')!!}</div>
		                            <div style="width:70%;float:left">
		                            {!! Form::input('date','enddate',null,['class'=>'form-control']) !!} 
		                        </div>
		                    </div>
		                    <div class="col-md-3" style="height:50px;">
                              <div style="width:30%;float:left">
                              {!! Form::label('reportType','Report Type:')!!}</div>
                              <div style="width:70%;float:left">
                              {!! Form::select('reportType',$reportType) !!}</div>
                            </div>
		                        <div class="col-md-2" style="height:50px;">
		                        {!! Form::submit('Generate Report',['class'=>'btn btn-primary']) !!}
		                        </div>
		                {!! Form::close() !!}
		            </div> 
                    </div><!-- /.box-body -->
				
                </div>
			</div>
    </div>        
@stop