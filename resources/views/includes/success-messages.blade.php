@if (session()->has('message'))
    <div class="content" style="margin-bottom: 0; padding-bottom: 0; min-height: 0">
        <div class="alert alert-success alert-dismissible" style="margin-bottom: 0">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <p>{{ session('message') }}</p>
        </div>
    </div>
@endif