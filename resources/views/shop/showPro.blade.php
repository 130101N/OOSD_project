@extends('master')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div  style="backgroud-color:black;width:100px;height:100px;">
				<p></p>
			</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<p></p>
						<h2>Subcategory</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($subCategories as $mycat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="shop_{{$category->type}}_{{$mycat->type}}">{{$mycat->type}}</a>
										</a>
									</h4>
								</div>
							</div>
							@endforeach	
						</div><!--/subcategory-productsr-->
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
						<h2 class="title text-center">Products</h2>
						@foreach($products as $myproduct)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:220px;width:150px;" src='img/products/{{ $myproduct->image }}'>
										<h2>{{ $myproduct->price }}</h2>
										<p>{{$myproduct->tittle}}</p>
										<!--{!! Form::open(array('url'=>'shop_cart', 'method'=>'POST')) !!}
							                {!! Form::hidden('quantity', 1) !!}
							                {!! Form::hidden('id', $myproduct->id) !!}
							                <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							            {!! Form::close() !!}-->
							            <a href="edit_{{$myproduct->id}}" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy Card</a>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="container">
		<div cas="row">
			<div class="col-md-12 replay-box">
						<div class="row">
							<div class="col-sm-9">
								<h2>Leave a replay</h2>
								<form>
									<div class="blank-arrow">
										<label style=" background: #0493BD;color: #FFFFFF;margin-bottom: 15px;padding: 3px 15px;float: left;font-weight: 400;">Your Name</label>
									</div>
									<span>*</span>
									<input type="text" class="form-control" placeholder="write your name...">
									<div class="blank-arrow">
										<label  style=" background: #0493BD;color: #FFFFFF;margin-bottom: 15px;padding: 3px 15px;float: left;font-weight: 400;">Email Address</label>
									</div>
									<span>*</span>
									<input type="email" class="form-control" placeholder="your email address...">
									<div class="blank-arrow">
										<label  style=" background: #0493BD;color: #FFFFFF;margin-bottom: 15px;padding: 3px 15px;float: left;font-weight: 400;">Country</label>
									</div>
									<input type="email" class="form-control" placeholder="Your Country...">
								</form>
								<div class="text-area">
									<div class="blank-arrow">
										<label style=" background: #0493BD;color: #FFFFFF;margin-bottom: 15px;padding: 3px 15px;float: left;font-weight: 400;">Comments</label>
									</div>
									<span>*</span>
									<textarea class="form-control" name="message" rows="11"></textarea>
									<a class="btn btn-primary" href="">post comment</a>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>
			</div>

	
					
				</div>
			</div>
		</div>
	</section>
	
		

@stop