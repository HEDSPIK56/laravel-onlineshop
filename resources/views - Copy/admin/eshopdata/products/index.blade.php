@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <a href="{{route('admin.data.product.create')}}" class="btn btn-primary btn-block">Add new product</a>
            </div>
            <div class="col-sm-8 text-right">
                <form class="form-inline" action="admin.data.product.index">
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
                            <th>Category</th>
                            <th>Discount</th>
                            <th>Price</th>
                            <th>Maket price</th>
                            <th>Status</th>
                            <th>Images</th>
                            <th>Visible</th>
                            <th>Use slide show</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>STT</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->market_price}}</td>
                            <td>{{ $product->status}}</td>
                            <td></td>
                            <td>{{ $product->visible }}</td>
                            <td>{{ $product->use_slideshow }}</td>
                            <td>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                                {!! Form::open(['route' => ['admin.data.product.copy'], 'method' => 'POST']) !!}
                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                {!! Form::submit('Copy', ['class' => 'btn btn-primary']) !!}
                                {!!  Form::close() !!}
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