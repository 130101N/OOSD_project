@extends('master')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				@foreach($displaysub as $mycategory)
				<div class="col-sm-3" style="padding:50px 0 50px 0">
					<a href="shop_{{$hhcategory->type}}_{{$mycategory->type}}">
					<img src='img/subcategory/{{$mycategory->image}}' class="img-responsive" alt="" style="width:300px;height:400px;"/></a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
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
						<h2>Subcategory</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($subCategories as $mycat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="shop_{{$hhcategory->type}}_{{$mycat->type}}">{{$mycat->type}}</a>
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
						<h2 class="title text-center">Features Items</h2>
						@foreach($subCategories as $mycategory)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:220px;width:150px;" src='img/subcategory/{{ $mycategory->image }}'>
										<h3><a href="shop_{{$hhcategory->type}}_{{$mycategory->type}}">{{$mycategory->type}}</a></h3>
									</div>
								</div>
								
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

@stop