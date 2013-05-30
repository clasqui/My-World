
	
    </div><!-- #container -->
</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
        <div id="site-generator">
            <?php echo __('&copy; ', 'noteworthy') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_home() || is_front_page() ) : ?>
            <?php _e('- Powered by ', 'noteworthy'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'noteworthy' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'noteworthy' ); ?>"><?php _e('Wordpress' ,'noteworthy'); ?></a>
			<?php _e(' and ', 'noteworthy'); ?><a href="<?php echo esc_url( __( 'http://wpthemes.co.nz/', 'noteworthy' ) ); ?>"><?php _e('WPThemes.co.nz', 'noteworthy'); ?></a>
            <?php endif; ?>
        </div>
    </footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>