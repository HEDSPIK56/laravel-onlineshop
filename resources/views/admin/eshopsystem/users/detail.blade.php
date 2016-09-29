@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') 
	User Detail :: @parent 
@endsection

<!-- start content -->
@section('main')
<div class="page-header">
        {!! Breadcrumbs::render('admin.user.detail',$user) !!}        
</div>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Detail User: {{ $user->profile->getFullName() }}</h1>
    </div>
</div>
<div class="row">
	<!-- image and about -->
	<div class="col-md-3">
        <div class="panel widget light-widget panel-bd-top">
          <div class="panel-heading no-title"> </div>
          <div class="panel-body">
            <div class="text-center vd_info-parent"> 
            	<img alt="example image" src="{{ $user->getAvatar() }}" class="img-thumbnail"> 
            </div>
            <div class="row">
              <div class="col-xs-12"> <a class="btn vd_btn vd_bg-green btn-xs btn-block no-br"><i class="fa fa-check-circle append-icon"></i>Friends</a> </div>
              <div class="col-xs-12"> <a class="btn vd_btn vd_bg-grey btn-xs btn-block no-br"><i class="fa fa-envelope append-icon"></i>Send Message</a> </div>
            </div>
            <h2 class="font-semibold mgbt-xs-5">{{ $user->profile->getFullName() }}</h2>
            <h4>Owner at Our Company, Inc.</h4>
            <p>{{ $user->profile->about }}</p>
            <div class="mgtp-20">
              <table class="table table-striped table-hover">
                <tbody>
                  <tr>
                    <td style="width:60%;">Status</td>
                    <td><span class="label label-success">Active</span></td>
                  </tr>
                  <tr>
                    <td>User Rating</td>
                    <td><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i><i class="fa fa-star vd_yellow fa-fw"></i></td>
                  </tr>
                  <tr>
                    <td>Member Since</td>
                    <td> Jan 07, 2014 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- panel widget -->
        
      </div>
	<!-- end image and profile -->

	<!-- user information -->
	<div class="col-md-9">
		<div class="panel panel-default">
            <div class="panel-heading">About
            	<button class="btn btn-default pull-right">Edit</button>
            </div>
            <div class="panel-body">
            	<div class="row">
            		<div class="col-sm-6">
            			<div class="row">
            				<label class="col-sm-5">First Name: </label>
            				<div class="col-sm-7">{{ $user->profile->first_name }}</div>
            			</div>
            			<div class="row">
            				<label class="col-sm-5">Email: </label>
            				<div class="col-sm-7">{{ $user->email }}</div>
            			</div>
            			<div class="row">
            				<label class="col-sm-5">Address: </label>
            				<div class="col-sm-7">{{ $user->profile->address }}</div>
            			</div>
            		</div>
            		<div class="col-sm-6">
            		<div class="row">
            				<label class="col-sm-5">Last name: </label>
            				<div class="col-sm-7">{{ $user->profile->last_name }}</div>
            			</div>
            			<div class="row">
            				<label class="col-sm-5">Birth day: </label>
            				<div class="col-sm-7">{{ $user->profile->first_name }}</div>
            			</div>
            			<div class="row">
            				<label class="col-sm-5">Number phone: </label>
            				<div class="col-sm-7">{{ $user->profile->phone_number }}</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
	</div>
	<!-- end user information -->
</div>
@endsection
<!-- end content -->