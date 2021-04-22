<?php

$theme = wp_get_theme();
if ($theme->parent_theme) {
    $template_dir =  basename(get_template_directory());
    $theme = wp_get_theme($template_dir);
}
?>
<div class="wrap about-wrap porto-wrap">
    <h1><?php _e( 'Welcome to Porto!', 'porto' ); ?></h1>
    <div class="about-text"><?php echo esc_html__( 'Porto is now installed and ready to use! Read below for additional information. We hope you enjoy it!', 'porto' ); ?></div>
    <div class="porto-logo"><span class="porto-version"><?php _e( 'Version', 'porto' ); ?> <?php echo porto_version; ?></span></div>
    <h2 class="nav-tab-wrapper">
        <?php
        printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "Theme License", 'porto' ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto-changelog' ), __( "Change log", 'porto' ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto_settings' ), __( "Theme Options", 'porto' ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=porto-setup-wizard' ), __( "Setup Wizard", 'porto' ) );
        ?>
    </h2>
    <div class="row">
        <div class="welcome col-left">
            <div class="porto-section">
                <div class="porto-important-notice registration-form-container">
                    <?php if ( Porto()->is_registered() ) : ?>
                        <p class="about-description"><?php _e( 'Congratulations! Your product is registered now.', 'porto' ); ?></p>
                    <?php else : ?>
                        <p class="about-description"><?php _e( 'Please enter your Purchase Code to complete registration.', 'porto' ); ?></p>
                    <?php endif; ?>
                    <div class="porto-registration-form">
                        <form id="porto_registration" method="post">
                            <?php
                            $disable_field = '';
                            $error_message = get_option( 'porto_register_error_msg' );
                            update_option( 'porto_register_error_msg', '' );
                            $purchase_code = Porto()->get_purchase_code_asterisk();
                            ?>
                            <?php if ( $purchase_code && ! empty( $purchase_code ) ) : ?>
                                <?php if ( Porto()->is_registered() ) : 
                                    $disable_field = " disabled=true"; ?>
                                    <span class="dashicons dashicons-yes porto-code-icon"></span>
                                <?php else : ?>
                                    <span class="dashicons dashicons-no porto-code-icon"></span>
                                <?php endif; ?>
                            <?php else : ?>
                                <span class="dashicons dashicons-admin-network porto-code-icon"></span>
                            <?php endif; ?>
                            <input type="hidden" name="porto_registration" />
                            <?php if( Porto()->is_envato_hosted() ): ?>
                            <p class="confirm unregister">
                                You are using Envato Hosted, this subscription code can not be deregistered.
                            </p>
                            <?php else: ?>
                                <input type="text" name="code" class="regular-text" value="<?php echo $purchase_code; ?>"<?php echo $disable_field; ?> />
                                <?php if( Porto()->is_registered() ): ?>
                                    <input type="hidden" name="action" value="unregister" />
                                    <?php submit_button( esc_attr__( 'Deactivate', 'porto' ), array( "button-danger", "large", "porto-large-button" ),'',true); ?>
                                <?php else: ?>
                                    <input type="hidden" name="action" value="register" />
                                    <?php submit_button( esc_attr__( 'Submit', 'porto' ), array( "primary", "large", "porto-large-button" ),'',true); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </form>
                        <?php if( $error_message ): ?>
                            <p class="error-invalid-code"><?php echo $error_message; ?></p>
                        <?php endif; ?>

                        <p><?php esc_html_e( 'Where can I find my purchase code?', 'porto' ); ?></p>
                        <ol>
                            <li><?php _e( 'Please go to <a target="_blank" href="https://themeforest.net/downloads">ThemeForest.net/downloads</a>', 'porto' ); ?></li>
                            <li><?php _e( 'Click the <strong>Download</strong> button in Porto row', 'porto' ); ?></li>
                            <li><?php _e( 'Select <strong>License Certificate &amp; Purchase code</strong>', 'porto' ); ?></li>
                            <li><?php _e( 'Copy <strong>Item Purchase Code</strong>', 'porto' ); ?></li>
                        </ol>
                    </div>
                </div>
                <p class="about-description">
                    <?php printf( __( 'Before you get started, please be sure to always check out <a href="%s" target="_blank">this documentation</a>. We outline all kinds of good information, and provide you with all the details you need to use Porto.', 'porto'), 'http://www.portotheme.com/wordpress/porto/documentation'); ?>
                </p>
                <p class="about-description">
                    <?php printf( __( 'If you are unable to find your answer in our documentation, we encourage you to contact us through <a href="%s" target="_blank">support page</a> with your site CPanel (or FTP) and wordpress admin details. We are very happy to help you and you will get reply from us more faster than you expected.', 'porto'), 'http://smartwavethemes.net/support'); ?>
                </p>
                <p class="about-description">
                    <a target="_blank" href="http://www.portotheme.com/wordpress/porto/documentation#changelog"><?php _e('Click here to view change logs.', 'porto') ?></a>
                </p>
            </div>
            <div class="porto-thanks">
                <p class="description"><?php _e( 'Thank you, we hope you to enjoy using Porto!', 'porto' ); ?></p>
            </div>
        </div>
        <div class="system-status col-right">
            <h3><?php _e( 'System Status', 'porto' ); ?></h3>
            <?php include_once porto_admin . '/admin_pages/mini-status.php'; ?>
        </div>
    </div>
</div>
