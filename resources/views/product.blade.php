@extends('master')

@section('content')
	<section id="main-content" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="jumbotron col-md-12" style="padding:50px 0 50px 0;border:3px solid rgba(22, 156, 195, 1);margin-top:20px;">
                <div id="product-image" class="col-md-3">
                    <img src="img/card/1.jpg" alt="Product" width="200" height="300">
                </div><!-- end product-image -->
                <div id="product-details" class="col-md-6" >
                    <h2>This is the product title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, impedit, laborum accusamus sit voluptatem doloremque ipsum ea error reiciendis doloribus! Quasi, incidunt cumque consectetur deserunt explicabo odio earum molestiae modi.</p>

                    <hr />

                    <form action="#" method="post">
                        <label for="qty">Qty:</label>
                        <input type="text" id="qty" name="qty" value="1" maxlength="2">

                        <button type="submit" class="secondary-cart-btn">
                            <img src="img/white-cart.gif" alt="Add to Cart" />
                             ADD TO CART
                        </button>
                    </form>
                </div><!-- end product-details -->
                <div id="product-info" class="col-md-3">
                    <p class="price">$1099</p>
                    <p>Availability: <span>In Stock</span></p>
                    <p>Product Code: <span>32321</span></p>
                </div><!-- end product-info -->
            </div>
            </div>
        </div>
      </section><!-- end main-content -->

@stop