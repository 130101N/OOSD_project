<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Order State Details</h4>
			      </div>
			      {!! Form::model($order,['method'=>'PATCH','files'=>true]) !!}
						<div class="col-md-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"></span>
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


			              <div class="col-md-12">
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
                                <img src="img/products/{{$pro->image}}" alt="Product Image" style="width:128px;height:178px;border-radius:0%"/>
                                
                              </div>
                              <div class="col-md-9">
                                <span class="users-list-name">{{$pro->product_id}}</span>
                                <a class="users-list-name" href="#">{{$pro->tittle}}</a>
                                <p class="users-list-name" >{{$pro->description}}</p>
                                <span class="users-list-date">{{$pro->created_at}}</span>
                              </div>
                                 
                            </li>

                        @endforeach
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                </div>
          </div>
            
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      
		
			        {!! Form::close() !!}
			      </div>

			    </div>
			  </div>