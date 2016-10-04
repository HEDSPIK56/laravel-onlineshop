@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') User list :: @parent @endsection

{{-- Content --}}
@section('main')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Role Management
        <div class="pull-right">
            {!! Breadcrumbs::render('admin.user.index') !!}
        </div>
        </h1>
    </div>
</div>
<!-- errors message and success message -->
@include('errors.list')
<!-- end errors messge and success message -->

{!! Form::model($role, ['method' => 'PATCH','route' => ['admin.system.role.update', $role->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permissions as $value)
                	<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $ids) ? true : false, array('class' => 'name')) }}
                	{{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        		<input type="hidden" name="id" value="{{ $role->id }}">
        		<input type="hidden" name="name" value="{{ $role->name }}">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}

@endsection