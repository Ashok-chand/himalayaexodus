<div class="search_form">
    <h1>Search Destination !</h1>
    <form role="searchDestination" action="" method="post" id='searchDestination'>
        <select id="by_destination" class="selectpicker" data-live-search="true" title="By destination">
            <?php
            $categories = get_terms(
                    'category', array('parent' => 32, 'orderby' => 'name', 'order' => 'DESC')
            );
            ?>
            <?php foreach ($categories as $cat) { ?> 
                <option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
            <?php } ?>
        </select>
        <select id="by_activity" class="selectpicker" data-live-search="true" title="By activities">
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
                        <option value="<?php echo $subcat2->term_id; ?>"><?php echo $subcat2->name; ?></option>


                        <?php
                    }
                }
            }
            ?>

        </select>
        <select id="by_duration" class="selectpicker" data-live-search="true" title="By duration">
            <option value="5">1 - 5 Days</option>
            <option value="10">5 - 10 Days</option>
            <option value="15">10 - 15 Days</option>
            <option value="30">15 - 30 Days</option>
        </select>
        <input type="submit" name="submit" id="find_search_destinations" class="submit_search" value="Find your trip" />
    </form>
</div>