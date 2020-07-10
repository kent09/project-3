<?php
$container = get_theme_mod( 'understrap_container_type' );
$meal_plans_page = get_page_by_path('meal-plans');
$pageID = $meal_plans_page->ID;
$image_class = array("class"=>'mx-auto d-block img-fluid');
?>
<div class="three_cols_featured pb-5 pt-5">
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text-center viva_beautiful_pro_b"><?php echo get_field('top_mealplan_main_heading', 'option') ?></h1>
                <h6 class="text-center pb-2 font-weight-bold"><?php echo get_field('top_mealplan_sub_heading', 'option') ?></h6>
            </div>
        </div>
        <div class="row justify-content-md-center">
         <?php
         $meal_options = get_field('meal_plan_options', $pageID );
         if($meal_options) {
             $i = 1;
             foreach($meal_options as $meal_opt){
         ?>
                    <div class="col-lg-4 col-md-4 text-center">
                        <a href="<?php echo get_bloginfo('url').'/meal-plans/?filter='.$meal_opt['id']; ?>">
                            <figure class="figure">
                                <?php
                                $img_id = $meal_opt['image'];
                                $size = 'full';
                                if( $img_id) {
                                    echo wp_get_attachment_image( $img_id, $size,"",$image_class);
                                }
                                ?>
                                <figcaption class="figure-caption text-center">

                                    <h6 class=" pt-3 pb-2 mb-0 font-weight-bold color-primary">
                                        <?php echo $meal_opt['title']; ?>
                                    </h6>
                                    <p class="mb-0 pb-1">
                                        <?php echo $meal_opt['description']; ?>
                                    </p>
                                    <?php if($meal_opt['price']): ?>
                                        <h7 class="font-weight-bold">
                                            FROM <?php echo $meal_opt['price']; ?>
                                        </h7>
                                    <?php endif; ?>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
         <?php  if ($i++ == 3) break;
             }
         }
         ?>
        </div>
        <?php if(get_field('top_mealplan_button_text', 'option')): ?>
            <div class="row justify-content-md-center mt-1">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-primary box-shadow font-weight-bold text-uppercase" href="<?php echo get_bloginfo('url') . get_field('top_mealplan_button_link', 'option'); ?>" role="button"><?php echo get_field('top_mealplan_button_text', 'option'); ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>