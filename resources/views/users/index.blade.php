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
		<div class="col-xs-12">
			<!-- /.box -->
			<div class="box">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Name / Student ID</th>
								<th>Email</th>
								<th>Registration Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								@if ($user->name != 'Guest')
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->created_at }}</td>
								</tr>
								@endif
							@endforeach
						</tbody>
						<tfoot>
						<tr>
							<th>Title</th>
							<th>Year</th>
							<th>Actions</th>
						</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection