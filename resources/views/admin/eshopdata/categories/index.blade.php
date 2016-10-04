@extends('admin.layouts.default')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('admin.data.category.create')}}" class="btn btn-primary btn-block">Add new category</a>
        </div>
        <div class="col-sm-8 text-right">
            <form class="form-inline" action="admin.data.category.index">
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
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Standard info</th>
                            <th>Visible</th>
                            <th>Use Search</th>
                            <th>View Type</th>
                            <th>Align Type</th>
                            <th>Load More</th>
                            <th>Per Page</th>
                            <th>Per Line</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>STT</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->standard_info }}</td>
                            <td>{{ $category->visible }}</td>
                            <td>{{ $category->use_search }}</td>
                            <td>{{ $category->view_type_name}}</td>
                            <td>{{ $category->align_view_name}}</td>
                            <td>{{ $category->load_more }}</td>
                            <td>{{ $category->item_per_page }}</td>
                            <td>{{ $category->item_per_line }}</td>
                            <td>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Copy</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- pagination -->
    <div class="row">
        <div class="col-sm-12 text-center">
            {{ $categories->links() }}
        </div>
    </div>
    <!-- end pagination -->
</div>
@endsection