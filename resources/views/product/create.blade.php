@extends('master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-7">

				<h2>This is product-create page</h2>
				{!! Form::model($product,['method'=>'PATCH']) !!}
					<div class="form-group   {{ $errors->has('type')?'has-error': ''}}">
						<p>
							{!! Form::label('tittle','Tittle:')!!}
							{!! Form::text('tittle',null,['class'=>'form-control']) !!}	
							{!! $errors->first('tittle','<span class="help-block">:message</span>')!!}
						</p>
						<p>
							{!! Form::label('category_id','Category:')!!}
							{!! Form::select('category_id',$categories) !!}
							{!! $errors->first('category_id','<span class="help-block">:message</span>')!!}
						</p>
						<p>
							{!! Form::label('details','Description:')!!}
							{!! Form::textArea('description',null,['class'=>'form-control']) !!}
							{!! $errors->first('description','<span class="help-block">:message</span>')!!}
						</p>
						<p>
							{!! Form::label('price','Price:')!!}
							{!! Form::text('price',null,['class'=>'form-price']) !!}
							{!! $errors->first('price','<span class="help-block">:message</span>')!!}	
						</p>
						<p>
							{!! Form::label('image','Choose an imsge:')!!}
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}
						</p>
					</div>
					<div class="form-group">
						{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
			</div>

			<div class="well col-md-5">
				
			</div>
		</div>
	</div>

@stop