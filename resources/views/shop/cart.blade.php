@extends('master')

@section('content')
		<div id="shopping-cart">
    <h1>Shopping Cart  Checkout</h1>

    {!! Form::model($products, ['method'=>'PATCH']) !!}
        <table border="1" class="table">
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <img src='img/products/{{ $product->attributes->image }}'  style="height:60px;width:37px;" />
                    {{ $product->name }}
                </td>
                <td>${{ $product->price }}</td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    ${{ Cart::getTotal() }} 
                </td>
            </tr>
            @endforeach
            
            <tr class="total">
                <td colspan="5">
                    Subtotal: ${{ Cart::getSubTotal() }}<br />
                    <span>TOTAL: ${{ Cart::getTotal()}}</span><br />

                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="greetingcard.shop.sl@gmail.com"> 
                    <input type="hidden" name="item_name" value="eCommerce Store Purchase"> 
                    <input type="hidden" name="amount" value="{{ Cart::getTotal() }}">
                    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                     <input type="hidden" name="cancel_return" value="http://localhost:800/lara-test/kebroke/Vs09/myproject/public/order_cancel">
                    <input type="hidden" name="return" value="http://localhost:800/lara-test/kebroke/Vs09/myproject/public/order_success">
   

                    {!! Html::link('shop', 'Continue Shopping', array('class'=>'tertiary-btn')) !!}
                    
                         <input type="submit" value="Confirm Order" class="secondary-cart-btn">
                         {!! Form::label('paymentMethod','Select a payment Method:')!!}
                         {!! Form::select('paymentMethod',$paymentMethod) !!} 
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
</div><!-- end shopping-cart -->	

@stop