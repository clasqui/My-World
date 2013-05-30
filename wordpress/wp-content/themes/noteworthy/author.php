<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="page-header">
					<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'noteworthy' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>


				<div class="item-wrap clearfix">


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
                        
                        	 <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_post_thumbnail( array( 250, 250) ); ?></a>
                             
						<?php else : ?>
                            
                            <?php $postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
							if ( !empty($postimgs) ) :
								$firstimg = array_shift( $postimgs );
								$my_image = wp_get_attachment_image( $firstimg->ID, array( 250, 250 ) );
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
                
                </div>

				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'noteworthy' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'noteworthy' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>