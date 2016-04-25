<?php

//Search for the Activities
add_action('wp_ajax_nopriv_search_activity', 'search_activity'); // for not logged in users
add_action('wp_ajax_search_activity', 'search_activity');

function search_activity() {
    global $wpdb;
    $html = '';

    $search_term_id = !empty($_POST['term_id']) ? $_POST['term_id'] : '';

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $subcategory1 = get_terms(
            'category', array('parent' => $search_term_id)
    );

    foreach ($subcategory1 as $subcat1) {
        $subcategory2 = get_terms(
                'category', array('parent' => $subcat1->term_id)
        );

        foreach ($subcategory2 as $subcat2) {

            $html .= '<option value="' . $subcat2->term_id . '">' . $subcat2->name . '</option>';
        }
    }
    echo $html;
    wp_reset_query();
    die;
}
