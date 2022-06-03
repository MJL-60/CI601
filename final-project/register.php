<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Registration' hidden='1' parent="_users_" order="4" />
<cms:embed "header.html" />
    
    <!-- are there any success messages to show from previous actions? -->

        
            <!-- show the registration form -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="headline-1 mb-3 text-center">
                            My Puzzle
                        </div>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    Create an account
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted text-center">
                                    New here? Sign Up to Continue!
                                </h6>
                                <h6 class="card-subtitle mb-4 text-muted text-center">
                                    Already registered? <a href="<cms:show k_login_link />" class="blue500 body-2" style="font-weight: 500;">Back to Login</a>
                                </h6>
                                <cms:form 
                                    masterpage=k_user_template 
                                    mode='create'
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
                                    <div class="col-md-12"></div>
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
                                            <i class="fa fa-sign-in"></i> Create Account
                                        </button>
                                    </div>
                                </div>
                            </cms:form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
<cms:embed "footer.html" />
<?php COUCH::invoke(); ?>