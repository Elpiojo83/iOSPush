@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of Servers</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="list-group">
				@foreach($server as $item)
					<li class="list-group-item">{{ $item->server_title }}</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
        </div>
	</div>
	<div class="col-sm-6">
		<div class="box box-info">
	          <div class="box-header with-border">
	            <h3 class="box-title">Add Server</h3>
	            <div class="box-tools pull-right">
	              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	            </div>
	          </div><!-- /.box-header -->
	          <div class="box-body">
	            <form action="/admin/settings/server/add" method="post">
					<div class="form-group">
						<label for="server_title">Server Title</label>
						<input type="text" name="server_title" id="server_title" class="form-control">
					</div>
					<div class="form-group">
						<label for="server_url">Server Url</label>
						<input type="text" name="server_url" id="server_url" class="form-control">
					</div>
					<div class="form-group">
						<label for="server_type_id">Server Type</label>
						<select name="server_type_id" id="server_type_id" class="form-control">
							<option value="1">Development</option>
							<option value="2">Production</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Add Server" class="btn btn-default">
					</div>
				</form>
	          </div><!-- /.box-body -->
	          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
	        </div>
		
		
	</div>
</div>


@stop