@extends('master')
 
@section('content')
    <section id="main-content" class="clearfix">
        <aside id="my-account-menu">
            <h3>ACCOUNT</h3>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="order_history">Order History</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="auth/logout">Sign Out</a></li>
                </ul>
                </aside><!-- end my-account-menu -->

        <div class="container" id="order-history">
            <div class="row">
                <h1>Order History</h1>
            </div>
                    
                    <table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#">23232323</a></td>
                            <td>March 24, 2013</td>
                            <td>$400</td>
                            <td class="finalized">Finalized</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#">23232323</a></td>
                            <td>March 26, 2013</td>
                            <td>$600</td>
                            <td class="pending">Pending</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#">23232323</a></td>
                            <td>March 29, 2013</td>
                            <td>$100</td>
                            <td class="aborted">Aborted</td>
                        </tr>
                    </table>
                </div><!-- end order-history -->
    </section><!-- end main-content -->

@stop