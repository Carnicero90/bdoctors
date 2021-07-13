@if (session("errors"))

    <div class="alert alert-danger">
        {{ session("errors")}}
    </div>

@endif