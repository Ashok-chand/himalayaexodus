<?php
$destinationid = isset($_GET['by_destination']) ? $_GET['by_destination'] : '';
$activityid = isset($_GET['by_activity']) ? $_GET['by_activity'] : '';
$durationid = isset($_GET['by_duration']) ? $_GET['by_duration'] : '';
?>
<div class="search_form">
    <h1>Search Destination !</h1>
    <form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url(home_url('/')); ?>">

        <input type="hidden" name="search" value="advanced">

        <select id="by_destination" name="by_destination"  class="selectpicker" data-live-search="true" title="By destination">
           <option  value=""><?php _e('None', 'textdomain'); ?></option>
             <?php
            $categories = get_terms(
                    'category', array('parent' => 32, 'orderby' => 'name', 'order' => 'DESC')
            );
            ?>
            <?php foreach ($categories as $cat) { ?> 
                <option <?php if ($destinationid == $cat->term_id) { ?>selected="selected"<?php } ?> value="<?php echo $cat->term_id; ?>"><?php _e($cat->name, 'textdomain'); ?></option>
            <?php } ?>

        </select>

        <select id="by_activity" name="by_activity" class="selectpicker" data-live-search="true" title="By activities">
            <option  value=""><?php _e('None', 'textdomain'); ?></option>
            <?php
            $categories = get_terms(
                    'category', array('parent' => 32)
            );

            foreach ($categories as $cat) {

                $subcategory1 = get_terms(
                        'category', array('parent' => $cat->term_id)
                );
                foreach ($subcategory1 as $subcat1) {
                    $subcategory2 = get_terms(
                            'category', array('parent' => $subcat1->term_id)
                    );
                    
                    foreach ($subcategory2 as $subcat2) {
                        ?>
                        <option <?php if ($activityid == $subcat2->term_id) { ?>selected="selected"<?php } ?> value="<?php echo $subcat2->term_id; ?>"><?php _e($subcat2->name, 'textdomain'); ?></option>
                        <?php
                    }
                }
            }
            ?>

        </select>
        <select id="by_duration" name="by_duration" class="selectpicker" data-live-search="true" title="By duration">
            <option  value=""><?php _e('None', 'textdomain'); ?></option>
            <option  <?php if ($durationid == '1-5') { ?>selected="selected"<?php } ?> value="1-5"><?php _e('1 - 5 Days', 'textdomain'); ?></option>
            <option  <?php if ($durationid == '5-10') { ?>selected="selected"<?php } ?> value="5-10"><?php _e('5 - 10 Days', 'textdomain'); ?></option>
            <option  <?php if ($durationid == '10-15') { ?>selected="selected"<?php } ?> value="10-15"><?php _e('10 - 15 Days', 'textdomain'); ?></option>
            <option  <?php if ($durationid == '15-30') { ?>selected="selected"<?php } ?>  value="15-30"><?php _e('15 - 30 Days', 'textdomain'); ?></option>
        </select>
        <input type="submit" id="searchsubmit" class="submit_search" value="Find your trip" />
    </form>
</div>