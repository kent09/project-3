<?php
/**
 * Template Name: Health Mummy Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('health-mummy');
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="hero-wrapper bg-img">
	<div class="mobile">
		<a href="<?php the_field('order_now_link'); ?>" class="view-package">
			<?php echo wp_get_attachment_image( get_field('hero_mobile_image'), "full" ); ?>
		</a>
	</div>
	<div class="desktop">
	 	<a href="<?php the_field('order_now_link'); ?>" class="view-package">
	 		<?php echo wp_get_attachment_image( get_field('hero_image'), "full" ); ?>
	 	</a>
	</div>
	<!-- <div class="<?php echo esc_attr( $container ); ?> desktop d-flex justify-content-start align-items-end"> -->
		<?php if(get_field('order_now_link')): ?>
			<!-- <a href="<?php the_field('order_now_link'); ?>" class="view-package montserrat text-white btn-default font-weight-bold">
				VIEW PACKAGES
			</a> -->
		<?php endif;?>
	<!-- </div> -->
</div>


<?php if(get_field('free_shipping')): ?>
<div class="bg-pink text-center">
	<div class="font-28 text-white font-italic">
		<?php the_field('free_shipping'); ?>
	</div>
</div>
<?php endif; ?>

<?php if(get_field('show_timer')  == true): ?>
    <!--start timer -->
    <div class="bg-pink wrapper timernew">
        <div class="container">
            <h3 class="font-weight-semi-bold"><?php echo get_field('timer_text'); ?></h3>
            <?php echo do_shortcode(get_field('timer_shortcode')); ?>
        </div>
    </div>
<!-- end timer -->
<?php endif; ?>
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> hm-content">
		<div class="row banner">
			<?php if(get_field('banner_image')): ?>
				<div class="col-md-4">
					<?php 
						echo wp_get_attachment_image( get_field('banner_image'), "full" );
					?>
				</div>
			<?php endif; ?>
			<?php if(get_field('banner_content')): ?>
				<div class="col-md-8">
					<div class="content">
						<?php the_field('banner_content'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row">

			<div class="col-md-12">

				<main class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							<footer class="entry-footer">
								<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
							</footer>

						</article>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

		<?php 
		$meal = "";
		$veg = "";
		if( have_rows('meal_package') ): 
			while ( have_rows('meal_package') ) : the_row();

				if(get_sub_field('package') == 'meal'):
					$meal .= '<div class="col-md-6">
						<a href="'.get_sub_field('buy_now_link').'">
						<div class="img-holder">';
					$meal .= !empty(get_sub_field('image')) ? wp_get_attachment_image( get_sub_field('image'), "full" ) : '<img src="'.get_stylesheet_directory_uri().'/img/placeholder.png" alt="Chefgood">';

						if(get_sub_field('save_text')):
					$meal .= '<div class="save text-white gribbon">'.get_sub_field('save_text').'</div>';

						else:

					$meal .= '<div class="save text-white gribbon">GREAT VALUE</div>';	

						endif;
							
					$meal .= '<div class="free-shipping text-white">FREE SHIPPING</div>';

					$meal .= '</div>
						</a>
						<div class="color-pink font-black font-30 font-italic text-uppercase">'.get_sub_field('meal_package').'</div>
						<div class="pre-meal">'.get_sub_field('per_meal').'</div>
						<div class="font-weight-bold price">'.get_sub_field('price').'</div>
						<a href="'.get_sub_field('buy_now_link').'" class="btn-default montserrat text-white font-weight-bold">VIEW MEALS</a>
					</div>';
				else:
					$veg .= '<div class="col-md-6">
						<a href="'.get_sub_field('buy_now_link').'">
						<div class="img-holder">';
							
					$veg .=	!empty(get_sub_field('image')) ? wp_get_attachment_image( get_sub_field('image'), "full" ) : '<img src="'.get_stylesheet_directory_uri().'/img/placeholder.png" alt="Chefgood">';
							
						if(get_sub_field('save_text')):
					$veg .=		'<div class="save text-white gribbon">'.get_sub_field('save_text').'</div>';

						else:

					$veg .=		'<div class="save text-white gribbon">GREAT VALUE</div>';

						endif;

					$veg .=		'<div class="free-shipping text-white">FREE SHIPPING</div>';


					$veg .=	'</div></a>
						<div class="color-pink package-type text-uppercase">'.get_sub_field('package_type').'</div>
						<div class="color-pink font-black font-30 font-italic text-uppercase">'.get_sub_field('meal_package').'</div>
						<div class="pre-meal">'.get_sub_field('per_meal').'</div>
						<div class="font-weight-bold price">'.get_sub_field('price').'</div>
						<a href="'.get_sub_field('buy_now_link').'" class="btn-default montserrat text-white font-weight-bold">VIEW MEALS</a>
					</div>';

				endif;
			endwhile;
		endif; 
		?>

		<div id="package-list" class="row package">
			<?php echo $meal; ?>
		</div>

	</div><!-- #content -->

	<div class="bg-light-blue">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row package">
				<?php echo $veg; ?>
			</div>
		</div>
	</div>

	<?php if(have_rows('how_it_work')): ?>
	    <div id="how-it-works" class="how-it-works text-center bg-light-pink">
	        <div class="container">
	            <div class="row justify-content-md-center">
	                <div class="col-lg-12 col-md-12">
	                    <h1 class="text-center font-30 font-weight-bold mb-0"><?php the_field('h_title');?></h1>
	                </div>
	            </div>
	            <div class="row">   
	            	<?php $i = 1; ?>
	                <?php while ( have_rows('how_it_work') ) : the_row(); ?>
	                    <div class="col-md-4">
	                        <figure>
	                            <?php $imgid = get_sub_field('image'); ?>
	                            <div class="img">
	                                <?php echo wp_get_attachment_image( $imgid, 'full'); ?>
	                                <span class="bg-pink"><?php echo $i; ?></span>
	                            </div>
	                            <figcaption>
	                                <h6 class="mb-0 font-weight-bold black h6_v2">
	                                    <?php the_sub_field('title'); ?>
	                                </h6>
	                                <p class="mb-0"><?php the_sub_field('content'); ?></p>
	                            </figcaption>
	                        </figure>
	                    </div>
	                    <?php $i++; ?>
	                <?php endwhile; ?>   
	            </div>
	            <div class="btn-holder">
	                <a href="<?php the_field('buttom_order_now_link'); ?>" class="view-package montserrat text-white btn-default font-weight-bold">
						VIEW PACKAGES
					</a>
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
</div><!-- #full-width-page-wrapper -->

<?php get_footer('partnership');
