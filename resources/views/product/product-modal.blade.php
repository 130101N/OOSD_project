<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Update Product Details</h4>
			      </div>
			      {!! Form::model($product,['method'=>'PATCH','files'=>true,'action' => 'ProductsController@update']) !!}
			      {!! Form::hidden('id',$product->id) !!}	
			      <div class="modal-body">
			      	
					<div class="form-group   {{ $errors->has('type')?'has-error': ''}}">
						<div style="height:50px;">
							<div style="width:30%;float:left">
							{!! Form::label('tittle','Tittle:')!!}</div>
							<div style="width:70%;float:left">
							{!! Form::text('tittle',null,['class'=>'form-control']) !!}	
							{!! $errors->first('tittle','<span class="help-block">:message</span>')!!}</div>
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
					</div>
					
				
			      </div>
		
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      
			        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
			        {!! Form::close() !!}
			      </div>

			    </div>
			  </div>