<div class="messages col-8 offset-2">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('denied'))
        <div class="alert alert-danger">
            {{ session('denied') }}
        </div>
    @endif
</div>
