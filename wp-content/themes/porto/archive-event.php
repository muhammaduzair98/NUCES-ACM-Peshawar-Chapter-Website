<?php get_header() ?>

<?php
global $porto_settings, $porto_layout;
$event_layout = $porto_settings['event-archive-layout'];


//var_dump($porto_layout);
//die;
?>
<div id="content" role="main" class="container">

    <?php if (!is_search() && $porto_settings['event-title']) : ?>
        <?php if ($porto_layout === 'widewidth') : ?><div class="container"><?php endif; ?>
        <?php if ($porto_settings['event-sub-title']) : ?>
            <h2 class="m-b-xs"><?php echo force_balance_tags($porto_settings['event-title']) ?></h2>
            <p class="lead m-b-xl"><?php echo force_balance_tags($porto_settings['event-sub-title']) ?></p>
        <?php else : ?>
            <h2><?php echo force_balance_tags($porto_settings['event-title']) ?></h2>
        <?php endif; ?>
        <?php if ($porto_layout === 'widewidth') : ?></div><?php endif; ?>
    <?php endif; ?>
    <?php
    $args = array(
		'post_type' 	=> get_post_type(),
		'post_status'	=> 'publish',
		'meta_key'      => 'event_start_date',
  		'orderby'       => 'meta_value',
		);

$event_query = new WP_Query( $args );
?>
    
    <?php if ($event_query->have_posts()) : ?>
        <div class="page-events clearfix">
           
            <div class="row event-row archive-event-row">
                <?php
				$event_count = 0;
                while ($event_query->have_posts()) {
					$event_count++;
                    $event_query->the_post();
					?>
					<div class="col-lg-6 <?php if($event_layout == 'grid') echo 'col-md-8 offset-lg-0 offset-md-2 custom-sm-margin-bottom-1 p-b-lg'; ?>">
                    	<?php get_template_part('content', 'archive-event-'.$event_layout); ?>    
					</div>
                 <?php
				 if($event_count % 2 == 0 && ($event_query->current_post +1) != ($event_query->post_count))
				 	echo '</div><div class="row event-row archive-event-row">';
                }
                ?>
            </div>
            <?php porto_pagination(); ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p><?php _e('Apologies, but no results were found for the requested archive.', 'porto'); ?></p>
    <?php endif; ?>
</div>


<?php get_footer() ?>
