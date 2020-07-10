<?php if( have_rows('review', 'option') ): ?>
    <div id="review" class="testimonial wrapper bg-blue">
        <div class="container">
            <div class="owl-carousel owl-theme text-center">
                <?php while ( have_rows('review', 'option') ) : the_row(); ?>
                    <div class="item">
                        <?php $imgid = get_sub_field('photo'); ?>
                        <div class="user-img">
                            <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                        </div>
                        <div class="title"><?php the_sub_field('title'); ?></div>
                        <div class="content"><?php the_sub_field('content'); ?></div>
                        <div class="name"><?php the_sub_field('name'); ?></div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="read-more text-center">
                <div><?php the_field('review_bottom_text', 'option'); ?></div>
            </div>
            <div class="btn-holder text-center">
                <a href="<?php bloginfo('url') . the_field('review_link', 'option'); ?>" class="btn btn-primary box-shadow font-weight-bold"><?php the_field('review_btn_text', 'option'); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>