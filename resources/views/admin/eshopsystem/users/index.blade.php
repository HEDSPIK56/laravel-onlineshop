@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') User list :: @parent @endsection

{{-- Content --}}
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User list</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <!-- group button -->
            <div class="btn-group">
              <button type="button" class="btn btn-primary">Export excel</button>
              <button type="button" class="btn btn-primary">Add new</button>
            </div>
<!-- end button group -->
            <!-- search fields -->
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="user_search" placeholder="Type keyword">
                  </div>
            </form>
            <!-- search fields -->

            
            <!-- table -->
            <table class="table">
                <tr>
                    <th>Actions</th>
                    <th>Images</th>
                    <th>Email</th>
                    <th>Date of birth</th>
                    <th>Role</th>
                    <th>Phone number</th>
                    <th>Address</th>
                    <th>Active Status</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
                        </td>
                        <td>
                            <img src="{{ $user->getAvatar() }}" alt="{{ $user->getAvatarName() }}" class="img-circle" />
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ isset($user->profile) ? $user->profile->getDateOfBirth(): '' }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->display_name }}
                            @endforeach
                        </td>
                        <td>{{ isset($user->profile) ? $user->profile->phone_number : '' }}</td>
                        <td>{{ isset($user->profile) ? $user->profile->address : '' }}</td>
                        <td>
                            @if( $user->activated)
                                <span class="label label-primary">Yes</span>
                            @else
                                <span class="label label-danger">No</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- table end -->
        </div>
    </div>
</div>
@endsection
