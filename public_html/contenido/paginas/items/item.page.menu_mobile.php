<ul id="menu-main" class="menu">
    <li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-41 current_page_item menu-item-54"><a href="https://demo.kaliumtheme.com/medical/" aria-current="page">Home</a></li>
    <li id="menu-item-614" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614"><a href="doctores/">Doctors</a></li>
    <li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-53"><a href="departamentos-medicos/">Departments</a>
        <ul class="sub-menu">
            <?php
            $rqde1 = query("SELECT titulo,titulo_identificador FROM especialidades WHERE estado='1' ORDER BY id ASC ");
            while ($rqde2 = fetch($rqde1)) {
                $url_page = 'especialidad/' . $rqde2['titulo_identificador'] . '/';
                ?>
                <li id="menu-item-991" class="menu-item menu-item-type-post_type menu-item-object-portfolio menu-item-991"><a href="<?php echo $url_page; ?>"><?php echo $rqde2['titulo']; ?></a></li>
                <?php
            }
            ?>
        </ul>
    </li>
    <li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52"><a href="reservar-cita/">Appointments</a></li>
    <li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-56" style="display:none;">
        <a href="https://demo.kaliumtheme.com/medical/news/">News
        </a>
        <ul class="sub-menu">
            <li id="menu-item-1126" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1126"><a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=one">One Col. Masonry</a></li>
            <li id="menu-item-1128" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1128"><a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=two">Two Col. Masonry</a></li>
            <li id="menu-item-1129" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1129"><a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-masonry&#038;blog-columns=three&#038;blog-sidebar=hide&#038;blog-pagination-type=endless">Three Col. Masonry</a></li>
            <li id="menu-item-1125" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1125"><a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-rounded">Rounded</a></li>
            <li id="menu-item-1130" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1130"><a href="https://demo.kaliumtheme.com/medical/news/?blog-template=blog-squared">Classic</a></li>
            <li id="menu-item-1131" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1131"><a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=left">Sidebar Left</a></li>
            <li id="menu-item-1132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1132"><a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=right">Sidebar Right</a></li>
            <li id="menu-item-1133" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1133"><a href="https://demo.kaliumtheme.com/medical/news/?blog-sidebar=hide">No Sidebar</a></li>
            <li id="menu-item-1134" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1134"><a href="#">Blog Post</a>
                <ul class="sub-menu">
                    <li id="menu-item-1137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1137"><a href="https://demo.kaliumtheme.com/medical/amazing-health-care-coming-to-your-area/?blog-post-sidebar-alignment=left">Sidebar Left</a></li>
                    <li id="menu-item-1138" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1138"><a href="https://demo.kaliumtheme.com/medical/kalium-medical-provides-the-care-you-expect/?blog-post-sidebar-alignment=right">Sidebar Right</a></li>
                    <li id="menu-item-1139" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1139"><a href="https://demo.kaliumtheme.com/medical/what-to-avoid-during-pregnancy/?blog-post-sidebar-alignment=hide">No Sidebar</a></li>
                    <li id="menu-item-1140" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1140"><a href="https://demo.kaliumtheme.com/medical/regular-eye-exams-are-important-and-thats-why/?blog-post-author-info-placement=left">Author Info Left</a></li>
                    <li id="menu-item-1141" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1141"><a href="https://demo.kaliumtheme.com/medical/regular-eye-exams-are-important-and-thats-why/?blog-post-author-info-placement=bottom">Author Info Bottom</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li id="menu-item-1121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1121"><a href="contacto/">Contact</a></li>
    <li id="menu-item-1123" class="special-menu-button menu-item menu-item-type-custom menu-item-object-custom menu-item-1123"><a target="_blank" rel="noopener noreferrer" href="https://1.envato.market/KYm9a">Buy</a></li>
</ul>