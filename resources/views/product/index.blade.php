@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row">
			<div class="well col-md-5" style="margin-top:50px;">
				<h2>Add a New Product</h2>
				{!! Form::model($product,['method'=>'POST','files'=>true]) !!}
					<div class="form-group   {{ $errors->has('type')?'has-error': ''}}">
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('tittle','Tittle:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('tittle',null,['class'=>'form-control']) !!}	
							{!! $errors->first('tittle','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:30px;">
							<div style="width:30%;float:left">
							{!! Form::label('category_id','Category:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::select('category_id',$categories,array('id' => 'category_id')) !!}
							{!! $errors->first('category_id','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:30px;">

							<div style="width:30%;float:left">
							{!! Form::label('sub_category_id','SubCategory:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::select('sub_category_id',$subcategories) !!}</div>
						</div>
						<div style="height:250px;">

							<div style="width:30%;float:left">
							{!! Form::label('details','Description:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::textArea('description',null,['class'=>'form-control']) !!}
							{!! $errors->first('description','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('price','Price:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('price',null,['class'=>'form-control']) !!}
							{!! $errors->first('price','<span class="help-block">:message</span>')!!}</div>
						</div>
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('image','Choose an image:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}</div>
						</div>
					</div>
					<div class="form-group">
						{!! Form::submit('Create new product',['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
				
			</div>
			<div class="col-md-5" style="margin-top:50px;">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Products</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-info">8 New Products</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach($newProducts as $pro)
                            <li>
                                <img src="img/products/{{$pro->image}}" alt="Product Image" style="width:60px;height:60px;"/>
                                <a class="users-list-name" href="#">{{$pro->tittle}}</a>
                                <span class="users-list-date">{{$pro->created_at}}</span>
                            </li>

                        @endforeach
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
				
                </div>
			</div>
			<div class="col-md-5" style="">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Products</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-info">8 New Products</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      	<div >
							<canvas id="canvas" height="325" width="600"></canvas>
						</div>
                    </div><!-- /.box-body -->
				
                </div>
				
			</div>

			<div class="col-md-10">
				<h2>Product details</h2>
				<!--<div class="form-group">
					{!! Form::open(array('url' => 'product/create', 'method' => 'put')) !!}
						{!! Form::submit('Crate New Product',['class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
					<td><a href="{{ url('product', 'create') }}" class="addProduct" data-toggle="modal" data-target="#myModal2">
 								 Add product
							</a></td>
				</div>-->

				<table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Tittle</th>
                            <th>Description</th>
                            <th>Category ID</th>
                            <th>Sub Category ID</th>
                            <th>Price</th>
                            <th>image</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($product as $myproduct)
                        <tr>
                            <td>{{ $myproduct->id }}</td>
                            <td>{{ $myproduct->tittle }}</td>
                            <td>{{ $myproduct->description }}</td>
                            <td>{{ $myproduct->category_id }}</td>
                            <td>{{ $myproduct->sub_category_id }}</td>
                            <td>{{ $myproduct->price }}</td>
                            <td><img style="height:100px;width:80px;" src='img/products/{{ $myproduct->image }}'></td>
                            <td><a href="{{ url('product', $myproduct->id) }}" class="showProduct" data-toggle="modal" data-target="#myModal">
 								 Update<img style="height:60px;width:50px;" src='img/icon/update3.jpg'>
							</a></td>
                            {!! Form::model($product, ['method'=>'DELETE','class'=>'form-inline']) !!}
                            	{!! Form::hidden('id',$myproduct->id) !!}
							 	<td>{!! Form::submit('',['class'=>'del_button']) !!}</td>
							 {!! Form::close() !!}
							
							 
                        </tr>
                        @endforeach
                    </table>


				
			</div>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  

			</div>

			

		</div>
	</div>

	<script type="text/javascript">

		$('document').ready(function() {

			$('.showProduct').on('click', function() {

				var elem = $(this);
				var url = elem.attr('href');

				$.get(url, function(data) {
				  	$('#myModal').html(data);
				});
			});

		});

	</script>
		<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}

		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});


	</script>
	    <script type="text/javascript">
    
    $(document).ready(function() {

        var select = document.getElementById('category_id');

        select.addEventListener('change', function() {
            loadXMLDoc(select.value);
        });
    });

    </script>

    <script type="text/javascript">
    function loadXMLDoc(categoryId)
    {
        var xmlhttp;
        
        xmlhttp=new XMLHttpRequest();

        

        xmlhttp.open("GET",'products/' + categoryId, true);
        

        xmlhttp.onreadystatechange=function()
            {
                
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    var select = document.getElementById('sub_category_id');
                    var responseData = JSON.parse(xmlhttp.responseText);
                    $('#sub_category_id').empty();

                    for (var i = 0; i < responseData.length; i++){
                        var opt = document.createElement('option');
                        opt.value = responseData[i].id;
                        opt.innerHTML = responseData[i].type;
                        console.log(opt);
                        select.appendChild(opt);
                    }

                
                    
                }
                
            }
            

        xmlhttp.send();
        
    }

    </script>

@stop