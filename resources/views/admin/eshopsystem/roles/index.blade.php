@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('admin.data.category.create')}}" class="btn btn-primary btn-block">Add new category</a>
        </div>
        <div class="col-sm-8 text-right">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" name="search-category" id="search_category" class="form-control" placeholder="search category"/>
                </div>
                <div class="form-group">
                    <label>Show</label>
                    <select class="form-control" name="limit">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="80">70</option>
                        <option value="160">120</option>
                    </select>
                </div>
                <button class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive"></div>
        </div>
    </div>
</div>
@endsection