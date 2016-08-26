@if($errors->has())
<div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>Following errors occurred</h4>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>
@endif
@if (Session::has('message'))
<div class="flash alert-info">
    <p class="panel-body">
        {{ Session::get('message') }}
    </p>
</div>
@endif
@if ($errors->any())
<div class='flash alert-danger'>
    <ul class="panel-body">
        @foreach ( $errors->all() as $error )
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif