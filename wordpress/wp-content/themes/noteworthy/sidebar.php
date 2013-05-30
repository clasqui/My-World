<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">
            
            <div id="social-media" class="clearfix">
				<?php $social_options = get_option ( 'noteworthy_theme_social_options' ); ?>
                
                <?php
				if ( !isset($social_options['facebook']) ) {
					$social_options['facebook'] = '';
				} else {
                    echo $social_options['facebook'] ? '<a href="' . $social_options['facebook'] . '" class="noteworthy-fb" title="' . $social_options['facebook'] . '">'. __('Facebook', 'noteworthy') .'</a>' : '';
                } ?> 
                <?php 
				if ( !isset($social_options['twitter']) ) {
					$social_options['twitter'] = '';
				} else {
                    echo $social_options['twitter'] ? '<a href="' . $social_options['twitter'] . '" class="noteworthy-tw" title="' . $social_options['twitter'] . '">'. __('Twitter', 'noteworthy') .'</a>' : ''; 
                } ?>   
                <?php 
				if ( !isset($social_options['googleplus']) ) {
					$social_options['googleplus'] = '';
				} else {
                    echo $social_options['googleplus'] ? '<a href="' . $social_options['googleplus'] . '" class="noteworthy-gp" title="' . $social_options['googleplus'] . '">'. __('Google+', 'noteworthy') .'</a>' : ''; 
                } ?>
                <?php 
				if ( !isset($social_options['pinterest']) ) {
					$social_options['pinterest'] = '';
				} else {
                    echo $social_options['pinterest'] ? '<a href="' . $social_options['pinterest'] . '" class="noteworthy-pi" title="' . $social_options['pinterest'] . '">'. __('Pinterest', 'noteworthy') .'</a>' : ''; 
                } ?>
                <?php 
				if ( !isset($social_options['linkedin']) ) {
					$social_options['linkedin'] = '';
				} else {
                    echo $social_options['linkedin'] ? '<a href="' . $social_options['linkedin'] . '" class="noteworthy-li" title="' . $social_options['linkedin'] . '">'. __('LinkedIn', 'noteworthy') .'</a>' : ''; 
                } ?>
                <?php 
				if ( !isset($social_options['rss']) ) {
					$social_options['rss'] = '';
				} else {
                    echo $social_options['rss'] ? '<a href="' . $social_options['rss'] . '" class="noteworthy-rs" title="' . $social_options['rss'] . '">'. __('RSS', 'noteworthy') .'</a>' : ''; 
                } ?>
            </div>
            
            
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
				<aside id="archives" class="widget">
					<h2 class="widget-title"><?php _e( 'Archives', 'noteworthy' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h2 class="widget-title"><?php _e( 'Meta', 'noteworthy' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
