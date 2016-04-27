<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


</head>
<body>
	 <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Kebrok.com
                <small class="pull-right">Date: <?php echo  date("Y/m/d") ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col" style="width: 33.33333333%;position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;">
              From
              <address>
                <strong>Kebrok.com</strong><br>
                795 Yakkala Roda,Gampaha<br>
                Western province, GQ 11000<br>
                Phone: (+94) 071-122-3045<br/>
                Email: customercare@kebrok.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col"  style="width: 33.33333333%;position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;">
              To
              <address>
                <strong>{{$payer->name}}</strong><br>
                {{$payer->address}}<br>
                {{$payer->country}}, {{$payer->postal_code}}<br>
                Phone: {{$payer->tel}}<br/>
                Email: {{$payer->email}}
              </address>
            </div><!-- /.col -->
            
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
                <table border="1" class="table" style=" width: 100%;background-color: transparent;
    max-width: 100%;
    margin-bottom: 20px;">
                    <tr style="background: rgba(22, 156, 195, 1); text-align: center;">
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Item Name</th>
                        <th>Unit price</th>
                        <th>Subtotal</th>

                    </tr>

                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->quantity }} </td>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img src='img/products/{{ $product->attributes->image }}'  style="height:60px;width:37px;" />
                            {{ $product->name }}
                        </td>
                        <td>${{ $product->price }}</td>
                        
                        <td>
                            $<?php echo  $product->price *$product->quantity ?>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="img/paypal.png" alt="Paypal" />
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
               Lift your revenue and expand your customer base. Let customers pay the way they want to. Our Express Checkout solution saves them time, turning potential customers into loyal shoppers.
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Payment Date: <?php echo  date("Y/m/d") ?></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>{{ Cart::getTotal()}}</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$0.00</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?php echo Cart::getTotal()+0.00 ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</body>
</html>
