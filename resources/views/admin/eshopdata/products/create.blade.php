<!-- http://vendroid.venmond.com/pages-ecommerce-product-add.php# -->
@extends('admin.layouts.default')
{{-- Web site Title --}}
@section('title') Product create :: @parent @endsection
{{-- end title --}}

{{-- content--}}
@section('main')
{{-- bread scumb--}}
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product list
            <div class="pull-right">
                {!! Breadcrumbs::render('admin.user.index') !!}
            </div>
        </h1>
    </div>
</div>
{{-- end bread scumb--}}

<!-- errors message and success message -->
@include('errors.list')
<!-- end errors messge and success message -->


<div class="row">
    {{-- Left tab --}}
    <div class="col-sm-3 col-md-4 col-lg-3">
        <div class="form-wizard condensed mgbt-xs-20">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Information </a></li>
                <li><a href="#tabprice" data-toggle="tab"> <i class="fa fa-money append-icon"></i> Prices </a></li>
                <li><a href="#tabasso" data-toggle="tab"> <i class="fa fa-link append-icon"></i> Association </a></li>
                <li><a href="#tabimage" data-toggle="tab"> <i class="fa fa-picture-o append-icon"></i> Images </a></li>
                <li><a href="#tabquantities" data-toggle="tab"> <i class="fa fa-folder-open append-icon"></i> Quantities</a></li>
            </ul>
        </div>
    </div>

    {{-- Right tab menu --}}
    <div class="col-sm-9 col-md-8 col-lg-9 tab-right">
        <form class="panel widget panel-bd-left light-widget" action="{{ route('admin.data.product.store') }}" enctype="multipart/form-data" method="post" novalidate data-toggle="validator" role="form" id="myForm">
            <div class="panel-heading no-title"> 
                <div class="vd_panel-menu text-right">
                    <div> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Save Changes</button>
                        <button type="reset" class="btn btn-default btn-sm"><i class="fa fa-times append-icon"></i>Cancel Changes</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-content no-bd mgbt-xs-20">
                    <!-- tab infor -->
                    <div id="tabinfo" class="tab-pane active">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Product Information</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9 controls">
                                <input type="text" name="name" class="form-control" placeholder="Product name" required value="{{ old('name') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tag</label>
                            <div class="col-md-9 controls">
                                <input type="text" name="name" class="form-control" placeholder="Product name" required value="{{ old('name') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Keyworks</label>
                            <div class="col-md-9 controls">
                                <input type="text" name="name" class="form-control" placeholder="Product name" required value="{{ old('name') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9 controls">
                                <textarea rows="3" class="form-control" name="about" required id="editor"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab infor -->

                    <!-- tab tabprice -->
                    <div id="tabprice" class="tab-pane">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Product Price</h3>
                                <hr>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">market price</label>
                            <div class="col-md-9 controls">
                                <div class="input-group">
                                    <span class="input-group-addon">$ </span>
                                    <input type="number" name="market_price" class="form-control" placeholder="Maket price" required value="{{ old('market_price') }}">
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end tabprice -->

                    <!-- tab tabprice -->
                    <div id="tabasso" class="tab-pane">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Associations</h3>
                                <hr>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="control-label col-md-3">Categories</label>
                            <div class="col-md-9 controls">
                                <select class="form-control " id="category_id" name="category_id">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block">Select category for new product</div>
                            </div>
                        </div>
                </div>
                <!-- end tabprice -->

                <!-- tab tabprice -->
                <div id="tabimage" class="tab-pane"></div>
                <!-- end tabprice -->

                <!-- tab tabprice -->
                <div id="tabquantities" class="tab-pane"></div>
                <!-- end tabprice -->
            </div>
        </div>
    </form>
</div>
</div>

@endsection