@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') User list :: @parent @endsection

{{-- Content --}}
@section('main')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User list
        <div class="pull-right">
            {!! Breadcrumbs::render('admin.user.index') !!}
        </div>
        </h1>
    </div>
</div>

<div class="row tab-search">
    <div class="col-md-2">
        <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Export Excel        </a>
    </div>
    <div class="col-md-2">
        <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Import excel        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.system.user.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>Add new</a>
    </div>
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col-md-2">
            <select id="status" class="form-control" name="status"><option value="" selected="selected">All</option><option value="Active">Active</option><option value="Banned">Banned</option><option value="Unconfirmed">Unconfirmed</option></select>
        </div>
        <div class="col-md-3">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" value="" placeholder="Search for users...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search-users-btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                                    </span>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <!-- table -->
            <table class="table">
                <tr>
                    <th>Actions</th>
                    <th>Images</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active Status</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('admin.system.user.show',['id' => $user->id]) }}" class="btn btn-success btn-circle" title="" data-toggle="tooltip" data-placement="top" data-original-title="View User">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('admin.system.user.edit',['id' => $user->id]) }}" class="btn btn-primary btn-circle edit" title="" data-toggle="tooltip" data-placement="top" data-original-title="Edit User">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="https://demo.vanguardapp.io/user/1280/delete" class="btn btn-danger btn-circle" title="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="Please Confirm" data-confirm-text="Are you sure that you want to delete this user?" data-confirm-delete="Yes, delete him!" data-original-title="Delete User">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                        <td>
                            <img src="{{ $user->getAvatar() }}" alt="{{ $user->getAvatarName() }}" class="profile-image img-circle" />
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $role)
                                    <label class="label label-success"> {{ $role->display_name }} </label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if( $user->activated)
                                <span class="label label-primary">Yes</span>
                            @else
                                <span class="label label-danger">No</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- table end -->
    <!-- paging -->
    {!! $users->render() !!}
    <!-- end paging-->
</div>

@endsection
