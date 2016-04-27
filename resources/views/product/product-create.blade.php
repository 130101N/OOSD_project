<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel2">Update Product Details</h4>
			      </div>
			      {!! Form::model($product,['method'=>'POST','files'=>true]) !!}
			      <div class="modal-body">
			      	
					<h2>Add a New Product</h2>
				
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
							{!! Form::label('image','Choose an imsge:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::file('image') !!}
							{!! $errors->first('image','<span class="help-block">:message</span>')!!}</div>
						</div>
					</div>
					
					
				
			      </div>
		
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      <div class="form-group">
						{!! Form::submit('Create new product',['class'=>'btn btn-primary']) !!}
					</div>

				{!! Form::close() !!}
			      </div>

			    </div>
			  </div>