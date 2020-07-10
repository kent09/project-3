<div class="testimonialschefgooders f45_onetime_order_testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><h2>HAPPY CHALLENGERS</h2></div>
        </div>
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <?php
                        $home_post_id = get_option('page_on_front');
                        $hp_fields = get_field('home_fields_v2',$home_post_id);
                        if( $hp_fields){
                            while ( has_sub_field('home_fields_v2',$home_post_id) ) {
                                if( get_row_layout() == 'testimonials' ){
                                    $contents =  get_sub_field('testimonial_contents');
                                    $h = 0;
                                    if($contents){
                                        foreach($contents as $content){
                                        $h++;
                                    ?>
                                    <div class="carousel-item <?php if($h=="1") { echo "active"; } ?>">
                                        <div class="star"><img src="https://chefgood.com.au/wp-content/uploads/2018/12/star_76.jpg"></div>
                                        <h3><?php echo $content['testimonial_title']; ?></h3>
                                        <p style="font-weight:500;"><?php echo $content['description']; ?></p>
                                        <p>- <?php echo $content['name_of_person']; ?> -</p>
                                        <div class="star" style="margin-bottom:0;"></div>
                                    </div>
                        <?php
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>