@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of Devices</h3>
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
	            		<div class="col-xs-9">Token</div>
						<div class="col-xs-2">Test Device</div>
	            	</div>
            	</li>
				@foreach($device as $item)
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-1">{{$item->id}}</div>
		            		<div class="col-xs-9">{{ $item->device_token }}</div>
							<div class="col-xs-2">{{ $item->is_test_device }}</div>
						</div>
					</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
        </div>

        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of App-Devices</h3>
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
	            		<div class="col-xs-9">Device ID</div>
						<div class="col-xs-2">App ID</div>
	            	</div>
            	</li>
				@foreach($app_devices as $item)
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-1">{{$item->id}}</div>
		            		<div class="col-xs-9">{{ $item->device_id }}</div>
							<div class="col-xs-2">{{ $item->app_id }}</div>
						</div>
					</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
        </div>
	</div>
	<div class="col-sm-6">
		<div class="box box-info">
	          <div class="box-header with-border">
	            <h3 class="box-title">Add Device</h3>
	            <div class="box-tools pull-right">
	              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	            </div>
	          </div><!-- /.box-header -->
	          <div class="box-body">
	            <form action="/admin/device/add" method="post">
					<div class="form-group">
						<label for="devic_token">Register for App</label>
						<select name="app_id" id="app_id" class="form-control">
							@foreach ($app as $appitem)
								<option value="{{ $appitem->id }}">{{ $appitem->app_name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="device_token">Device Token</label>
						<input type="text" name="device_token" id="device_token" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="device_notes">Device Notes</label>
						<input type="text" name="device_notes" id="device_notes" class="form-control">
					</div>
					<div class="form-group">
						<div class="checkbox">
						    <label>
						      <input type="checkbox" name="is_test_device" id="is_test_device" checked="checked" value="1"> Test Device
						    </label>
					  	</div>
					</div>
					<div class="form-group">
						<input type="submit" value="Add Device" class="btn btn-default">
					</div>
				</form>
	          </div><!-- /.box-body -->
	          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
	        </div>
		
		
	</div>
</div>


@stop