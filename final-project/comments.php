<?php require_once( '../couch/cms.php' ); ?>

 <cms:if k_logged_out >
<cms:redirect "<cms:login_link />" />
</cms:if>


<cms:template title='User Comments' clonable='1' routable='1'  >
     
  <cms:editable name="profile_comments" type='relation' masterpage=k_user_template has='one' />
  <cms:editable name="username" type='text'  />
  <cms:editable name="comment" type="textarea" label="comments" />
  


 
</cms:template>



<?php COUCH::invoke(); ?>