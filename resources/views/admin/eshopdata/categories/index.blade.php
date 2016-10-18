@extends('admin.layouts.default')
{{-- Web site Title --}}
@section('title') User list :: @parent @endsection
{{-- end title --}}

{{-- content--}}
@section('main')
    {{-- bread scumb--}}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories list
                <div class="pull-right">
                    {!! Breadcrumbs::render('admin.user.index') !!}
                </div>
            </h1>
        </div>
    </div>
    {{-- end bread scumb--}}

    <!-- errors message and success message -->
    @include('errors.list')
            <!-- end errors messge and success message -->

    {{-- search fields--}}
    <div class="row tab-search">
        <div class="col-md-1">
            <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success" id="add-user">
                <i class="glyphicon glyphicon-plus"></i>
                Export Excel </a>
        </div>
        <div class="col-md-1">
            <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success" id="add-user">
                <i class="glyphicon glyphicon-plus"></i>
                Import excel </a>
        </div>
        <div class="col-md-1">
            <a href="{{ route('admin.system.user.create') }}" class="btn btn-success" id="add-user">
                <i class="glyphicon glyphicon-plus"></i>Add new</a>
        </div>
        <form method="GET" action="" accept-charset="UTF-8" id="users-form">
            <div class="col-md-3">
                <select id="status" class="form-control" name="status">
                    <option value="" selected="selected">All</option>
                    <option value="Active">Active</option>
                    <option value="Banned">Banned</option>
                    <option value="Unconfirmed">Unconfirmed</option>
                </select>
            </div>
            <div class="col-md-6">
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
    {{-- end search fields--}}

    {{--table contnt--}}
    <div class="table-responsive top-border-table">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Visible</th>
                <th>Search</th>
                <th>View Type</th>
                <th>Align Type</th>
                <th>Load More</th>
                <th>Per Page</th>
                <th>Per Line</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key=>$category)
                <tr>
                    <td>{{ ++$key  }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->visible }}</td>
                    <td>{{ $category->use_search }}</td>
                    <td>{{ $category->view_type_name}}</td>
                    <td>{{ $category->align_view_name}}</td>
                    <td>{{ $category->load_more }}</td>
                    <td>{{ $category->item_per_page }}</td>
                    <td>{{ $category->item_per_line }}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.data.category.copy') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id"  value="{{ $category->id }}">
                            <button type="submit" class="btn btn-default btn-circle btn-copy"><i class="fa fa-files-o" aria-hidden="true"></i></button>
                        </form>
                        <a href="{{ route('admin.data.category.show',['id' => $category->id]) }}" class="btn btn-success btn-circle" title="" data-toggle="tooltip" data-placement="top" data-original-title="View User">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('admin.data.category.edit',['id' => $category->id]) }}" class="btn btn-primary btn-circle edit" title="" data-toggle="tooltip" data-placement="top" data-original-title="Edit User">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="https://demo.vanguardapp.io/user/1280/delete" class="btn btn-danger btn-circle" title="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="Please Confirm" data-confirm-text="Are you sure that you want to delete this user?" data-confirm-delete="Yes, delete him!" data-original-title="Delete User">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- end table content --}}

    <!-- pagination -->
    <div class="row">
        <div class="col-sm-12 text-center">
            {{ $categories->links() }}
        </div>
    </div>
    <!-- end pagination -->
@endsection