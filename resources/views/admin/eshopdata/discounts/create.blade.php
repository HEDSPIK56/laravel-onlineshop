@extends('admin.layouts.default')
{{-- Web site Title --}}
@section('title') Create discount :: @parent @endsection
{{-- end title --}}

{{-- content--}}
@section('main')
    {{-- bread scumb--}}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create discount
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

    {{--data form--}}
    <form method="POST" action="{{route('admin.data.discount.store')}}" method="post" novalidate data-toggle="validator" role="form" id="myForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{-- discount name --}}
        <div class="form-group row">
            <label class="col-md-3 control-label">Discount name: </label>
            <div class="col-md-9 controls">
                <input type="text" name="name" class="form-control" placeholder="Discount name" required value="{{ old('name') }}">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        {{-- end discount name --}}

        {{-- discount by quantity--}}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-md-12 controls">
                        <span class="vd_radio radio-info">
                            <input type="checkbox" value="1" name="discount_by_quantity">
                            <label> discount_by_quantity </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group row">
                    <label class="col-md-3 control-label">min_quantity</label>
                    <div class="col-md-9 controls">
                        <input type="number" name="min_quantity" class="form-control" placeholder="min_quantity" required value="{{ old('min_quantity') }}" disabled="disabled">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
        {{--end discount by quantity--}}

        {{-- date from --}}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group row">
                    <div class="col-md-12 controls">
                        <span class="vd_radio radio-info">
                            <input type="checkbox" value="1" name="discount_by_period" id="discount_by_period">
                            <label> discount_by_period </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group row">
                    <label for="period_from" class="col-md-3 control-label"> period_from: </label>
                    <div class="col-md-9 controls">
                        <input type="date" class="form-control datetimepicker" name="period_from" value="{{ old('period_from') }}" required id="period_from" placeholder="period_from" disabled="disabled">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group row">
                    <label for="period_to" class="col-md-3 control-label"> period_to: </label>
                    <div class="col-md-9 controls">
                        <input type="date" class="form-control datetimepicker" name="period_to" value="{{ old('period_to') }}" required id="period_to" placeholder="period_to" disabled="disabled">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- date to --}}
        {{-- button submit --}}
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group text-right">
                <button type="submit" name="btn_submit" class="btn btn-primary btn-lg">
                    <i class="fa fa-save"></i>
                    Create new discount</button>
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group text-left">
                    <button type="reset" name="btn_submit" class="btn btn-warning btn-lg">
                        <i class="fa fa-reset"></i>
                        Reset form</button>
                </div>
            </div>
        </div>
        {{-- end button submit --}}
    </form>
    {{--end data form--}}
{{--end content--}}
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/admin/adminDiscount.js') }}"></script>
@stop
