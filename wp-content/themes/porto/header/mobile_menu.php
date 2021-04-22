<?php
global $porto_settings;
if ( empty( $porto_settings['mobile-panel-type'] ) ) :

    $header_type = porto_get_header_type();
?>

<div id="nav-panel" class="<?php echo (isset($porto_settings['mobile-panel-pos']) && $porto_settings['mobile-panel-pos']) ? $porto_settings['mobile-panel-pos'] : '' ?>">
    <div class="container">
        <div class="mobile-nav-wrap">
            <?php
            if ( '7' == $header_type ) {
                // show currency and view switcher
                $switcher = '';
                $switcher .= porto_mobile_currency_switcher();
                $switcher .= porto_mobile_view_switcher();

                if ($switcher) {
                    echo '<div class="switcher-wrap">'.$switcher.'</div>';
                }
            }

            // show top navigation and mobile menu
            $menu = porto_mobile_menu();

            if ($menu)
                echo '<div class="menu-wrap">'.$menu.'</div>';

            $header_type = porto_get_header_type();

            if (($header_type == 1 || $header_type == 4 || $header_type == 9 || $header_type == 13 || $header_type == 14) && $porto_settings['menu-block']) {
                echo '<div class="menu-custom-block">' . force_balance_tags($porto_settings['menu-block']) . '</div>';
            }

            $menu = porto_mobile_top_navigation();

            if ($menu)
                echo '<div class="menu-wrap">'.$menu.'</div>';
            ?>
        </div>
    </div>
</div>
<?php endif; ?>