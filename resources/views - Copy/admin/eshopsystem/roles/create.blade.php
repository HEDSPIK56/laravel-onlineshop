@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.partials.errors')
            @include('admin.partials.success')
            <form method="POST" action="{{route('admin.system.role.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Role name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Role name" value="{{ old('name')}}">
                </div>
                <div class="form-group">
                    <label for="display_name">Display name</label>
                    <input type="text" name="display_name" class="form-control" id="display_name" placeholder="Role name display" value="{{ old('display_name')}}">
                </div>
                <div class="form-group">
                    <label for="description">Role Description</label>
                    <textarea name="description" class="form-control" rows="3" id="description" placeholder="description">
                        {{ old('description')}}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection