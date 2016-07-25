@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('admin.system.role.create')}}" class="btn btn-primary btn-block">Add new role</a>
        </div>
        <div class="col-sm-8 text-right">
            <form class="form-inline" action="{{route('admin.system.role.index')}}" method="get">
                <div class="form-group">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="search role name" value="{{ $condition->getKeyWord() }}"/>
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
                <button class="btn btn-primary" type="submit">Search</button>
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
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>STT</td>
                            <td><a href="{{route('admin.system.role.show', ['id' => $role->id])}}">{{ $role->name }}</a></td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ $role->level }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL::route('admin.system.role.edit', $role->id) }}">Edit</a>
                                {!! Form::open(['route' => ['admin.system.role.destroy', $role->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                                {!!  Form::close() !!}
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
            {{ $roles->links() }}
        </div>
    </div>
    <!-- end pagination -->
</div>
@endsection