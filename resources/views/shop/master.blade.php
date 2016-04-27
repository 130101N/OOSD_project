@extends('master')

@section('content')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4" style="padding:50px 0 50px 0">
					<img src="img/category/product_07.jpg" class="img-responsive" alt="" width="400" height="200" style=""/>
				</div>
				<div class="col-sm-4" style="padding:50px 0 50px 0">
					<img src="img/category/product_10.jpg" class="img-responsive" alt="" width="400" height="200" style=""/>
				</div>
				<div class="col-sm-4" style="padding:50px 0 50px 0">
					<img src="img/category/product_09.jpg" class="img-responsive" alt="" width="400" height="200" style=""/>
				</div>
			</div>
		</div>
	</section>
	
	<div class="container">
			<div class="row">		
			<div class="col-md-3" id="search-form">
				{!! Form::open(array('url'=>'shop_search', 'method'=>'PATCH')) !!}
					<div class="col-md-10">
                        
                        {!! Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'form-control')) !!}
           			</div>
           			<div class="col-md-2">
                        {!!Form::submit('Search', array('class'=>'btn btn-primary')) !!}
                    </div>
                {!! Form::close() !!}

                </div>
             </div>

    </div><!-- end search-form -->
							
							
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<p></p>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $mycat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="shop-{{$mycat->type}}">{{$mycat->type}}</a>
										</a>
									</h4>
								</div>
							</div>
							@endforeach	
						</div><!--/category-productsr-->
						<h2>Prices</h2>
						<h2>Shoppong Cart</h2>
						<div style="text-align:center;padding:10px;">
							<p>{{  Cart::getTotalQuantity() }} items</p>
						</div>
						<h2>We Accept</h2>
						<div style="text-align:center;">
							<p><img src="img/paypal.png" alt="" /></p>
						</div>
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($newArrival as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src='img/products/{{$pro->image}}' width="128" height="178" alt="">
										<div class="splendid-links" style="position:relative; bottom:0px;left:-3px;"><img src="img/cart_pro.png"/></div>
	            						<!--{!! Form::open(array('url'=>'shop_cart', 'method'=>'POST')) !!}
							                {!! Form::hidden('quantity', 1) !!}
							                {!! Form::hidden('id', $pro->id) !!}
							                {!! Form::close() !!}-->
										<h2>${{$pro->price}}</h2>
										<p>{{$pro->tittle}}</p>
										<a href="edit_{{$pro->id}}" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Card</a>
									
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
						<h2 class="title text-center">New Arrival</h2>
						@foreach($newArrival as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src='img/products/{{$pro->image}}' width="128" height="178" alt="">
										<div class="splendid-links" style="position:relative; bottom:0px;left:-3px;"><img src="img/cart_pro.png"/></div>
	            						<!--{!! Form::open(array('url'=>'shop_cart', 'method'=>'POST')) !!}
							                {!! Form::hidden('quantity', 1) !!}
							                {!! Form::hidden('id', $pro->id) !!}
							                {!! Form::close() !!}-->
										<h2>${{$pro->price}}</h2>
										<p>{{$pro->tittle}}</p>
										<a href="edit_{{$pro->id}}" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Card</a>
									
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>


@stop