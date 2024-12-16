<div class="vc-row-container container parent--home-departments">
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid home-departments vc_custom_1543245491934 vc_row-has-fill row-stretch">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div id="departments-1-container" class="lab-portfolio-items portfolio-container-and-title portfolio-loop-layout-type-1  home-departments container vc_custom_1542977178639">
                        <div class="portfolio-title-holder portfolio-title-holder--update-category-descriptions">
                            <div class="pt-column pt-column-title">
                                <div class="section-title no-bottom-margin">
                                    <h2>Especialidades</h2>
                                    <div class="term-description">
                                        <p>
                                            M&eacute;dicos altamente calificados premiados y certificados por las universidades de investigaci&oacute;n m&eacute;dica m&aacute;s famosas del mundo, experimentados por los casos m&aacute;s complicados, est&aacute;n aqu&iacute; para ayudar a nuestros pacientes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        <div class="row">
                            <div id="departments-1" class="portfolio-holder portfolio-type-1 sort-by-js">
                                <?php
                                $rqesp1 = query("SELECT * FROM especialidades WHERE id IN (1,3,4,8) LIMIT 4 ");
                                while($rqesp2 = fetch($rqesp1)){
                                    $url_esp = 'especialidad/'.$rqesp2['titulo_identificador'].'/';
                                    $url_img_esp = 'contenido/imagenes/especialidades/'.$rqesp2['imagen'];
                                    $nombre_esp = $rqesp2['titulo'];
                                ?>
                                <div class="portfolio-item portfolio-item-type-7 has-padding w3 post-718 portfolio type-portfolio status-publish has-post-thumbnail hentry" data-portfolio-item-id="718">
                                    <div class="item-box wow fadeIn">
                                        <div class="photo">
                                            <a href="<?php echo $url_esp; ?>" class="item-link">
                                                <span class="image-placeholder" style="padding-bottom:83.20610687%;background-color:#e9e9e8">
                                                    <style>
                                                        .image-placeholder > .custom-preloader-image { padding:px; }
                                                        .image-placeholder > .custom-preloader-image { width:170px; }
                                                    </style>
                                                    <span class="custom-preloader-image align-center">
                                                        <img width="534" height="303" src="contenido/imagenes/images/pulse-1.gif" class="attachment-full size-full" alt="" />
                                                    </span>
                                                    <img width="655" height="545" class="attachment-portfolio-img-1 size-portfolio-img-1 img-1169 lazyload" alt="" data-src="<?php echo $url_img_esp; ?>" />
                                                </span>
                                                <span class="on-hover opacity-yes">
                                                    <span class="custom-hover-icon">
                                                        <img width="534" height="303" src="contenido/imagenes/images/pulse-1.gif" class="attachment-original size-original" alt="" style="width:120px" />						
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h3>
                                                <a href="<?php echo $url_esp; ?>" class="item-link">
                                                    <?php echo $nombre_esp; ?>
                                                </a>
                                            </h3>
                                            <p class="sub-title">
                                                Brindamos servicios preventivos, restaurativos y de ortodoncia bajo anestesia local y general junto con atenci&oacute;n dental de rutina.
                                            </p>		
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>

                            <script type="text/javascript">
                                var portfolioContainers = portfolioContainers || [];
                                portfolioContainers.push({"instanceId": "departments-1", "instanceAlias": "departments", "baseQuery": {"post_type": ["portfolio"], "post_status": "publish", "posts_per_page": 4, "orderby": "date", "post__in": [718, 722, 724, 726], "post__not_in": [], "paged": 0, "meta_query": [{"key": "_thumbnail_id", "compare": "EXISTS"}]}, "vcAttributes": {"portfolio_query": "size:4|order_by:date|post_type:,portfolio|by_id:718,722,724,726", "title": "Departments", "title_tag": "h2", "description": "Highly skilled doctors awarded and certified by the most famous medical research universities around the globe, experienced by the most complicated cases they are here to help our patients.", "category_filter": "yes", "default_filter_category": "default", "filter_category_hide_all": "", "portfolio_type": "type-1", "columns": "4", "reveal_effect": "fade", "portfolio_spacing": "inherit", "dynamic_image_height": "no", "portfolio_full_width_title_container": "yes", "portfolio_full_width": "inherit", "pagination_type": "static", "more_link": "url:https%3A%2F%2Fdemo.kaliumtheme.com%2Fmedical%2Four-departments%2F|title:All%20Departments||", "endless_auto_reveal": "", "endless_show_more_button_text": "Show More", "endless_no_more_items_button_text": "No more portfolio items to show", "endless_per_page": "", "el_class": "home-departments", "css": ".vc_custom_1542977178639{margin-bottom: 10px !important;}"}, "postId": 0, "count": 4, "countByTerms": [], "lightboxData": null, "filterPushState": false});
                            </script>
                            <div class="more-link ">
                                <div class="show-more">
                                    <div class="reveal-button">
                                        <a href="departamentos-medicos/" target="" class="btn btn-white">
                                            Todas las especialidades
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vc_row wpb_row vc_inner vc_row-fluid container-fixed">
                        <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-lg-3 vc_col-xs-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  departments-list post-formatting " >
                                        <div class="wpb_wrapper">
                                            <ul>
                                                <li>Dermatolog&iacute;a</li>
                                                <li>Urolog&iacute;a</li>
                                                <li>Podolog&iacute;a</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-lg-3 vc_col-xs-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  departments-list post-formatting " >
                                        <div class="wpb_wrapper">
                                            <ul>
                                                <li>Radiolog&iacute;a</li>
                                                <li>Nefrolog&iacute;a</li>
                                                <li>Oncolog&iacute;a</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-lg-3 vc_col-xs-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  departments-list post-formatting " >
                                        <div class="wpb_wrapper">
                                            <ul>
                                                <li>Rinolog&iacute;a</li>
                                                <li>Medicina deportiva</li>
                                                <li>Reumatolog&iacute;a</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-3 vc_col-lg-3 vc_col-xs-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  departments-list post-formatting " >
                                        <div class="wpb_wrapper">
                                            <ul>
                                                <li>Neumolog&iacute;a</li>
                                                <li>Neurolog&iacute;a</li>
                                                <li>Endocrinolog&iacute;a</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
</div>