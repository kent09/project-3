<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

$container   = get_theme_mod( 'understrap_container_type' );



?>

<?php if ( is_active_sidebar( 'footerpartnershipfull' ) ) : ?>

    <!-- ******************* The Footer Full-width Widget Area ******************* -->

    <div class="wrapper" id="wrapper-footer-full-partnership">

        <div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

            <div class="row">
            	<?php if( have_rows('pf_links', 'option') ): ?>

            		<?php  while ( have_rows('pf_links', 'option') ) : the_row(); ?>

            			<?php if(get_sub_field('partner_name') == get_field('footer_type')): ?>

		            	<div class="col-md-4">
		            		<div class="textwidget custom-html-widget">
			            		<a href="<?php the_sub_field('logo_link'); ?>">
			            			<?php 
				            			$custom_logo_id = get_theme_mod( 'custom_logo' );
										$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
									?>
									<img src="<?php echo $image[0]; ?>" class="img-fluid" alt="CHEFGOOD" style="padding: 10px;">
			            		</a>
			            	</div>
		                </div>
		                <div class="col-md-4 widget_nav_menu">
		                	<ul class="menu">
		                		<?php if(get_sub_field('meal_plans_link')): ?>
			                		<li>
			                			<a href="<?php the_sub_field('meal_plans_link'); ?>">Meal Plans</a>
			                		</li>
		                		<?php endif; ?>
		                		<?php if(get_sub_field('about_link')): ?>
			                		<li>
			                			<a href="<?php the_sub_field('about_link'); ?>">About Chefgood</a>
			                		</li>
		                		<?php endif; ?>
		                		<?php if(get_sub_field('contact_link')): ?>
			                		<li>
			                			<a href="<?php the_sub_field('contact_link'); ?>">Support</a>
			                		</li>
		                		<?php endif; ?>
		                	</ul>
		                </div>
		                <div class="col-md-4 widget_nav_menu">
		                	<ul class="menu">
		                		<?php if(get_sub_field('faq_link')): ?>
			                		<li>
			                			<a href="<?php the_sub_field('faq_link'); ?>">FAQ</a>
			                		</li>
		                		<?php endif; ?>
		                	</ul>
		                </div>
		                

		                <?php dynamic_sidebar( 'footer-privacy' ); ?>
		                
		                <div class="col-md-4">
		                	<div class="row">
								<div class="col-md-12">
									<div class="socials">
										<span class="socialicons">
											<?php if(get_sub_field('fb_link')): ?>
							                 	<a href="<?php the_sub_field('fb_link'); ?>" target="_blank"><i class="fa fa-facebook "></i></a>
							                <?php endif; ?>
						                 	<?php if(get_sub_field('in_link')): ?>
												<a href="<?php the_sub_field('in_link'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
											<?php endif; ?>
											<?php if(get_sub_field('yb_link')): ?>
												<a href="<?php the_sub_field('yb_link'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
											<?php endif; ?>
											<?php if(get_sub_field('ln_link')): ?>
												<a href="<?php the_sub_field('ln_link'); ?>" target="_blank"><i class="fa fa-linkedin "></i></a>
						                	<?php endif; ?>
						                </span>
									</div>
								</div>
							</div>
		                </div>

                		<?php endif; ?>
                		
		            <?php endwhile; ?>

            	<?php endif; ?>
                	
                <?php // dynamic_sidebar( 'footerpartnershipfull' ); ?>

            </div>

        </div>

    </div><!-- #wrapper-footer-full -->

<?php endif; ?>
