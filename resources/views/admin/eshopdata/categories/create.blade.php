@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.partials.errors')
            @include('admin.partials.success')
            <form method="POST" action="{{route('admin.data.category.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="categoryName">Category name</label>
                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Category name" value="{{ old('name')}}">
                </div>
                <div class="form-group">
                    <label for="standarInfor">Standar info</label>
                    <textarea name="standard_info" class="form-control" rows="3" id="standarInfor" placeholder="Standar info">
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
                        <option value="N" @if ('N' == old('use_search')) selected="selected" @endif >Don't use search</option>
                    </select>
                </div>
                <!--end use search -->
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection