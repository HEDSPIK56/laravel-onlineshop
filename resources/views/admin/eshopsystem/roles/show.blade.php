@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group">
            <label for="">Permissions</label>
            @foreach($permissions as $permission)
            <?php $checked = in_array($permission->id, $ids); 
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