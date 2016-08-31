@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') System setting create page :: @parent @endsection

{{-- Content --}}
@section('main')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create page</h1>
    </div>
</div>
<div class="row">    
    <div class="col-sm-12">
        <div class="panel panel-red" >
            <div class="panel-heading">
                <div class="panel-title">Create system setting</div>
            </div>     

            <div class="panel-body" >
                <form id="system_setting" class="form-horizontal form-custom" role="form" action="{{route('admin.system.system-setting.store')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="shopTitle" class="col-sm-3 control-label font-bold color-black">Shop title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shopTitle" name="shop_title"
                                   placeholder="Shop title" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shopUrl" class="col-sm-3 control-label font-bold color-black">Shop url</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" id="shopUrl"
                                   placeholder="Shop url" name="shop_url" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shopEmail" class="col-sm-3 control-label font-bold color-black">Shop email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="shopEmail"
                                   placeholder="Shop Email" name="shop_email" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shopLogo" class="col-sm-3 control-label font-bold color-black">Shop logo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shopLogo" name="shop_logo"
                                   placeholder="Shop logo" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_phone_number" class="col-sm-3 control-label font-bold color-black">Shop url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_phone_number"
                                   placeholder="Shop number" name="shop_phone_number" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_address" class="col-sm-3 control-label font-bold color-black">Shop addpress</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="shop_address"
                                   placeholder="shop_address" name="shop_address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_facebook" class="col-sm-3 control-label font-bold color-black">shop_facebook</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="shop_facebook"
                                   placeholder="shop_facebook" name="shop_facebook" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_facebook_app_id" class="col-sm-3 control-label font-bold color-black">shop_facebook_app_id</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="shop_facebook_app_id"
                                   placeholder="shop_facebook_app_id" name="shop_facebook_app_id" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_twitter" class="col-sm-3 control-label font-bold color-black">shop_twitter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_twitter"
                                   placeholder="shop_twitter" name="shop_twitter" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_twitter_app_id" class="col-sm-3 control-label font-bold color-black">shop_twitter_app_id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_twitter_app_id"
                                   placeholder="shop_twitter_app_id" name="shop_twitter_app_id" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_twitter" class="col-sm-3 control-label font-bold color-black">shop_twitter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_twitter"
                                   placeholder="shop_twitter" name="shop_twitter" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_google-plus_app_id" class="col-sm-3 control-label font-bold color-black">shop_google-plus_app_id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_google-plus_app_id"
                                   placeholder="shop_google-plus_app_id" name="shop_google-plus_app_id" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_descripton" class="col-sm-3 control-label font-bold color-black">shop_descripton</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_descripton"
                                   placeholder="shop_descripton" name="shop_descripton" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_author" class="col-sm-3 control-label font-bold color-black">shop_author</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_author"
                                   placeholder="shop_author" name="shop_author" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_generator" class="col-sm-3 control-label font-bold color-black">shop_generator</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_generator"
                                   placeholder="shop_generator" name="shop_generator" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_abstract" class="col-sm-3 control-label font-bold color-black">shop_abstract</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_abstract"
                                   placeholder="shop_abstract" name="shop_abstract" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_keywords" class="col-sm-3 control-label font-bold color-black">shop_keywords</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_keywords"
                                   placeholder="shop_keywords" name="shop_keywords" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="shop_robots" class="col-sm-3 control-label font-bold color-black">shop_robots</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_robots"
                                   placeholder="shop_robots" name="shop_robots" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_google_analytics_code" class="col-sm-3 control-label font-bold color-black">shop_google_analytics_code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="shop_google_analytics_code"
                                   placeholder="shop_google_analytics_code" name="shop_google_analytics_code" />
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-warning">Reset form</button>
                        </div>
                    </div>
                </form>     
            </div>                     
        </div>  
    </div>
</div>
@endsection
