@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of Apps</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="list-group">
				@foreach($app as $item)
					<li class="list-group-item">{{ $item->app_name }}</li>
				@endforeach
			</ul>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
        </div>
	</div>
	<div class="col-sm-6">
		<div class="box box-info">
	          <div class="box-header with-border">
	            <h3 class="box-title">Add App</h3>
	            <div class="box-tools pull-right">
	              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	            </div>
	          </div><!-- /.box-header -->
	          <div class="box-body">
	            <form action="/admin/settings/app/add" method="post">
					<div class="form-group">
						<label for="app_name">App Name</label>
						<input type="text" name="app_name" id="app_name" class="form-control">
					</div>
					<div class="form-group">
						<label for="server_url">App Identifier</label>
						<input type="text" name="app_identifier" id="app_identifier" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" value="Add App" class="btn btn-default">
					</div>
				</form>
	          </div><!-- /.box-body -->
	          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
	        </div>
		
		
	</div>
</div>


@stop