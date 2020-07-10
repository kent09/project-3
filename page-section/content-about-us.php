<?php if(have_rows('quality_list', 'option')): ?>
    <div id="about-us-section" class="quality text-center pb-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-12">
                    <h1 class="text-center viva_beautiful_pro_b color-primary pt-5"><?php the_field('quality_title', 'option'); ?></h1>
                    <h6 class="subtitle pb-2"><?php the_field('quality_subtitle', 'option'); ?></h6>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <?php while ( have_rows('quality_list', 'option') ) : the_row(); ?>
                    <div class="col-md-4 pb-4">
                        <figure>
                            <?php $imgid = get_sub_field('image'); ?>
                            <div class="img">
                                <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                            </div>
                            <figcaption>
                                <h6 class=" pt-3 pb-2 mb-0 font-weight-bold h6_v2 color-primary">
                                    <?php the_sub_field('title'); ?>
                                </h6>
                                <p class="mb-0"><?php the_sub_field('content'); ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="btn-holder">
                <a href="<?php bloginfo('url') . the_field('about_btn_link', 'option'); ?>" class="btn btn-primary box-shadow font-weight-bold"><?php the_field('about_btn_text', 'option'); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>