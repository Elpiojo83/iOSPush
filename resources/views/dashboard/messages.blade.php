@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of Messages</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="list-group">
            	<li class="list-group-item">
	            	<div class="row">
	            		<div class="col-xs-1">ID</div>
	            		<div class="col-xs-9">Message</div>
						<div class="col-xs-2">Status*</div>
	            	</div>
            	</li>
				@foreach($message as $item)
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-1">{{$item->id}}</div>
		            		<div class="col-xs-9">{{ $item->message }}</div>
							<div class="col-xs-2">{{ $item->status }}</div>
						</div>
					</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
			<div class="row">
				<div class="col-xs-4">
					*Staus 1: Message in Queue
				</div>
				<div class="col-xs-4">
					*Staus 2: Message sent
				</div>
				<div class="col-xs-4"></div>
			</div>
          </div><!-- /.box-footer -->
        </div>
        <!-- Message Queue -->
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Message Queue</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="list-group">
            	<li class="list-group-item">
	            	<div class="row">
	            		<div class="col-xs-1">ID</div>
	            		<div class="col-xs-3">Message</div>
	            		<div class="col-xs-6">Device Token</div>
						<div class="col-xs-2">Status*</div>
	            	</div>
            	</li>
            	@foreach($message_queue as $item)
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-1">{{$item->id}}</div>
		            		<div class="col-xs-3">{{ $item->message }}</div>
		            		<div class="col-xs-6">{{ $item->device_token }}</div>
							<div class="col-xs-2">{{ $item->status }}</div>
						</div>
					</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
          		<div class="row">
					<div class="col-xs-4">
						*Staus 1: Message in Queue
					</div>
					<div class="col-xs-4">
						*Staus 2: Message sent
					</div>
					<div class="col-xs-4"></div>
				</div>
          </div><!-- /.box-footer -->
        </div>

        <!-- Message Queue -->

	</div>
	<div class="col-sm-6">
		<div class="box box-info">
	        <div class="box-header with-border">
	          <h3 class="box-title">Add Message to Messagequeue</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form action="/admin/message/add" method="post">
					<div class="form-group">
						<label for="app_name">Choose App</label>
						<select name="app_id" id="app_id" class="form-control">
							@foreach ($app as $appitem)
								<option value="{{ $appitem->id }}">{{ $appitem->app_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<textarea name="message" id="message" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Add Message to Queue" class="btn btn-default">
					</div>
				</form>
	        </div><!-- /.box-body -->
	        <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
	    </div>
	    <div class="box box-info">
	        <div class="box-header with-border">
	          <h3 class="box-title">Proceeed Messagequeue</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	          </div>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form action="/admin/message/send" method="post">
	          		<div class="form-group">
	          			<label for="server_type_id">Server Type</label>
						<select name="server_type_id" id="server_type_id" class="form-control">
							<option value="1">Development*</option>
							<option value="2">Production*</option>
						</select>
	          		</div>
					<div class="form-group">
						<input type="submit" value="Send Messages" class="btn btn-default">
					</div>
				</form>
	        </div><!-- /.box-body -->
	        <div class="box-footer clearfix">
	        	<div class="row">
	        		<div class="col-sm-6">
	        			*Development: Send Message to test devices only
	        		</div>
	        		<div class="col-sm-6">
	        			*Producitons: Send Message to all registered devices
	        		</div>
	        	</div>
	        	
	        </div><!-- /.box-footer -->
	    </div>
	</div>
</div>


@stop