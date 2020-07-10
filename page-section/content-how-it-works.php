<?php if(have_rows('how_it_works', 'option')): ?>
    <div id="how-it-works" class="how-it-works text-center bg-blue pb-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-12">
                    <h1 class="text-center viva_beautiful_pro_b color-primary pt-5"><?php the_field('h_title', 'option');?></h1>
                </div>
            </div>
            <div class="row">   
                <?php while ( have_rows('how_it_works', 'option') ) : the_row(); ?>
                    <div class="col-md-4">
                        <figure>
                            <?php $imgid = get_sub_field('image'); ?>
                            <div class="img">
                                <?php echo wp_get_attachment_image( $imgid, $size,"",$image_class); ?>
                            </div>
                            <figcaption>
                                <h6 class="pt-3 pb-2 mb-0 font-weight-bold black h6_v2">
                                    <?php the_sub_field('title'); ?>
                                </h6>
                                <p class="mb-0 pb-1"><?php the_sub_field('content'); ?></p>
                            </figcaption>
                        </figure>
                    </div>
                <?php endwhile; ?>   
            </div>
            <div class="btn-holder">
                <a href="<?php bloginfo('url') . the_field('get_start_link', 'option'); ?>" class="btn btn-primary box-shadow font-weight-bold"><?php the_field('get_started_text', 'option'); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>