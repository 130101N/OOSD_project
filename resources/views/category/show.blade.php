@extends('admin.index')

@section('content')
	<div class="container">
		<div class="row" style="margin-top:50px;">
			<div class="head">
				<h2>Sub Categories for {{$category->type}} Category</h2>
			</div>
			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<table border="1" class="table">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>

                        </tr>
                        @foreach($subCategories as $subcat)
                        <tr>
                            <td>{{ $subcat->id }}</td>
                            <td>{{ $subcat->type }}</td>
                            <td>{{ $subcat->decription }}</td>
                            <td><img style="height:50px;width:40px;" src='img/subcategory/{{ $subcat->image }}'></td>
                        </tr>
                        @endforeach
                    </table>
					</div>
					<div class="col-md-4">
						<div class="well">
						<h2>Details</h2>
						{!! Form::model($category, ['url' => '/category_'. $category->type, 'method'=>'POST']) !!}

							<div class="form-group">
								{!! Form::label('name','Name:')!!}
								{!! Form::text('type',null,['class'=>'form-control']) !!}
								{!! Form::label('details','Discription:')!!}
								{!! Form::textArea('description',null,['class'=>'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
							</div>

						{!! Form::close() !!}
						</div>
						<div class="well">
						<h2>Add a subcategory</h2>
						{!! Form::model($category, ['method'=>'PATCH']) !!}
							<div class="form-group">
								{!! Form::label('subcategory','Subcategory:')!!}
								{!! Form::select('subcat',$allSubCateories) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
							</div>

						{!! Form::close() !!}
						</div>

					</div>
				</div>
			</div>
			
		</div>
	</div>
	

	
@stop