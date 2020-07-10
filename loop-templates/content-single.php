<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
</main>
</div>
</div>
</div>
</div>


<?php
if ( has_post_thumbnail() ) {
    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

} else {
    $featured_img_url = "http://chefgood.com.au/wp-content/uploads/2018/01/blog_banner.jpg";
} ?>


<div class="bannerarea" style="background-image:url(<?php echo $featured_img_url; ?>); margin-top:-60px;"></div>

<div class="wrapper" id="single-wrapper">
    <div class="container" id="content" tabindex="-1">
        <div class="row">
            <div class="col-md-12 content-area" id="primary">
                <main class="site-main" id="main">
                    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                        <header class="entry-header">

                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                            <div class="entry-meta">

                                <?php understrap_posted_on(); ?>
                                <p class="postedcom"> Posted in <?php
                                    foreach((get_the_category()) as $category){
                                        echo '<span>'.$category->name.'</span><span>,</span> ';
                                    }
                                    ?></p>
                                <?php //echo do_shortcode('[Sassy_Social_Share style="background-color: #8d847d; position: absolute; bottom: 40px; padding: 1px 2px; width: 150px;"]')
                                echo do_shortcode('[Sassy_Social_Share]')
                                ?>
                                <span class="socialshow">
        <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/02/iconshare_03.png">
    </span>
                                <a href="<?php the_permalink(); ?>#comments" class="comment_link">
                                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/02/iconshare_04.png">
                                </a>
                                <?php if ( function_exists( 'heart_this_hearts' ) ) { heart_this_hearts(); } ?>
                            </div><!-- .entry-meta -->



                        </header><!-- .entry-header -->

                        <div class="entry-content">

                            <?php the_content(); ?>

                            <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                                'after'  => '</div>',
                            ) );
                            ?>

                        </div><!-- .entry-content -->

                        <footer class="entry-footer">

                            <?php //understrap_entry_footer(); ?>

                        </footer><!-- .entry-footer -->

                    </article><!-- #post-## -->
