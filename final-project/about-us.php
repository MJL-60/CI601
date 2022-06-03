<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="About Us" order="3">
    <cms:editable name="aboutus" label="About Us" type="group" order="1" />
        <cms:editable name="aboutus_title" label="Page Title" type="text" group="aboutus" order="1" />
        <cms:editable name="aboutus_desc" label="Page Description" type="richtext" group="aboutus" order="2" />
    
    <cms:editable name="coc" label="Code of Conduct" type="group" order="2" />
        <cms:editable name="coc_title" label="Code of Conduct - Title" type="text" group="coc" order="1" />
        <cms:editable name="coc_desc" label="Code of Conduct - Description" type="richtext" group="coc" order="2" />
</cms:template>
<cms:embed "header.html" />
    <div class="site-container">
        <div class="container">
            <div class="row">
                <cms:if aboutus_title && aboutus_desc>
                    <div class="col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <cms:show aboutus_title />
                                </h5>
                                <div class="card-text">
                                    <cms:show aboutus_desc />
                                </div>
                            </div>
                        </div>
                    </div>
                </cms:if>
                
                <cms:if coc_title && coc_desc>
                    <div class="col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <cms:show coc_title />
                                </h5>
                                <div class="card-text">
                                    <cms:show coc_desc />
                                </div>
                            </div>
                        </div>
                    </div>
                </cms:if>
            </div>
        </div>
    </div>
<cms:embed "footer.html" />
<?php COUCH::invoke(); ?>