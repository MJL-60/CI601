<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Forgot Password' hidden='1' parent="_users_" order='3' />
<cms:embed 'header.html' />

		<section>
			<div class="login-box">
				<div class="text-center subtitle-1">
					We got you covered
					<div class="ptop-5"></div>
				</div>
				<div class="text-center headline-5 fc-blue-a700">
					Reset Your Password
					<div class="ptop-5"></div>
				</div>
				<div class="text-center body-1 fc-grey500 mb-4">
					Enter email to get reset link
				</div>
				<div class="ptop-30"></div>
				<cms:if k_logged_in >
			        <cms:redirect k_site_link />
			    </cms:if>
			    
			    <!-- are there any success messages to show from previous actions? -->
			    <cms:set success_msg="<cms:get_flash 'success_msg' />" />
			    <cms:if success_msg >
			        <div class="notice">
			            <cms:if success_msg='1' >
			                A confirmation email has been sent to you<br />
			                Please check your email.
			            <cms:else />
			                Your password has been reset<br />
							Please check your email for the new password.
			            </cms:if>
			        </div>
			    <cms:else />
			        
			        <!-- now the real work -->
			        <cms:set action="<cms:gpc 'act' method='get'/>" />
			        
			        <!-- is the visitor here by clicking the reset-password link we emailed? -->
			        <cms:if action='reset' >
			            <h1>Reset Password</h1>
			        
			            <cms:process_reset_password />
			            
			            <cms:if k_success >
			                 <cms:set_flash name='success_msg' value='2' />
			                 <cms:redirect k_page_link />          
			            <cms:else />
			            <div class="alert alert-danger alert-dismissible fade show" role="alert">
							<cms:show k_error />
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
			            </cms:if>
			        
			        <cms:else />
			            <cms:form method="post" anchor='0'>
			                <cms:if k_success>
			                
			                    <!-- the 'process_forgot_password' tag below expects a field named 'k_user_name' -->
			                    <cms:process_forgot_password />
			                    
			                    <cms:if k_success>
			                        <cms:set_flash name='success_msg' value='1' />
			                        <cms:redirect k_page_link /> 
			                    </cms:if>    
			                </cms:if>
			                
			                <cms:if k_error >
			                	<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<cms:show k_error />
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
			                </cms:if>
							<div class="form-floating mb-3">
								<cms:input name='k_user_name' type='text' class="form-control" id="floatingUsername" placeholder="Email or Mobile" />
								<label for="floatingUsername">Email</label>
							</div>
							<div class="ptop-20"></div>
							<button class="btn btn-primary button shadow" type="sumbit">
								<i class="fa fa-power-off"></i> Reset
							</button>
						</cms:form>
					</cms:if>
				</cms:if>
				<div class="ptop-20"></div>
				<a href="<cms:show k_login_link />" class="blue500 body-2" style="font-weight: 500;">
					Back to Login
				</a>
			</div>
		</section>

<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>