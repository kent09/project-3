<div class="the_good_crew f45_onetime_order_goodcrew">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-12"><h2 class="section_title text-center">THE GOOD CREW</h2></div>
        </div>
        <div class="row justify-content-md-center">
            <?php
            if( have_rows('the_good_crew','option') ):
                ?>
                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12" id="vid_content">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="row justify-content-md-center">
                        <?php
                        while ( have_rows('the_good_crew','option') ) : the_row();
                            $image = get_sub_field('featured_image');
                            $video_code =  get_sub_field('video_code');

                            if($video_code != ""){
                                $image = "https://img.youtube.com/vi/".$video_code."/mqdefault.jpg";
                            }
                            ?>
                            <div class="col-lg-4 col-md-4 text-center">
                                <a data-code="<?php echo $video_code; ?>" class="play_video" href="#">
                                    <figure class="figure">
                                        <img src="<?php echo $image; ?>" />
                                        <?php if( get_sub_field('video_url') !="") { ?><img class="play_btn" src="<?php echo get_stylesheet_directory_uri(); ?>/img/play-button.png" /><?php } ?>
                                        <figcaption class="figure-caption text-left">
                                            <h6 class="feat_title tk-caflisch-script-pro"><?php the_sub_field('title'); ?></h6>
                                            <h7 class="feat_subtitle"><?php the_sub_field('name'); ?></h7>
                                            <p>
                                                <?php the_sub_field('description'); ?>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            <?php
            else :
            endif;
            ?>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){

        $('span.tooltip').hover(function(){
            $(this).parents('.slick-slide.slick-active').parents('#slick_container').css('overflow', 'visible');
            $(this).parents('#cg_menu_oto').css('overflow', 'visible');
        }, function(){
            $(this).parents('.slick-slide.slick-active').parents('#slick_container').css('overflow', 'hidden');
            $(this).parents('#cg_menu_oto').css('overflow', 'hidden');
        });

        $("#videoModal").on("hidden.bs.modal",function(){
            $("#iframeYoutube").remove();
        });

        $('.play_video').click(function(e){

            var code = $(this).data('code');
            e.preventDefault();
            $('#vid_content').html('here');
            $('#vid_content').html('<iframe width="100%" height="350"  id="iframeYoutube" src="https://www.youtube.com/embed/'+code+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
            $("#videoModal").modal("show");

        });
    });
</script>