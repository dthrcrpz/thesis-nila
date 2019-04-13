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
				<div class="box-header">
					<a href="/theses/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Title</th>
								<th>Year</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Sample</td>
								<td>2017</td>
								<td>
									<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> View Details</button>
								</td>
							</tr>
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