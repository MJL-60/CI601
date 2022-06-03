<?php require_once( '../couch/cms.php' ); ?>

<cms:template clonable='1' routable="1" title='Users' hidden='1' parent="_users_" order="1">
    <!-- 
        If additional fields are required for users, they can be defined here in the usual manner.
    -->        
    <cms:editable name="firstname" label="First Name" type="text" order="1" />
    <cms:editable name="lastname" label="Last Name" type="text" order="2" />
    <cms:editable name="profile_pic" label="Profile Picture" type="securefile" order="3" />
    <cms:editable name="dob" label="Date of Birth" type="datetime" order="4" />
    <cms:editable name="sex" label="Gender" type="dropdown" opt_values="Select=- | Male | Female | Other | Prefer not to say" order="5" />
    <cms:editable name="city" label="City" type="text" order="6" />
    <cms:editable name="country" label="Country" type="text" order="7" />
    <cms:editable name="about" label="About Me" desc="Tell us a bit about yourself!" type="textarea" no_xss_check="1" order="8" />
    <cms:editable name="phrase" label="Phrase" desc="Give us a catchy phrase!" type="text" order="9" />
    <cms:editable name="expertise" label="Expertise" desc="Tell us your areas of coding expertise" type="textarea" no_xss_check="1" order="10" />
    <cms:editable name="goals" label="Goals" desc="What are your goals on Puzzle?" type="textarea" no_xss_check="1" order="11" />
    <cms:editable name="mobile" label="Mobile" type="text" validator="min_len=11 | max_len=12 | non_negative_integer" order="12" />
    
    <!--    Custom Routes-->
    <cms:route name='page_view' path='{:id}/page' >
        <cms:route_validators id='non_zero_integer' />
    </cms:route>
    <!--    Custom Routes-->
</cms:template>
<cms:embed "header.html" />
<cms:match_route debug='0' />
<div class="site-container">
    <div class="container">
        <div class="row">
            <cms:embed "users/<cms:show k_matched_route />.html" />
        </div>
    </div>
</div>
<cms:embed "footer.html" />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>