@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.partials.errors')
            @include('admin.partials.success')
            {!! Form::open(['route' => 'admin.system.user.store','files' => true]) !!}

            <fieldset>
                <legend>Account Details</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="created_by" value="{{ $user->email }}">
                            <input type="hidden" name="updated_by" value="{{ $user->email }}">
                            <label for="name" class="control-label col-md-3">Name *</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control validate[required]" placeholder="Name" name="name" type="text" id="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3">Email *</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input class="form-control validate[required,custom[email]]" placeholder="Email" name="email" type="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" name="password" type="password" value="" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label col-md-3">Confirmation</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control validate[required,equals[password]]" name="password_confirmation" type="password" value="" id="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div><!-- .col-md-6 -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role" class="control-label col-md-3">Role *</label>
                            <div class="col-md-9">
                                <select class="form-control select2 validate[required] select2-hidden-accessible" id="role" name="role" tabindex="-1" aria-hidden="true">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="control-label col-md-3">Avatar</label>
                            <div class="col-md-9 col-md-offset-5">
                                <input name="avatar" type="file" id="avatar">
                            </div>
                        </div>
                    </div><!-- .col-md-6 -->
                </div><!-- .row -->
            </fieldset>

            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div></div></div>
@stop