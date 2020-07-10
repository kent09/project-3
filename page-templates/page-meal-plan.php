<?php
/**
 * Template Name: Page - Meal Plan
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
global $post;
$container = get_theme_mod( 'understrap_container_type' );
$singleMenuUrl = 'https://menu.chefgood.com.au/';
$image_class = array("class"=>'mx-auto d-block img-fluid');
$filter = isset($_GET['filter']) ? $_GET['filter']: "";
//create meal plans array
$meal_plans = create_meal_groupings($post->ID); //ref: inc/custom-functions.php
$heading = [ 'slimtrim' => 'Slim & Trim', 'traintone' => 'Train & Tone',  'vegetarian' => 'Vegetarian Slim & Trim', 'mix_match' => 'Mix & Match'];
?>
<div class="wrapper mealplan_page_wrap pt-0 pt-md-4 with_back_top" id="page-wrapper">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
                    <div class="row justify-content-md-center mt-1 d-none d-md-flex">
                        <div class="col-sm-12 text-center">
                            <a class="btn btn-primary font-weight-semi-bold box-shadow view_all_meals" href="#" role="button">VIEW ALL</a>
                            <h6 class="text-center pt-4 font-weight-bold text-uppercase pb-4 h6_v2">Or select your preferred meal plan to view options below:</h6>
                        </div>
                    </div>

                    <div class="row justify-content-md-center mt-1 mealplan_selector d-none d-md-flex">
                    <?php
                        if( get_field('meal_plan_options') ) {
                         $i = 0;
                            foreach(get_field('meal_plan_options') as $option) {
                                $alignment = $i % 2 == 0 ? 'text-right': 'text-left';
                                $img_id = $option['image'];
                                $size = 'full';
                                $selected = !empty($filter) && $filter == $option['id'] ? "selected": "";
                    ?>

                        <div class="col-lg-3 col-md-3 meal_option_selector">
                            <a href="#" class="select_meal_opt">
                            <figure class="figure mb-4 <?php echo $selected;?>">
                                <input type="checkbox" data-id="<?php echo $option['id']; ?>" class="meal_select" <?php if(!empty($filter) && $filter == $option['id']){ echo "checked"; } ?>/>
                                <span class="checkmark"></span>
                                <div class="img_heading_wrap">
                                <?php
                                if( $img_id) {
                                    echo wp_get_attachment_image( $img_id, 'full',"",$image_class);
                                }
                                ?>
                                <h6 class="font-weight-bold pt-3 pb-3 mb-0 text-center"><?php echo $option['title']; ?></h6>
                                </div>
                                <figcaption class="figure-caption text-center">
                                    <p class="mb-0 pb-1"><?php echo $option['description']; ?></p>
                                    <?php if(!empty($option['price'])){ ?><h7 class="font-weight-bold">FROM <?php echo $option['price']; ?></h7><?php } ?>
                                </figcaption>
                            </figure>
                            </a>
                        </div>

                    <?php $i++;}  }?>
                   </div>
                    <div class="row justify-content-md-center mt-1 mb-4 d-none d-md-block">
                        <div class="col-sm-12 text-center">
                            <a href="<?php bloginfo('url') . the_field('gift_voucher_link'); ?>" class="links black text-underline mr-2"><?php the_field('gift_voucher_text'); ?></a>
                            <a href="<?php bloginfo('url') . the_field('challenge_plan_link'); ?>" class="links black text-underline ml-2"><?php the_field('challenge_plan_text'); ?></a>
                        </div>
                    </div>
        </div><!-- Container end -->
        <?php
            $option =  get_field('meal_plan_options');
            $a = 0;
            if(!empty($meal_plans)){
                foreach($meal_plans as $key=>$meals){
                    $bg = $key == 'mix_match'? '#e5f7f7': "#ffffff";
                    $selected = "block";

                    if(isset($_GET['filter']) && !empty($filter)){
                        $selected = $filter == $key ? "block": "none";

                    }
        ?>
        <div class="mealplan_contents pb-4" id="<?php echo $key; ?>" style="background-color: <?php echo $bg; ?>;display:<?php echo $selected;?>">
            <div class="<?php echo esc_attr( $container ); ?>" id="content">
                <div class="row justify-content-md-center">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="text-center font-weight-bold pt-4 pb-4 text-uppercase"><?php echo  $heading[$key]; ?></h3>
                    </div>
                </div>
                <div class="row justify-content-md-center desktop">
           <?php
               if(!empty($meals)){
                   //$class = count($meals) > 1 ? 'col-lg-3 col-md-4' : 'col-lg-3 col-md-6';
                   $class = 'col-lg-3 col-md-4';
                   foreach($meals as $meal){
                       $img_id = $meal['image'];
                       $size = 'medium';
                       $meal_group = $meal['calories'] == 'vegetarian'? $meal['meal_group'] : "";
           ?>
                       <div class="<?php echo $class; ?> text-center pb-4 <?php echo $meal['vegnon-veg']; ?> <?php echo $meal['calories']; ?> <?php echo $meal_group; ?> meals">
                           <a href="<?php echo $singleMenuUrl; ?>menu/<?php  echo $meal['product_id_from_infs']; ?>" class="meal_plan_link">
                              <?php figure_item($img_id, $meal, $image_class); ?>
                           </a>
                       </div>
           <?php
                   }
               }
           ?>
                </div>
                 <div class="mobile">
                    <div class="owl-carousel owl-theme">
                      <div class="item text-center first-slider">
                         <figure class="figure">
                             <div class="img_text_container">
                                 <div class="img_text">
                                 <?php if( $option[$a]['image']):
                                     echo wp_get_attachment_image( $option[$a]['image'], "full","",$image_class);
                                 endif; ?>
                             </div>
                             <figcaption class="figure-caption text-center">
                                 <p class="mb-0 pb-1"><?php echo $option[$a]['description']; ?></p>
                                 <h6 class="font-weight-bold">FROM <?php echo $option[$a]['price']; ?></h6>
                             </figcaption>
                         </figure>
                      </div>
                    <?php 
                      $a++;
                      foreach($meals as $meal){
                        $img_id = $meal['image'];
                        $size = 'medium';
                        $meal_group = $meal['calories'] == 'vegetarian' || $meal['calories'] == 'slimtrim'? $meal['meal_group'] : "";

                          if(isset($_GET['filter']) && !empty($filter)){
                              if($filter == 'vegetarian' || $filter == 'slimtrim'){
                                  if($filter == 'vegetarian' && $meal['vegnon-veg'] != 'vegetarian'){
                                      continue;
                                  } else if($filter == 'slimtrim' && $meal_group != 'slimtrim'){
                                      continue;
                                  }
                              } else if($filter != $meal['calories']){
                                  continue;
                              }
                          }

                    ?>
                      <div class="item text-center <?php echo $meal['vegnon-veg']; ?> <?php echo $meal['calories']; ?> <?php echo $meal_group; ?>">
                        <a href="<?php echo $singleMenuUrl; ?>menu/<?php  echo $meal['product_id_from_infs']; ?>" class="meal_plan_link">
                          <?php figure_item($img_id, $meal, $image_class); ?>
                        </a>
                      </div>
                  <?php } ?>
                    </div>
                  </div>
                  <?php
                    if(isset($_GET['filter']) && !empty($filter)){
                  ?>
                  <div class="row justify-content-md-center pt-4 d-md-none" style="background-color:#e5f7f7;">
                    <div class="col-sm-12 text-center">
                        <a class="btn btn-primary font-weight-semi-bold box-shadow" href="/meal-plans" role="button">VIEW ALL</a>
                    </div>
                  </div>
                  <?php } ?>
            </div>
         </div>
        <?php } } ?>
    <div class="meal_plans_links pb-4" style="background-color:#e5f7f7;">
        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
            <div class="row justify-content-md-center pt-1 d-md-none">
                <div class="col-sm-12 text-center">
                    <a href="<?php bloginfo('url') . the_field('gift_voucher_link'); ?>" class="links black text-underline mr-2"><?php the_field('gift_voucher_text'); ?></a>
                    <a href="<?php bloginfo('url') . the_field('challenge_plan_link'); ?>" class="links black text-underline ml-2"><?php the_field('challenge_plan_text'); ?></a>
                </div>
            </div>
        </div>
    </div>

<div class="back-top-btn">        
  <a id="mealplan_back_top" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/back_to_top.png"></a>
</div>
</div><!-- Wrapper end -->

<?php 
  function figure_item($img_id, $meal, $image_class) {
?>

    <figure class="figure">
      <div class="img_text_container">
        <div class="img_text">

          <?php if( $img_id):

            echo wp_get_attachment_image( $img_id, "full","",$image_class);
          endif; ?>

        <p class="meal_summary text-center barlow_bold"><?php echo $meal['total_meals'];  ?> Meals at $<?php echo $meal['per_meal_price'];?>/meal</p>
        </div>
      <h6 class="font-weight-bold pt-2 pb-2 mb-0 text-uppercase color-primary"><?php echo $meal['plan_title']; ?></h6>
      </div>
      <figcaption class="figure-caption text-center">
      <p class="mb-0 pb-1"><?php echo $meal['meals_summary']; ?></p>
      <h6 class="font-weight-bold">$<?php echo $meal['plan_price']; ?></h6>
      </figcaption>
    </figure>

<?php       
  }
?>
<script type="text/javascript">
    var filter = '<?php echo $filter;?>';
    jQuery(document).ready(function($){
         if(filter != ""){
             //filter script
             $('.meal_select[data-id="'+filter+'"]').trigger('click');
         }
    });
</script>
<?php get_footer(); ?>