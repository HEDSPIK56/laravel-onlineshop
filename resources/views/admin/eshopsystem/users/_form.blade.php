<!-- form content -->
        <div class="row">
            <!-- form left -->
            <div class="col-md-6 col-xs-12 form-left">
                <div class="panel panel-default">
                    <div class="panel-heading">Account setting</div>
                    <div class="panel-body">
                        <!-- email -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email: </label>
                            <div class="col-md-9 controls">
                                <input type="email" name="email" class="form-control" placeholder="email@yourcompany.com" required data-error="Email address is invalid" value="{{ old('email') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- emd email -->

                        <!-- password -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password: </label>
                            <div class="col-md-9 controls">
                                <input type="password" class="form-control" placeholder="password" name="password" required data-minlength="6" id="inputPassword">
                                <div class="help-block">Minimum of 6 characters</div>
                            </div>
                        </div>
                        <!-- end password -->

                        <!-- confirm password -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm Password: </label>
                            <div class="col-md-9 controls">
                                <input type="password" class="form-control" data-match="#inputPassword" placeholder="confirm password" name="password_confirmation" data-match-error="Whoops, these don't match">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end confirm password -->

                        <!-- role -->
                        <div class="form-group">
                            <label for="role" class="control-label col-md-3">Role</label>
                            <div class="col-md-9 controls">
                                <select class="form-control select2 " id="role" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block">Select role for new user</div>
                            </div>
                        </div>
                        <!-- end role -->

                        <!-- avatar -->
                        <div class="form-group">
                            <label for="upload_file" class="control-label col-md-3">Avatar: </label>
                            <div class="col-md-9 controls">
                                <input name="avatar" type="file" id="upload_file" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <!-- end avatar -->
                    </div>
                </div>
                
                <!-- preview image upload -->
                <div class="panel panel-default">
                    <div class="panel-heading">Preview avatar upload</div>
                    <div class="panel-body">
                        <img id="review_image" class="img-rounded" src="#" alt="sds"/>
                    </div>
                  </div>
                <!-- End preview image upload -->
            </div>
            <!-- end form left -->

            <!-- form right -->
            <div class="col-md-6 col-sx-12 form-right">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile setting</div>
                    <div class="panel-body">
                        <!-- first name -->
                        <div class="form-group">
                            <label for="first_name" class="col-md-3 control-label"> First name: </label>
                            <div class="col-md-9 controls">
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required id="date_of_birth" placeholder="Please input first name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end first name -->
                        <!-- last name -->
                        <div class="form-group">
                            <label for="last_name" class="col-md-3 control-label"> Last name: </label>
                            <div class="col-md-9 controls">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required id="date_of_birth" placeholder="Birth day">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end last name -->

                        <!-- gender -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Gender</label>
                            <div class="col-md-9 controls">
                                <span class="vd_radio radio-info">
                                    <input type="radio" checked="" value="M" id="optionsRadios3" name="sex">
                                    <label for="optionsRadios3"> Male </label>
                                </span>
                                <span class="vd_radio  radio-danger"> 
                                    <input type="radio" value="F" id="optionsRadios4" name="sex">
                                    <label for="optionsRadios4"> Female </label>
                                </span> 
                            </div>
                        </div>
                        <!-- end gender -->

                        <!-- Birthday -->
                        <div class="form-group">
                            <label for="date_of_birth" class="col-md-3 control-label"> Birthday: </label>
                            <div class="col-md-9 controls">
                                <input type="date" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}" required id="date_of_birth" placeholder="Birth day">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end Birthday -->

                        <!-- address -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address: </label>
                            <div class="col-md-9 controls">
                                <input type="text" class="form-control" name="address" required value="{{ old('address') }}" placeholder="Please input address" id="autocomplete">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end address -->

                        <!-- about -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">About</label>
                            <div class="col-md-9 controls">
                                <textarea rows="3" class="form-control" name="about" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end about -->
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Contact setting</div>
                    <div class="panel-body">
                        <!-- mobile number-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone number: </label>
                            <div class="col-md-9 controls">
                                <input type="number" placeholder="Phone number" class="form-control" name="phone_number" value="{{ old('phone_number') }}"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end mobile number-->

                        <!-- Google plus link-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Google plus: </label>
                            <div class="col-md-9 controls">
                                <input type="url" placeholder="Goolge plus" class="form-control" name="google_plus_link" value="{{ old('google_plus_link') }}"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- end google plus link-->

                        <!-- Facebook link-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Facebook: </label>
                            <div class="col-md-9 controls">
                                <input type="url" placeholder="Facebook link" class="form-control" name="facebook_link" value="{{ old('facebook_link') }}"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- End facebook link-->

                        <!-- Twitter link-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Twitter: </label>
                            <div class="col-md-9 controls">
                                <input type="url" placeholder="twitter link" class="form-control" name="twitter_link" value="{{ old('twitter_link') }}"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- End Twitter link-->
                    </div>
                </div>
            </div>
            <!-- end form left -->
        </div>
        <!-- end form content -->