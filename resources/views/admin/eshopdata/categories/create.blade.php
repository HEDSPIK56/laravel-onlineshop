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

    <div class="row">
        <div class="form-group col-sm-3">
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
        <div class="form-group col-sm-3">
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
        <!-- load more option -->
        <div class="form-group col-sm-2">
            <div class="checkbox">
                <label><input type="checkbox" value="1" name="load_more">Load more</label>
            </div>
        </div>
        <!-- end load more -->
        
        <!-- load more option -->
        <div class="form-group col-sm-2">
            <div class="checkbox">
                <label><input type="checkbox" value="1" name="use_question_answer">Use QAs</label>
            </div>
        </div>
        <!-- end load more -->
        
        <!-- load more option -->
        <div class="form-group col-sm-2">
            <div class="checkbox">
                <label><input type="checkbox" value="1" name="use_question_answer">Share SNS</label>
            </div>
        </div>
        <!-- end load more -->
    </div>

    <div class="row">

        <div class="form-group col-sm-4">
            <label for="userSearch">Category type</label>
            <select class="form-control" name="Category type">
                <option value="Y" @if ('Y' == old('use_search')) selected="selected" @endif >Use search</option>
                <option value="N" @if ('N' == old('use_search')) selected="selected" @endif >Don't use search
            </option>
        </select>
    </div>

    <!-- use search -->
    <div class="form-group col-sm-4">
        <label for="userSearch">Use search</label>
        <select class="form-control" name="use_search">
            <option value="Y" @if ('Y' == old('use_search')) selected="selected" @endif >Use search</option>
            <option value="N" @if ('N' == old('use_search')) selected="selected" @endif >Don't use search
        </option>
    </select>
</div>

<div class="form-group col-sm-4">
    <label>View Type</label>
    <select class="form-control" name="view_type">
        <option value="Y" @if ('Y' == old('view_type')) selected="selected" @endif >Grid view</option>
        <option value="N" @if ('N' == old('view_type')) selected="selected" @endif >List view</option>
    </select>
</div>
</div>
<!--end use search -->
<div class="form-group row">
    <div class="col-sm-4">
        <label>PC</label>
        <select class="form-control" id="per_page_pc">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
    </div>
    <div class="col-sm-4">
        <label>Tablet</label>
        <select class="form-control" id="per_page_tablet">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
    </div>
    <div class="col-sm-4">
        <label>Mobile</label>
        <select class="form-control" id="per_page_mobile">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
    </div>
    <input type="hidden" name="item_per_page" id="item_per_page" value="{{ old('item_per_page','1/1/1') }}">
</div>

<!-- item per page -->
<div class="form-group row">
    <div class="col-sm-4">
        <label>PC</label>
        {{ Form::selectRange('per_line_pc', 1, 100,null, ['class' => 'form-control', 'id' => 'per_page_pc']) }}
    </div>
    <div class="col-sm-4">
        <label>Tablet</label>
        {{ Form::selectRange('per_line_tablet', 1, 100,null, ['class' => 'form-control', 'id' => 'per_page_tablet']) }}
    </div>
    <div class="col-sm-4">
        <label>Mobile</label>
        {{ Form::selectRange('per_page_mobile', 1, 100,null, ['class' => 'form-control', 'id' => 'per_page_mobile']) }}
    </div>
    <input type="hidden" name="item_per_line" id="item_per_line" value="{{ old('item_per_line','1/1/1') }}">
</div>
<!-- end item per page -->
<button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection