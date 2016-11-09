@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Discount list :: @parent @endsection

{{-- Content --}}
@section('main')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Discount list
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
    <div class="col-md-2">
        <a href="{{ route('admin.data.discount.create') }}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i>Add new</a>
    </div>
    <form method="GET" action="{{ route('admin.data.discount.index') }}" accept-charset="UTF-8">
        <div class="col-md-6">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="keyword" value="" placeholder="Search for discounts...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="discount-table-wrapper">
    <!-- table -->
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach ($discounts as $key => $discount)
        <tr>
        	<td>{{ ++$key  }}</td>
        	<td>
        		{{ $discount->name }}
        	</td>
        	<td>
        		{{ $discount->getDateTimeFormat('Y M d') }}
        	</td>
        	<td></td>
        </tr>
        @endforeach
    </table>
    <!-- table end -->
    <!-- paging -->
    {!! $discounts->render() !!}
    <!-- end paging-->
</div>

@endsection
