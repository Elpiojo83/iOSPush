@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">List of Certificates</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="list-group">
				@foreach($certificate as $item)
					<li class="list-group-item">
						{{ $item->certificate_name }}
						<div class="row">
							<div class="col-xs-3">
								Filename:
							</div>
							<div class="col-xs-9">
								{{ $item->certificate_file_name }}
							</div>
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
	            <h3 class="box-title">Add Certificate</h3>
	            <div class="box-tools pull-right">
	              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	            </div>
	          </div><!-- /.box-header -->
	          <div class="box-body">
	            <form action="/admin/settings/certificate/add" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="certificate_name">Certificate Name</label>
						<input type="text" name="certificate_name" id="certificate_name" class="form-control">
					</div>
					<div class="form-group">
						<label for="certificate_passphrase">Certificate Passsphrase</label>
						<input type="password" name="certificate_passphrase" id="certificate_passphrase" class="form-control">
					</div>
					<div class="form-group">
						<label for="app_id">Certificate related App</label>
						<select name="app_id" id="app_id" class="form-control">
							@foreach ($app as $item)
								<option value="{{ $item->id }}">{{ $item->app_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="certificate_type_id">Certificate Type</label>
						<select name="certificate_type_id" id="certificate_type_id" class="form-control">
							<option value="1">Development</option>
							<option value="2">Production</option>
						</select>
					</div>
					<div class="form-group">
						<label for="certificate_file">Certificate File (.pem)</label>
						<input type="file" name="certificate_file" class="form-contorl" id="certificate_file">
					</div>
					<div class="form-group">
						<input type="submit" value="Add Certificate" class="btn btn-default">
					</div>
				</form>
	          </div><!-- /.box-body -->
	          <div class="box-footer clearfix hidden"></div><!-- /.box-footer -->
	        </div>
		
		
	</div>
</div>


@stop