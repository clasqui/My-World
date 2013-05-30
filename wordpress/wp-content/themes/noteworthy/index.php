<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">
        
          <div id="featured" class="clearfix">

             <div id="featured-latest" class="col480">
			 <?php 
            	$rPost = new WP_Query( array(
					'posts_per_page' => 1,
					'post__in' => get_option("sticky_posts")
				));
			?>

           <?php if ( $rPost->have_posts() ) : $rPost->the_post(); $do_not_duplicate = $post->ID; ?>
             
             		
                    <div class="featured-content">
                        <header>
                          <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'noteworthy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'View Post', 'noteworthy' ); ?></a></h2>
                        </header> 
                        <div class="circle-arrow"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'noteworthy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'View Post', 'noteworthy' ); ?></a></div>
                   </div>

               
              		<?php if ( has_post_thumbnail()) : ?>
                        
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_post_thumbnail( array( 400, 400), array( 'onload' => 'feat_img_onload(this)') ); ?></a>
                         
                    <?php else : ?>
                        
                        <?php $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
                        if ( !empty($postimgs) ) :
                            $firstimg = array_shift( $postimgs );
                            $my_image = wp_get_attachment_image( $firstimg->ID, array( 400, 400 ), false, array( 'onload' => 'feat_img_onload(this)') );
                        ?>
                        
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $my_image; ?></a>
                        <?php endif; ?>
                        
                    <?php endif; ?>

               <?php endif; ?>
           
             <?php wp_reset_query(); ?>
       
             </div>
             
             <div id="featured-list" class="col480">
				 <?php 
                    $fPosts = new WP_Query( array(
						'offset' => 1,
						'posts_per_page' => 10,
                        'post__in' => get_option("sticky_posts"),
						'ignore_sticky_posts' => 1,
                    ));
                 ?>
                 <h1>Featured</h1>
                 <div id="boxscroll">
                 <?php if ( $fPosts->have_posts() ) : ?>
                 		
                         <ul>
                         <?php /* Start the Loop */ ?>
                            <?php while ( $fPosts->have_posts() ) : $fPosts->the_post(); ?>
                            <li class="featured-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'noteworthy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'View Post', 'noteworthy' ); ?></a></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </ul>
                        
                <?php wp_reset_query(); ?>
                </div>
             </div>

          </div>

          <div class="item-wrap clearfix">
			<?php 
				$sticky = get_option("sticky_posts");
				query_posts( array(
					'post__not_in' => $sticky,
					'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
			)); ?>
            
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                

					<div class="item col300">
                    
                       <div class="item-cat">
                        	<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'noteworthy' ) );
								if ( $categories_list && noteworthy_categorized_blog() ) :
							?>
							<span class="cat-links">
								<?php printf( __( '%s', 'noteworthy' ), $categories_list ); ?>
							</span>
							<?php endif; // End if categories ?>
                        </div>
                    
                      <div class="item-content">
                        <header>
                    	  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'noteworthy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'View Post', 'noteworthy' ); ?></a></h2>
                        </header>
                      </div>
                      
                      <?php 
						if ( has_post_thumbnail()) : ?>
                        
                        	 <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_post_thumbnail( array( 250, 250), array( 'onload' => 'thumb_img_onload(this)') ); ?></a>
                             
						<?php else : ?>
                            
                            <?php $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
							if ( !empty($postimgs) ) :
								$firstimg = array_shift( $postimgs );
								$my_image = wp_get_attachment_image( $firstimg->ID, array( 250, 250 ), false, array( 'onload' => 'thumb_img_onload(this)') );
							?>
                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $my_image; ?></a>
                            <?php endif; ?>
                            
                        <?php endif; ?>

                    </div>
                    

				<?php endwhile; ?>

				<?php if (function_exists("noteworthy_pagination")) {
							noteworthy_pagination(); 
				} elseif (function_exists("noteworthy_content_nav")) { 
							noteworthy_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'noteworthy' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post_content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'noteworthy' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
            <?php wp_reset_query() ?>
            
          </div>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>