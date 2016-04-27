@extends('master')

@section('content')
	<h2>This is our search my page</h2>
	
		@foreach($products as $mycategory)
			<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="height:220px;width:150px;" src='img/products/{{ $mycategory->image }}'>
										<h2>$56</h2>
										<p>{{$mycategory->tittle}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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

@stop