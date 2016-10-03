@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') User list :: @parent @endsection

{{-- Content --}}
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit user
        <div class="pull-right">
            {!! Breadcrumbs::render('admin.user.edit', $user) !!}
        </div>
        </h1>
    </div>
</div>
@endsection