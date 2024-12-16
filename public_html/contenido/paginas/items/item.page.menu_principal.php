<nav>
    <ul id="menu-main-1" class="menu">
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-41 current_page_item menu-item-54">
            <a href="<?php echo $dominio; ?>" aria-current="page"><span>Inicio</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614">
            <a href="doctores/"><span>Doctores</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-53">
            <a href="departamentos-medicos/"><span>Especialidades</span></a>
            <ul class="sub-menu">
                <?php
                $rqde1 = query("SELECT titulo,titulo_identificador FROM especialidades WHERE estado='1' ORDER BY id ASC ");
                while ($rqde2 = fetch($rqde1)) {
                    $url_page = 'especialidad/' . $rqde2['titulo_identificador'] . '/';
                    ?>
                    <li class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-991">
                        <a href="<?php echo $url_page; ?>"><span><?php echo $rqde2['titulo']; ?></span></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52">
            <a href="reservar-cita/"><span>Citas</span></a>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-56" style="display:none;">
            <a href="https://demo.kaliumtheme.com/medical/news/"><span>Novedades</span></a>
            <ul class="sub-menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1126">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=one"><span>One Col. Masonry</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1128">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=two"><span>Two Col. Masonry</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1129">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=three&#038;blog-sidebar=hide&#038;blog-pagination-type=endless"><span>Three Col. Masonry</span>
                    </a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1125">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-rounded"><span>Rounded</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1130">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-squared"><span>Classic</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1131">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=left"><span>Sidebar Left</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1132">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=right"><span>Sidebar Right</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1133">
                    <a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=hide"><span>No Sidebar</span></a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1134">
                    <a href="#"><span>Blog Post</span></a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1137">
                            <a href="https://demo.kaliumtheme.com/medical/amazing-health-care-coming-to-your-area/?blog-post-sidebar-alignment=left"><span>Sidebar Left</span></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1138">
                            <a href="https://demo.kaliumtheme.com/medical/kalium-medical-provides-the-care-you-expect/?blog-post-sidebar-alignment=right"><span>Sidebar Right</span></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1139">
                            <a href="https://demo.kaliumtheme.com/medical/what-to-avoid-during-pregnancy/?blog-post-sidebar-alignment=hide"><span>No Sidebar</span></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1140">
                            <a href="https://demo.kaliumtheme.com/medical/regular-eye-exams-are-important-and-thats-why/?blog-post-author-info-placement=left"><span>Author Info Left</span></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1141">
                            <a href="https://demo.kaliumtheme.com/medical/regular-eye-exams-are-important-and-thats-why/?blog-post-author-info-placement=bottom"><span>Author Info Bottom</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121">
            <a href="contacto/"><span>Contacto</span></a>
        </li>
        <li class="special-menu-button menu-item menu-item-type-custom menu-item-object-custom menu-item-1123">
            <a target="_blank" rel="noopener noreferrer" href=""><span>Ingresar</span></a>
        </li>
    </ul>
</nav>
