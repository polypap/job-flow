@if(!empty(session('success')))
    <div class="alert alert-success" role="alert">
        <p class="font-weight-bold">Success</p>
        <p>{{session('success')}}</p>
    </div>
@endif

@if(!empty(session('error')))
   <div class="alert alert-danger" role="alert">
        <p class="font-weight-bold">Error</p>
        <p>{{session('error')}}</p>
    </div>
@endif

@if(!empty(session('warning')))
    <div class="alert alert-warning" role="alert">
        <p class="font-weight-bold">Warning</p>
        <p>{{session('warning')}}</p>
    </div>
@endif

@if(!empty(session('info')))
    <div class="alert alert-info" role="alert">
        <p class="font-weight-bold">Info</p>
        <p>{{session('info')}}</p>
    </div>
@endif