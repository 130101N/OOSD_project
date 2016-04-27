@extends('admin.index')

@section('content')
	<div class="container" >
		<div class="row" style="margin-top:50px;">
			<div class="col-md-6">
				<table border="1" class="table" style="text-align:center;">
                        <tr style="text-align:center;">
                            <th style="text-align:center;">#</th>
                            <th style="text-align:center;">Category</th>
                            <th style="text-align:center;">Description</th>
                            <th style="text-align:center;">Image</th>
                            <th style="text-align:center;">Update</th>
                            <th style="text-align:center;"></th>

                        </tr>
                        @foreach($subcategory as $mysubcategory) 
                         <tr >
                            <td>{{ $mysubcategory->id }}</td>
                            <td>{{ $mysubcategory->type}}</td>
                            <td>{{ $mysubcategory->description}}</td>
                            <td><img style="height:50px;width:40px;" src='img/subcategory/{{ $mysubcategory->image }}'></td>
                           	<td><a href="{{ url('subcategory', $mysubcategory->id) }}" class="updatesubcategory" data-toggle="modal" data-target="#myModal">
 								<img style="height:60px;width:50px;" src='img/icon/update3.jpg'>
							</a></td>
                            {!! Form::model($subcategory, ['method'=>'DELETE','class'=>'form-inline']) !!}
							{!! Form::hidden('id',$mysubcategory->id) !!}
							 	<td>{!! Form::submit('',['class'=>'del_button']) !!}</td>
							{!! Form::close() !!}  
                        </tr>
                        @endforeach
                    </table>
				
			</div>

			<div class="col-md-4" >
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Add a New Subcategory</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="well">
				{!! Form::model($subcategory, ['method'=>'POST','files'=>true]) !!}
					<div class="form-group  {{ $errors->has('type')?'has-error': ''}}">
						{!! Form::label('name','Name:')!!}
						{!! Form::text('type',null,['class'=>'form-control']) !!}
						{!! $errors->first('type','<span class="help-block">:message</span>')!!}
					</div>
					<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('image','Choose an image:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}</div>
						</div>
						
								
						<div style="height:260px;">
							<div style="width:30%;float:left">
							{!! Form::label('details','Discription:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::textArea('description',null,['class'=>'form-control']) !!}
							{!! $errors->first('description','<span class="help-block">:message</span>')!!}</div>
						</div>


					<div class="form-group">
						{!! Form::submit('Add New Category',['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
			</div>
                    </div><!-- /.box-body -->
				
                </div>
			</div>
			<div class="col-md-4" style="margin-top:20px;">
				<div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest SubCategories</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-info">8 New subcategories</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        @foreach($newsubcategory as $sub)
                            <li>
                                <img src="img/subcategory/{{$sub->image}}" alt="Product Image" style="width:60px;height:60px;"/>
                                <a class="users-list-name" href="#">{{$sub->type}}</a>
                                <span class="users-list-date">{{$sub->created_at}}</span>
                            </li>

                        @endforeach
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
				
                </div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	
			  	
			</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">

		$('document').ready(function() {

			$('.updatesubcategory').on('click', function() {

				var elem = $(this);
				var url = elem.attr('href');

				$.get(url, function(data) {
				  	$('#myModal').html(data);
				});
			});

		});

	</script>



@stop