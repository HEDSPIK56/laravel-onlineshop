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

@include('errors.list')

<form action="{{ route('admin.system.role.store') }}" method="post" novalidate data-toggle="validator" role="form" id="myForm">

    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Role informations</div>
                <div class="panel-body">
                    <!-- role name -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Role name </label>
                        <div class="col-md-9 controls">
                            <input type="text" name="name" class="form-control" placeholder="Role name" required value="{{ old('name') }}">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <!-- end role name -->

                    <!-- display role name -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Display name </label>
                        <div class="col-md-9 controls">
                            <input type="text" name="display_name" class="form-control" placeholder="Display name ole name" required value="{{ old('display_name') }}">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <!-- end display role name -->

                    <!-- display role name -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description </label>
                        <div class="col-md-9 controls">
                            <textarea rows="3" class="form-control" value="{{ old('description') }}" name="description" placeholder="Description about this role" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <!-- end display role name -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Permission list</div>
                <div class="panel-body">
                    <div class="form-group">
                        @foreach($permission as $value)
                            <div class="checkbox">
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->display_name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create role</button>
        </div>
    </div>
</form>

@endsection