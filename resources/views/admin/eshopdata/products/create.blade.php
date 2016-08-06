@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.partials.errors')
            @include('admin.partials.success')
            <form method="POST" action="{{route('admin.data.product.store')}}" enctype="multipart/form-data">
                @include('admin.eshopdata.products._form')
            </form>
        </div>
    </div>
</div>
@endsection