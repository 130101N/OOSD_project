<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    <!--border: 1px solid black;
    border-collapse: collapse;-->
    padding: 15px;
    text-align: center;
	font-size:15px;
	
}
table, td{
	}
div { 
    background-color:#00CCCC;
}
</style>
</head>
<div>
<!--body style="color:black; background-color: #FFFFFF;margin-right: 150px;margin-left: 150px; margin-color:#33FFFF; margin-border: 25px solid navy;"-->
<body>
<!--h1 style="text-align: center;"><img src="logo.png" > </h1-->
<h2 style="text-align:center; font-size:30px"><br>Account Details-2015</h2>
<p style="text-align:center; font-size:15px">Kebrok.com,<br>No: 535/3,<br>Main Street,<br>Gampaha.</br>
<table style="width:100%">
  <tr style="color:blue; background-color:#33CCFF; font-family: Lucida Handwriting;padding: 10px;">
 
    <th height="50">Order ID</th>
    <th height="50">Date</th>		
    <th height="50">Amount</th>
	<th height="50">Status</th>
  </tr>
  @foreach($order as $or)
  <tr style="background-color:#E8E8E8; ">
    <td>{{ $or->order_id }}</td>
	<td>{{ $or->created_at }} </td>
	<td>{{ $or->amount }}  </td>
	<td>{{ DB::table('order_state')->whereid($or->state_id)->first()->type }} </td>
  </tr>
  @endforeach
	<tr style="color:blue; background-color:#33CCFF; font-family: Lucida Handwriting;padding: 15px;">
	<td>Total Income</td>
	<td> </td>
	<td>{{$order->sum('amount')}} </td>
	<td> </td>
	</tr> 
</table>
</div>
<!--div> <br><br><br><br></div-->

</body>
</html>
