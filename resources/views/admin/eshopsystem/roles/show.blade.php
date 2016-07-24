@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group">
            <label for="">Permissions</label>
            @foreach($permissions as $permission)
                
                ?>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('perms[]', $permission->id, $checked) !!} {{ $permission->display_name }}
                        </label>
                    </div>
            @endforeach
        </div>
    </div>
</div>
@endsection