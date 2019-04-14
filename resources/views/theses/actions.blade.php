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
			<div class="box box-primary">
				@if ($create)
					<form role="form" method="post" action="/theses" enctype="multipart/form-data">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" name="title" id="title" required placeholder="Enter title">
							</div>
							<div class="form-group">
								<label for="year">Year</label>
								<input type="number" max="2099" min="2000" class="form-control" name="year" id="year" required placeholder="Enter year">
							</div>
							<div class="form-group">
								<label for="authors">Authors (separate by comma)</label>
								<textarea class="form-control" name="authors" id="authors" required placeholder="Enter authors (e.g. John Doe, Will Smith, Jane Doe)"></textarea>
							</div>
							<div class="form-group">
								<label for="abstract">Abstract File</label>
								<input type="file" id="abstract" name="abstract" required>
								<p class="help-block">You can only upload docx>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				@else
					<form role="form" method="post" action="/theses/{{ $thesis->id }}" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="box-body">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control" name="title" id="title" value="{{ $thesis->title }}" required placeholder="Enter title">
							</div>
							<div class="form-group">
								<label for="year">Year</label>
								<input type="number" max="2099" min="2000" class="form-control" name="year" id="year" value="{{ $thesis->year }}" required placeholder="Enter year">
							</div>
							<div class="form-group">
								<label for="authors">Authors (separate by comma)</label>
								<textarea class="form-control" name="authors" id="authors" required placeholder="Enter authors (e.g. John Doe, Will Smith, Jane Doe)">{{ $thesis->authors }}</textarea>
							</div>
							<div class="form-group">
								<label for="abstract">Abstract File (leave blank if you don't want to update this)</label>
								<input type="file" id="abstract" name="abstract">
								<p class="help-block">You can only upload docx files.</p>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection