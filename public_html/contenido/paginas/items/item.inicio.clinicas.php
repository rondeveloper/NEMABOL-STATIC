<div class="vc-row-container container parent--home-news">
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid home-news row-stretch">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="vc_row wpb_row vc_inner vc_row-fluid container-fixed">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <h2 style="text-align: left" class="vc_custom_heading section-heading" >Clinicas y centros de salud</h2>
                                    <div class="wpb_text_column wpb_content_element  vc_custom_1543584156825 post-formatting " >
                                        <div class="wpb_wrapper">
                                            <p><span style="color: #768ca5;">Obtenga la informaci&oacute;n m&aacute;s reciente relacionada con nuestro centro m&eacute;dico, noticias de la compa&ntilde;&iacute;a y m&aacute;s.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div id="blogposts-81995eb43fde3dcaf" class="row lab-blog-posts cols-4 posts-layout-top vc_custom_1541771540877" >
                        <?php
                        $rqddcl1 = query("SELECT * FROM clinicas WHERE estado='1' ");
                        while($rqddcl2 = fetch($rqddcl1)){
                        ?>
                        <div class="blog-post-column">         
                            <div class="blog-post-entry post-303 post type-post status-publish format-audio has-post-thumbnail hentry category-interview post_format-post-format-audio">
                                <div class="blog-post-image">
                                    <a href="clinica/<?php echo $rqddcl2['titulo_identificador']; ?>/">
                                        <span class="image-placeholder" style="padding-bottom:62.50000000%;background-color:#eeeeee">
                                            <span class="custom-preloader-image align-center">
                                                <img width="534" height="303" src="contenido/imagenes/images/pulse-1.gif" class="attachment-full size-full" alt="" />
                                            </span>
                                            <img class="img-responsive  img-1 lazyload" width="400" height="250" alt="doctor-interview" title="doctor-interview" data-src="contenido/imagenes/clinicas/team-of-doctors.jpg" />
                                        </span>
                                        <span class="hover-display">
                                            <span class="custom-hover-icon">
                                                <img width="534" height="303" src="contenido/imagenes/images/pulse-1.gif" class="attachment-original size-original" alt="" style="width:120px" />
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="blog-post-content-container">
                                    <div class="blog-post-date">
                                        CLINICA DENTAL
                                    </div>
                                    <h3 class="blog-post-title">
                                        <a href="clinica/<?php echo $rqddcl2['titulo_identificador']; ?>/"><?php echo $rqddcl2['titulo']; ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="more-link ">
                        <div class="show-more">
                            <div class="reveal-button">
                                <a href="clinicas/"
                                   target="" class="btn btn-white">
                                    Mas clinicas                
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
</div>