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


            <form method="POST" action="{{route('admin.data.category.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="categoryName">Category name</label>
                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Category name"
                           value="{{ old('name')}}">
                </div>
                <div class="form-group">
                    <label for="standarInfor">Standar info</label>
                    <textarea name="standard_info" class="form-control" rows="3"
                              placeholder="Standar info" id="editor">
                        {{ old('standard_info')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="visible" id="visibleRadio" value="Y" checked>
                            Enable category
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="visible" id="visibleRadio2" value="N">
                            Disable category
                        </label>
                    </div>
                </div>
                <!-- use breadcum-->
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="use_breadcrumb" id="use_breadcrumb" value="Y" checked>
                            Use Breadcrumb
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="use_breadcrumb" id="use_breadcrumb2" value="N">
                            Un Use Breadcrumb
                        </label>
                    </div>
                </div>
                <!-- end use breadcum-->
                <!-- use search -->
                <div class="form-group">
                    <label for="userSearch">Use search</label>
                    <select class="form-control" name="use_search">
                        <option value="Y" @if ('Y' == old('use_search')) selected="selected" @endif >Use search</option>
                        <option value="N" @if ('N' == old('use_search')) selected="selected" @endif >Don't use search
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>View Type</label>
                    <select class="form-control" name="view_type">
                        <option value="Y" @if ('Y' == old('view_type')) selected="selected" @endif >Grid view</option>
                        <option value="N" @if ('N' == old('view_type')) selected="selected" @endif >List view</option>
                    </select>
                </div>
                <!--end use search -->
                <div class="form-group">
                    <label>Item per page</label>
                    <input type="text" name="item_per_page" class="form-control" placeholder="Item per page (a/b/c)"
                           value="{{ old('item_per_page')}}">
                </div>
                <div class="form-group">
                    <label>Item per line</label>
                    <input type="text" name="item_per_line" class="form-control" placeholder="Item per line (a/b/c)"
                           value="{{ old('item_per_line')}}">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
@endsection