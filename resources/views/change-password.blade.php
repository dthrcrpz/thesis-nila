@extends ('layouts.master')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	{{ $title }}
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			@if (session()->has('wrong-old-password'))
			    <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			        <h4><i class="icon fa fa-ban"></i> Error!</h4>
			        <p>The old password you entered is incorrect.</p>
			    </div>
			@endif
			<div class="box box-primary">
				<form role="form" method="post" action="/change-password" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name / Student ID</label>
							<input type="text" class="form-control" disabled id="name" required placeholder="Enter name or Student ID">
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" disabled id="email" required placeholder="Enter email address" value="{{ auth()->user()->email }}">
						</div>
						<div class="form-group">
							<label for="password">Enter Old Password</label>
							<input type="password" class="form-control" name="old_password" id="password" required placeholder="Enter old password">
						</div>
						<div class="form-group">
							<label for="password">Enter New Password</label>
							<input type="password" class="form-control" name="password" id="password" required placeholder="Enter old password">
						</div>
						<div class="form-group">
							<label for="password2">Re-enter New Password</label>
							<input type="password" class="form-control" name="password_confirmation" id="password2" required placeholder="Re-enter old password">
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection