@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('admin.system.role.create')}}" class="btn btn-primary btn-block">Add new role</a>
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Display name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>STT</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
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
</div>
@endsection