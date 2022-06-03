<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='User Profile' hidden='1' />
<cms:embed "header.html" />    
<div class="site-container mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card-text">
                            <!-- someone who manages to reach here is certainly a logged-in user -->
                            <h5 class="card-title text-center">Edit profile</h5>
                            <h6 class="card-subtitle mb-4 text-muted text-center">You can update your profile here.</h6>
                            <!-- are there any success messages to show from previous save? -->
                            <cms:set success_msg="<cms:get_flash 'success_msg' />" />
                            <cms:if success_msg >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            Profile updated
                                        </div>
                                    </div>
                                </div>
                            </cms:if>


                            <!-- this ia regular databound-form -->
                            
                            <cms:form 
                                    masterpage=k_user_template 
                                    mode='edit'
                                    page_id=global_userid
                                    enctype='multipart/form-data'
                                    method='post'
                                    anchor='0'
                                >

                                <cms:if k_success >        

                                    <cms:check_spam email=frm_extended_user_email />            

                                    <cms:db_persist_form 
                                        _invalidate_cache='0'
                                        _auto_title="0"
                                        k_page_title = "<cms:show frm_firstname /> <cms:show lastname />"
                                        k_page_name = "<cms:if frm_mobile><cms:show frm_mobile /><cms:else /><cms:random_name /></cms:if>"
                                    />                    

                                    <cms:if k_success >
                                        <cms:set_cookie name='register_success' value='1' />
                                        <cms:redirect k_login_link />
                                    </cms:if> 
                                </cms:if>

                                <cms:if k_error >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <cms:each k_error >
                                                    <cms:show item /><br />
                                                </cms:each>
                                            </div>
                                        </div>
                                    </div>
                                </cms:if>
                                
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4 offset-md-3">
                                        <div style="width: 130px !important; height: 130px !important; border: 1px solid rgba(0,0,0,0.3); border-radius: 50%; margin:auto; display:block;">
                                            <img id="profile_pic" src="#" onError="this.onerror = '';this.style.visibility='hidden';"/>
                                        </div>
                                        <label for="profile_pic" class="form-label">Profile Picture</label>
                                        <cms:input name='profile_pic' class="form-control" type='bound' onchange="readURL(this);" />
                                    </div>
                                    <div class="col-md-12 mt-2 mb-3">
                                        <div class="headline-5">
                                            Personal Details
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="firstname" id="firstname" placeholder="First Name" />
                                            <label for="firstname">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="lastname" id="lastname" placeholder="First Name" />
                                            <label for="lastname">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:hide>
                                                <cms:input type="bound" class="form-control" name="dob" id="dob" placeholder="First Name" />
                                            </cms:hide>
                                            <input type="date" class="form-control" name="f_dob" id="f_dob" placeholder="Date of Birth" />
                                            <label for="dob">Date of Birth</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <cms:input type="bound" class="form-select" name="sex" id="sex" placeholder="Gender" />
                                            <label for="sex">Gender</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mt-2 mb-3">
                                        <div class="headline-5">
                                            Location Details
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="city" id="city" placeholder="City" />
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-floating">
                                            <cms:input type="bound" class="form-control" name="country" id="country" placeholder="Country" />
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mt-2 mb-3">
                                        <div class="headline-5">
                                            Profile Details
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="phrase" id="phrase" placeholder="Phrase" />
                                            <label for="phrase">Phrase</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="about" id="about" placeholder="About" />
                                            <label for="about">About</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="expertise" id="expertise" placeholder="Expertise" />
                                            <label for="expertise">Expertise</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="goals" id="goals" placeholder="Goals" />
                                            <label for="goals">Goals</label>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="col-md-12 mt-2 mb-3">
                                        <div class="headline-5">
                                            Login Details
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="extended_user_email" id="extended_user_email" placeholder="First Name" />
                                            <label for="extended_user_email">Email Id</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="mobile" id="mobile" placeholder="First Name" />
                                            <label for="mobile">Mobile</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-12 mb-2">
                                        <div class="alert alert-warning text-center">
                                            Please enter the "Password" and "Repeat Password" field values <strong>ONLY</strong> if you want to change the password. Otherwise, leave it blank.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="extended_user_password" id="extended_user_password" placeholder="First Name" />
                                            <label for="extended_user_password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <cms:input type="bound" class="form-control" name="extended_user_password_repeat" id="extended_user_password_repeat" placeholder="First Name" />
                                            <label for="extended_user_password_repeat">Repeat Password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-md-12">
                                        <button class="btn btn-primary button mb-3 shadow" type="submit">
                                            <i class="fa fa-sign-in"></i> Update Profile
                                        </button>

                                        <button class="btn btn-warning button mb-3 shadow" type="button" onclick="window.location.href='<cms:show k_site_link />';">
                                            <i class="fa fa-times"></i> CANCEL
                                        </button>
                                    </div>
                                </div>
                            </cms:form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<cms:embed "footer.html" />
<?php COUCH::invoke(); ?>