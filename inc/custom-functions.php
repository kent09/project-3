<?php
//add custom functions here
function create_meal_groupings($page_id){
    $meal_plans = array();
    $meals = get_field('meal_plans', $page_id);
    if($meals) {
        foreach($meals as $meal){
            $calories = $meal['calories'];
            $data = array(
                'calories'=>$calories,
                'image'=>$meal['plan_image'],
                'price'=> $meal['per_meal_price'],
                'vegnon-veg'=>$meal['vegnon-veg'],
                'meals'=>$meal['meals'],
                'days'=>$meal['days'],
                'product_id_from_infs'=>$meal['product_id_from_infs'],
                'gender'=>$meal['genderprep'],
                'total_meals'=>$meal['total_meals'],
                'meals_summary'=>$meal['meals_summary'],
                'plan_title'=>$meal['plan_title'],
                'per_meal_price'=>$meal['per_meal_price'],
                'plan_price'=>$meal['plan_price'],
                'no_snacks'=>$meal['no_snacks'],
                'per_snack_price'=>$meal['per_snack_price'],
                'meal_group'=>$meal['meal_group']
            );
            $meal_plans[$calories][] = $data;
        }
    }

    return $meal_plans;
}

add_shortcode( 'footer_socmed_icons', 'create_socmed_list' );
function create_socmed_list(){
    $output = '';
    if(have_rows('social_fields', 'option')){
        ob_start();
    ?>
        <span class="socialicons">
    <?php
        while ( have_rows('social_fields', 'option') ) : the_row();
    ?>
             <a href="<?php the_sub_field('social_link'); ?>" target="_blank"><i class="<?php the_sub_field('font_awesome_icon_class'); ?>"></i></a>
        <?php endwhile; ?>
        </span>
    <?php
    }
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
