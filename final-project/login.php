<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Login' hidden='1' parent="_users_" order='2' />
<cms:embed 'header.html' />

		<section>
			<div class="login-box">
				<div class="text-center subtitle-1">
					Welcome
				</div>
				<div class="text-center headline-5 fc-blue-a700">
					Sign In
				</div>
				<div class="text-center body-1 mb-4">
					to continue
				</div>
				<cms:if k_logged_in >
			        <cms:set action="<cms:gpc 'act' method='get'/>" />			    
			        <cms:if action='logout' >
			            <cms:process_logout />
			        <cms:else />
			            <cms:redirect k_site_link />
			        </cms:if>			    
			    <cms:else />
                <cms:set register_success_msg="<cms:get_cookie 'register_success' />" scope="global" />
                <cms:if register_success_msg eq "1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <strong>Congratulations! </strong>You account has been created successfully. You can now login.
                            </div>
                        </div>
                    </div>
                    <cms:delete_cookie 'register_success' />
                </cms:if>
				<cms:form method='post' anchor='0'>
					<cms:if k_success >
						<cms:set username="<cms:gpc 'k_user_name' method='get' />" />
						<cms:set password="<cms:gpc 'k_user_pwd' method='get' />" />
						<cms:set cookie="<cms:gpc 'k_cookie_test' method='get' />" />

		                <cms:process_login redirect="0"/>
	                	<cms:php>
							global $FUNCS;
							$FUNCS->set_userinfo_in_context();
						</cms:php>
						
	                	<cms:set save_page_title = "<cms:pages masterpage='users/index.php' id=k_user_id limit='1'><cms:show personal_details_firstname /> <cms:show personal_details_lastname /></cms:pages>" scope="global" />
	                	
						<cms:if k_error >
		                	<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<cms:show k_error />
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
		                </cms:if>
		                <cms:if k_success >
		                	<cms:process_login redirect="1" />							
		            	</cms:if>	                
		            </cms:if>
					<div class="form-floating mb-3">
						<cms:input name='k_user_name' type='text' class="form-control" id="floatingUsername" placeholder="Email or Mobile" />
						<label for="floatingUsername">Email or Phone</label>

					</div>
					<div class="form-floating mb-3">
						<cms:input name='k_user_pwd' type="password" class="form-control" id="floatingPassword" placeholder="Password" />
						<label for="floatingPassword">Password</label>
					</div>
					
                    <div class="mb-3">
					<cms:input type='checkbox' name='k_user_remember' opt_values='Remember me=1' />
                    </div>
					<input type="hidden" name="k_cookie_test" value="1" />
					<button class="btn btn-primary button shadow" type="sumbit">
						<i class="fa fa-sign-in"></i> Login
					</button>
				</cms:form>
				</cms:if>
				<cms:if k_user_lost_password_template >
					<a href="<cms:link k_user_lost_password_template />" class="fc-blue-a700 body-2" style="font-weight: 500;">
						Forgot Password?
					</a>
				</cms:if>
                <br>
                <cms:if k_user_registration_template>
                    <a href="<cms:link k_user_registration_template />"  class="fc-blue-a700 body-2" style="font-weight: 500;"/>
                        Sign up
                    </a>
                </cms:if>
			</div>
		</section>

<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>