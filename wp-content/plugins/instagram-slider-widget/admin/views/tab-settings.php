<?php
global $form;

$args         = [
	"client_id"     => WIS_INSTAGRAM_CLIENT_ID,
	"redirect_uri"  => "http://instagram.cm-wp.com/?state=" . admin_url( 'admin.php?page=settings-' . WIS_Plugin::app()->getPluginName() ),
	"response_type" => "token",
	"scope" => "basic",
	//"hl" => "en"
];
$autorize_url = "https://instagram.com/oauth/authorize/?" . http_build_query( $args );

?>
<div class="wrap">
    <div class="factory-bootstrap-424 factory-fontawesome-000">
        <h3><?php _e( 'Settings', 'insert-php' ) ?></h3>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 wis-help-text">
                        <p><?php
							echo __( 'Without authorization Instagram limits the number of requests, and after exceeding the limit asks to log in, so an error is displayed that no images were found.', 'instagram-slider-widget' ); ?>
                        </p>
                    </div>
                </div>
                <?php $accounts = WIS_Plugin::app()->getPopulateOption( 'account_profiles', array() ); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div id="wis-add-account-button" class="">
	                        <?php
	                        if ( count( $accounts ) && !WIS_Plugin::app()->is_premium()) : ?>
                                <span class="wis-btn-instagram-account btn-instagram-account-disabled">
                                    <?php _e('Add Account','instagram-slider-widget')?></span>
                                <span class="instagram-account-pro"><?php echo sprintf( __( "More accounts in <a href='%s'>PRO version</a>", 'instagram-slider-widget' ), WIS_Plugin::app()->get_support()->get_pricing_url(true, "wis_settings") );?></span>
                            <?php else: ?>
                                <a class="wis-btn-instagram-account" target="_self" href="<?php echo $autorize_url; ?>" title="Add Account">
                                   <?php _e('Add Account','instagram-slider-widget')?>
                                </a>
                                <span style="float: none; margin-top: 0;" class="spinner" id="wis-spinner"> </span>
	                        <?php endif; ?>
                            <p><a class="wis-not-working" target="_blank" href="#">Button not working?</a></p>
                        </div>
                        <div id="wis-add-token" style="display: none;">
                            Access token <input type="text" id="wis-manual-token" name="wis-manual-token" size="60">
                            <button class="button button-primary button-large" name="wis-btn-manual-token" id="wis-btn-manual-token">Add account</button>
                            <a class="" target="_blank" href="https://instagram.cm-wp.com/get-token/">Get access token</a>
                            <span class="spinner" id="wis-add-token-spinner"></span>
                        </div>
                        <div class="wis-help-text"><?php echo sprintf( __( "After adding an account, go to the <a href='%s'>widget settings</a> and change the \"Search Instagram for\" setting to Account", 'instagram-slider-widget' ), admin_url('widgets.php')) ?></div>
						<?php
						if ( count( $accounts ) ) : ?>
                            <br>
                            <table class="widefat wis-table">
                                <thead>
                                <tr>
                                    <th><?php echo __( 'Image', 'instagram-slider-widget' ); ?></th>
                                    <th><?php echo __( 'ID', 'instagram-slider-widget' ); ?></th>
                                    <th><?php echo __( 'User', 'instagram-slider-widget' ); ?></th>
                                    <th><?php echo __( 'Name', 'instagram-slider-widget' ); ?></th>
                                    <th><?php echo __( 'Token', 'instagram-slider-widget' ); ?></th>
                                    <th><?php echo __( 'Action', 'instagram-slider-widget' ); ?></th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								foreach ( $accounts as $profile_info ) {
									?>
                                    <tr>
                                        <td class="profile-picture">
                                            <img src="<?php echo esc_url( $profile_info['profile_picture'] ); ?>" width="30"/>
                                        </td>
                                        <td><?php echo esc_attr( $profile_info['id'] ); ?></td>
                                        <td>
                                            <a href="https://www.instagram.com/<?php echo esc_html( $profile_info['username'] ); ?>">@<?php echo esc_html( $profile_info['username'] ); ?></a>
                                        </td>
                                        <td><?php echo esc_html( $profile_info['full_name'] ); ?></td>
                                        <td>
                                            <input id="<?php echo esc_attr( $profile_info['id'] ); ?>-access-token" type="text" value="<?php echo esc_attr( $profile_info['token'] ); ?>" class="wis-text-token" readonly/>
                                        </td>
                                        <td>
                                            <a href="#" data-item_id="<?php echo esc_attr( $profile_info['id'] ); ?>" class="btn btn-danger wis-delete-account">
                                                <span class="dashicons dashicons-trash"></span><?php echo __( 'Delete', 'instagram-slider-widget' ); ?>
                                            </a>
                                            <span class="spinner" id="wis-delete-spinner-<?php echo esc_attr( $profile_info['id'] ); ?>"></span>
                                        </td>
                                    </tr>
									<?php
								}
								?>
                                </tbody>
                            </table>
							<?php wp_nonce_field( $this->plugin->getPrefix() . 'settings_form', $this->plugin->getPrefix() . 'nonce' ); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="wis-dashboard-widget" class="wis-right-widget">
					<?php
                    if(!WIS_Plugin::app()->is_premium())
                    {
	                    WIS_Plugin::app()->get_adverts_manager()->render_placement( 'right_sidebar');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
