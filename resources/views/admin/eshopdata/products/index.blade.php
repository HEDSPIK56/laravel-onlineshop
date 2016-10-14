@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Product list :: @parent @endsection

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

<!-- errors message and success message -->
    @include('errors.list')
            <!-- end errors messge and success message -->

<div class="row tab-search">
    <div class="col-md-2">
        <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i>
            Export Excel        </a>
    </div>
    <div class="col-md-2">
        <a href="https://demo.vanguardapp.io/user/create" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i>
            Import excel        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.data.product.create') }}" class="btn btn-success">
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

<div class="table-responsive top-border-table" id="product-table-wrapper">
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Number Item</th>
            <th>Product Status</th>
            <th>Active</th>
        </tr>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{ ++$key  }}</td>
            <img src="{{ $product->getImage() }}" alt="{{ $user->name() }}" class="thumbnail-image img-circle" />
            <td>
                {{ $product->name }}
            </td>
            <td>
                {{ $product->getPriceFormat() }}
            </td>
            <td>
                {{ $product->getNumberItemFormat() }}
            </td>
            <td>
                @if( $product->status )
                <span class="label label-primary">Yes</span>
                @else
                <span class="label label-danger">No</span>
                @endif
            </td>
            <td class="text-center">
                <form action="{{ route('admin.data.product.copy') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id"  value="{{ $product->id }}">
                    <button type="submit" class="btn btn-default btn-circle btn-copy"><i class="fa fa-files-o" aria-hidden="true"></i></button>
                </form>
                <a href="{{ route('admin.data.product.show',['id' => $product->id]) }}" class="btn btn-success btn-circle" title="" data-toggle="tooltip" data-placement="top" data-original-title="View User">
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
                <a href="{{ route('admin.data.product.edit',['id' => $product->id]) }}" class="btn btn-primary btn-circle edit" title="" data-toggle="tooltip" data-placement="top" data-original-title="Edit User">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <form action="{{ route('admin.data.product.destroy',['id' => $product->id]) }}" method="delete">
                    <button type="submit" class="btn btn-danger btn-circle btn-delete"><i class="glyphicon glyphicon-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach

        <!-- paging -->
        {!! $products->render() !!}
        <!-- end paging-->
</div>
@endsection
