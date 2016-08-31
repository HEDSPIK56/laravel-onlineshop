@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Dashboard :: @parent @endsection

{{-- Content --}}
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">System setting</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>
            <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Shoop title</th>
                        <td>{{ $data->shop_title }}</td>
                    </tr>
                    <tr>
                        <th>Shop Url</th>
                        <td><a href="{{ $data->shop_url }}" target="_self">{{ $data->shop_url }}</a></td>
                    </tr>
                    <tr>
                        <th>Shop Email</th>
                        <td>{{ $data->shop_email }}</td>
                    </tr>
                    <tr>
                        <th>Shop Logo</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop phone number</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop address</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop facebook</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop facebook APP ID</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop Twitter</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop Twitter Id</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop Googleplus</th>
                        <td>Lastname</td>
                    </tr>
                    <tr>
                        <th>Shop Googleplus Id</th>
                        <td>{{ $data->shop_google_plus_app_id }}}</td>
                    </tr>
                    <tr>
                        <th>Shop Description</th>
                        <td>{{ $data->shop_descripton }}}</td>
                    </tr>
                    <tr>
                        <th>Shop Author</th>
                        <td>{{ $data->shop_descripton }}}</td>
                    </tr>
                    <tr>
                        <th>Shop Generator</th>
                        <td>{{ $data->shop_generator }}}</td>
                    </tr>
                    <tr>
                        <th>Shop Abstract</th>
                        <td>{{ $data->shop_abstract }}}</td>
                    </tr>
                    <tr>
                        <th>Shop Keywords</th>
                        <td>{{ $data->shop_keywords }}}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
