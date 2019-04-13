@if ($errors->any())
    <div class="content" style="margin-bottom: 0; padding-bottom: 0; min-height: 0">
        <div class="alert alert-danger alert-dismissible" style="margin-bottom: 0">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            <ul style="padding-left: 20px">
            	@foreach ($errors->all() as $error)
            	<li>{{ $error }}</li>
            	@endforeach
            </ul>
        </div>
    </div>
@endif