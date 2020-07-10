<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="row">
        <header class="entry-header col-md-7">



            <?php if ( 'post' == get_post_type() ) : ?>

                <div class="entry-meta">
                    <div class="float-left">  By <?php $author = get_the_author(); echo $author; ?> in

                        <?php
                        foreach((get_the_category()) as $category){
                            echo $category->name."<br>";
                            echo category_description($category);
                        }
                        ?></div>

                    <div class="float-right"> <?php echo date("F j, Y"); ?></div>
                </div><!-- .entry-meta -->

            <?php endif; ?>

            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();

            } else { ?>
                <img src="https://chefgood.com.au/wp-content/uploads/2018/02/blog_altimage.jpg" class="img-responsive">
            <?php } ?>





        </header><!-- .entry-header -->



        <div class="entry-content col-md-5 mt-sm-0 mt-4">
            <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark" class="font-weight-semi-bold black">', esc_url( get_permalink() ) ),
                '</a></h4>' ); ?>
            <p><?php
                echo wp_trim_words( get_the_content(), 40, '...' );
                ?></p>

            <p class="fourfovemar pb-sm-0 pb-4"><a class="btn btn-primary understrap-read-more-link box-shadow font-weight-semi-bold" href="<?php the_permalink(); ?>">READ MORE</a></p>
            <div style="position:absolute; margin-bottom:0; bottom:0;" class=""><span class="socialshow"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/02/iconshare_03.png"></span><?php echo do_shortcode('[Sassy_Social_Share style="background-color: #8d847d; position: absolute; bottom: 40px; padding: 1px 2px; width: 150px;display:none"]') ?> <a href="<?php the_permalink(); ?>#comments"><img src="<?php echo home_url(); ?>/wp-content/uploads/2018/02/iconshare_04.png"></a> <?php if ( function_exists( 'heart_this_hearts' ) ) { heart_this_hearts(); } ?>


            </div>


            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
                'after'  => '</div>',
            ) );
            ?>

        </div><!-- .entry-content -->


    </div>
</article><!-- #post-## -->


