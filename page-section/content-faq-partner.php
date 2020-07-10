<?php
// check for rows (parent repeater)
if( have_rows('faqs') ): ?>
    <?php
    // loop through rows (parent repeater)
    $row = 1;
    while( have_rows('faqs') ): the_row();
        $qa_list_heading = str_replace(" ", "_",strtolower(get_sub_field('group_title')));
        ?>
        <div class="accordion" id="accordion_<?php echo $row; ?>" role="tablist" aria-multiselectable="false">
            <h4><?php the_sub_field('group_title'); ?></h4>
            <?php
            // check for rows (sub repeater)
            if( have_rows('faq') ): ?>
                <ul class="faqsul">
                    <?php
                    $j = 0;
                    while( have_rows('faq') ): the_row(); $j++;
                        ?>
                        <div class="card-header" role="tab" id="heading_<?php echo $qa_list_heading;?>_<?php echo $j; ?>">
                            <a data-toggle="collapse" href="#collapse_<?php echo $qa_list_heading;?>_<?php echo $j; ?>" aria-expanded="true" aria-controls="collapsepro<?php echo $j; ?>"><h5 class="mb-0">
                                    <?php the_sub_field('faq_title'); ?>
                                </h5></a>
                        </div>
                        <div id="collapse_<?php echo $qa_list_heading;?>_<?php echo $j; ?>" class="collapse" role="tabpanel" aria-labelledby="headingpro<?php echo $j; ?>"  data-parent="#accordion_<?php echo $row;?>">
                            <div class="card-block">
                                <?php the_sub_field('faq_content'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php $row++; endwhile; ?>
<?php endif;  ?>