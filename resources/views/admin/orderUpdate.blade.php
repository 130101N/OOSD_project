@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row" style="margin-top:50px;">
					<div class="col-md-4">
              <h2>Order Details</h2>
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Order Progress</span>
                  <span class="info-box-number">{{$currentstate}}</span>
                  <div class="progress">
                    <div class="progress-bar" style="width:<?php echo ($order->state_id/5)*100 ?>%"></div>
                  </div>
                  <span class="progress-description">
                    <?php echo ($order->state_id/5)*100 ?>% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            
            
						
						
					</div>
          <div class="col-md-6">
            <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Order State</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-success">{{ $order->order_id }}</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                     <div class="well">
                        {!! Form::model($order, [ 'method'=>'PATCH']) !!}
                        {!! Form::hidden('orderid',$order->order_id) !!}
                           <div style="height:50px;">
                              <div style="width:30%;float:left">
                              {!! Form::label('status','Status:')!!}</div>
                              <div style="width:70%;float:left">
                              {!! Form::select('status',$orderState) !!}</div>
                            </div>
                          <div class="form-group">
                            {!! Form::submit('Update',['class'=>'btn btn-success']) !!}
                          </div>

                        {!! Form::close() !!}
                        </div>
                    </div><!-- /.box-body -->
        
                </div>
          </div>
          <div class="col-md-10">
              <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Products related to order</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-success">{{ $order->order_id }}</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding well">
                      <ul class="users-list clearfix">
                        @foreach($products as $pro)
                            <li class="col-md-12" style="width:100%;">
                              <div class="col-md-3">
                                <img src="img/products/{{DB::table('product')->whereid($pro->product_id)->first()->image}}" alt="Product Image" style="width:128px;height:178px;border-radius:0%"/>
                                
                              </div>
                              <div class="col-md-9">
                                <span class="users-list-name">{{$pro->product_id}}</span>
                                <a class="users-list-name" href="#">{{DB::table('product')->whereid($pro->product_id)->first()->tittle}}</a>
                                <p class="users-list-name" >{{$pro->description}}</p>
                                <p class="users-list-name" >Delivery Details:</p>
                                <p class="users-list-name" >{{$pro->delivery_address}}</p>
                                <p class="users-list-name" >{{$pro->delivery_city}}</p>
                                <p class="users-list-name" >{{$pro->delivery_country}}</p>
                                <span class="users-list-date">{{$pro->created_at}}</span>
                              </div>
                                 
                            </li>

                        @endforeach
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                </div>
          </div>
					</div>
				</div>

@stop