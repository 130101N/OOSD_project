@extends('master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-2" >
			</div>
			<div class="col-md-8" style="margin-top:20px;">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">personalized your card</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-info">{{$product->id}}</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class=" well box-body">
                      {!! Form::model($product,['url'=>'shop_cart','method'=>'POST','files'=>true]) !!}
						{!! Form::hidden('quantity', 1) !!}
						{!! Form::hidden('id', $product->id) !!}
						<div class="form-group   {{ $errors->has('type')?'has-error': ''}}">
							<div style="height:250px;">
								<div style="width:30%;float:left">
									{!! Form::label('greeting','Personalized your Greeting:')!!}</div>
								<div style="width:70%;float:left">
									{!! Form::textArea('greeting',$product->description,['class'=>'form-control']) !!}
									{!! $errors->first('greeting','<span class="help-block">:message</span>')!!}</div>
							</div>
							<div style="height:250px;">
								<div style="width:30%;float:left">
									{!! Form::label('delivery','Delivery Address:')!!}</div>
								<div style="width:70%;float:left">
									{!! Form::textArea('delivery',null,['class'=>'form-control']) !!}
									{!! $errors->first('delivery','<span class="help-block">:message</span>')!!}</div>
							</div>
							<div style="height:50px;">
								<div style="width:30%;float:left">
									{!! Form::label('deliveryCity','Delivery City:')!!}</div>
								<div style="width:70%;float:left">
									{!! Form::text('deliveryCity',null,['class'=>'form-control']) !!}
									{!! $errors->first('delivery','<span class="help-block">:message</span>')!!}</div>
							</div>
							<div style="height:50px;">
								<div style="width:30%;float:left">
									{!! Form::label('deliveryCountry','Delivery Country:')!!}</div>
								<div style="width:70%;float:left">
									{!! Form::text('deliveryCountry',null,['class'=>'form-control']) !!}
									{!! $errors->first('delivery','<span class="help-block">:message</span>')!!}</div>
							</div>
						</div>
							
						<button type="submit" class="btn btn-primary add-to-cart">Add to cart</button>
					{!! Form::close() !!}
                    </div><!-- /.box-body -->
				
                </div>
			</div>
		</div>
	</div>
	
@stop
