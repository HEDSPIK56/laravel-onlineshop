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
  <button type="button" class="btn btn-primary">Apple</button>
  <button type="button" class="btn btn-primary">Samsung</button>
  <button type="button" class="btn btn-primary">Sony</button>
</div>
<!-- end button group -->
            <!-- search fields -->
            <form>
                <div class="form-group">
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type keyword">
  </div>
            </form>
            <!-- search fields -->

            
            <!-- table -->
            <!-- table end -->
        </div>
    </div>
</div>
@endsection
