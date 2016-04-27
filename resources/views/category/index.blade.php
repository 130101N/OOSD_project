@extends('admin.index')

@section('content')
	<div class="container">

		<div class="row" style="margin-top:50px;">
			<h2 style="font-family: 'Source Sans Pro',sans-serif;">Category Details</h2>
			<div class="col-md-6">
				<table border="1" class="table" style="text-align:center;">
                        <tr style="text-align:center;">
                            <th style="text-align:center;">#</th>
                            <th style="text-align:center;">Category</th>
                            <th style="text-align:center;">Description</th>
                            <th style="text-align:center;"></th>

                        </tr>
                        @foreach($category as $mycategory) 
                         <tr >
                            <td>{{ $mycategory->id }}</td>
                            <td><a href="category_{{ $mycategory->type}}">{{ $mycategory->type}}</a></td>
                            <td>{{ $mycategory->description}}</td>
                            {!! Form::model($category, ['method'=>'DELETE','class'=>'form-inline']) !!}
							{!! Form::hidden('id',$mycategory->id) !!}
							 	<td>{!! Form::submit('',['class'=>'del_button']) !!}</td>
							{!! Form::close() !!} 
                        </tr>
                        @endforeach
                    </table>
				
			</div>

			<div class="col-md-4">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add a New Category</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                     	<div class="well">
							{!! Form::model($category, ['method'=>'PATCH']) !!}
							<div class="form-group  {{ $errors->has('type')?'has-error': ''}}">
								{!! Form::label('name','Name:')!!}
								{!! Form::text('type',null,['class'=>'form-control']) !!}
								{!! $errors->first('type','<span class="help-block">:message</span>')!!}
								{!! Form::label('details','Discription:')!!}
								{!! Form::textArea('description',null,['class'=>'form-control']) !!}
								{!! $errors->first('description','<span class="help-block">:message</span>')!!}
							</div>
							<div class="form-group">
								{!! Form::submit('Add New Category',['class'=>'btn btn-primary']) !!}
							</div>

						{!! Form::close() !!}
						
						</div>
                    </div><!-- /.box-body -->
				
                </div>

				
			</div>
		</div>
		<div class="row">
			<div class="col-md-10" >
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Orders Related to category</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-info">2015</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                     	<div class="well" style="padding-left:200px;">
								<canvas id="canvas2" height="450" width="525"></canvas>
						
						</div>
                    </div><!-- /.box-body -->
				
                </div>

			</div>

			

		</div>
	</div>
	<script>
	window.onload = function(){
		var ctx2 = document.getElementById("canvas2").getContext("2d");
		window.myBar = new Chart(ctx2).PolarArea(data, {
		segmentStrokeColor: "#000000"
	});
	}
	var data = [
    {
        value: {{DB::table('order_has_product')->wherecategory_id(1)->count()}},
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "{{DB::table('category')->whereid(1)->first()->type}}"
    },
    {
        value: {{DB::table('order_has_product')->wherecategory_id(2)->count()}},
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "{{DB::table('category')->whereid(2)->first()->type}}"
    },
    {
        value: {{DB::table('order_has_product')->wherecategory_id(3)->count()}},
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "{{DB::table('category')->whereid(3)->first()->type}}"
    },
    {
        value: {{DB::table('order_has_product')->wherecategory_id(4)->count()}},
        color: "#949FB1",
        highlight: "#A8B3C5",
        label: "{{DB::table('category')->whereid(4)->first()->type}}"
    },
    {
        value: {{DB::table('order_has_product')->wherecategory_id(5)->count()}},
        color: "#4D5360",
        highlight: "#616774",
        label: "{{DB::table('category')->whereid(5)->first()->type}}"
    }

];

	</script>

@stop