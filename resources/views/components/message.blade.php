@if(session()->has("message"))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span>{{session("message")}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


@endif