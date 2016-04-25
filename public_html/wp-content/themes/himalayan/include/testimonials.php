<?php

/* -----------Testimonials----------- */
/* ======================================== */
add_action('init', 'my_custom_post_Testimonials');

function my_custom_post_Testimonials() {

    /* for services */

    register_post_type('ourtestimonials', array(
        'labels' => array(
            'name' => __('Testimonials'),
            'singular_name' => __('ourtestimonials')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'ourtestimonials'),
        'supports' => array('title', 'editor', 'thumbnail'),
            )
    );
}

/** custom category type */
add_action('init', 'creat_taxonomy_testimonials');

function creat_taxonomy_testimonials() {
    register_taxonomy(
            'taxonomy_testimonials', 'ourtestimonials', array(
        'label' => __('Testimonials Type'),
        'rewrite' => array('slug' => 'testimonials_taxonomy'),
        'hierarchical' => true,
        'show_admin_column' => true,
            )
    );
}

/** for custome fields testimonials */
function add_testimonials_meta_box() {
    add_meta_box(
            'testimonials_meta_box', // $id  
            'Extra Field', // $title   
            'show_testimonials_meta_box', // $callback  
            'ourtestimonials', // $page  
            'normal', // $context  
            'high'); // $priority  
}

add_action('add_meta_boxes', 'add_testimonials_meta_box');


/** Create the Field Array */
$prefix = 'testimonial_';
$testimonials_meta_fields = array(
    array(
        'label' => 'Full Name',
        'desc' => 'Full Name.',
        'id' => $prefix . 'name',
        'type' => 'text'
    ),
    array(
        'label' => 'Address',
        'desc' => 'Address.',
        'id' => $prefix . 'addre',
        'type' => 'text'
    ),
    array(
        'label' => 'Review',
        'desc' => 'Customer Review.',
        'id' => $prefix . 'review',
        'type' => 'radio',
        'options' => array(
            'one' => array(
                'label' => 'One',
                'value' => '1'
            ),
            'two' => array(
                'label' => 'Two',
                'value' => '2'
            ),
            'three' => array(
                'label' => 'Three',
                'value' => '3'
            ),
            'four' => array(
                'label' => 'Four',
                'value' => '4'
            ),
            'five' => array(
                'label' => 'Five',
                'value' => '5'
            )
        )
    ),
    array(
        'label' => 'Post Title',
        //'desc'  => 'A description for the field.',
        'id' => $prefix . 'posttitle',
        'type' => 'select',
        'options' => array(
            'one' => array(
                'label' => 'Option One',
                'value' => 'one'
            ),
        )
    )
);

// The Callback  
function show_testimonials_meta_box() {

    global $testimonials_meta_fields, $post;
// Use nonce for verification  
    echo '<input type="hidden" name="testimonials_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Begin the field table and loop  
    echo '<table class="form-table">';
    foreach ($testimonials_meta_fields as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        
        // begin a table row with  
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                <td>';
        switch ($field['type']) {
            case 'radio':
                
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="' . $field['id'] . '" id="' . $option['value'] . '" value="' . $option['value'] . '" ', $meta == $option['value'] ? ' checked="checked"' : '', ' />
                <label for="' . $option['value'] . '">' . $option['value'] . '</label><br />';
                }
                break;

            case 'select':
                echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
                 echo '<option',' selected="selected"', ' value="">Select post title</option>';
                foreach ($field['options'] as $option) {
                    //echo '<option', $meta == $title ? ' selected="selected"' : '', ' value="'.$title.'">'.$title.'</option>';


                    $categories = get_terms(
                            'category', array('parent' => 32)
                    );

                    foreach ($categories as $cat) {

                        $pid = $cat->term_id;
                        $subcategories = get_terms(
                                'category', array('parent' => $pid)
                        );
                        foreach ($subcategories as $subcat) {

                            $spid = $subcat->term_id;
                            $ssubcategories = get_terms(
                                    'category', array('parent' => $spid)
                            );
                            foreach ($ssubcategories as $ssubcat) {
                                $args = array('post_type' => 'any', 'cat' => $ssubcat->term_id);
                                $loop = new WP_Query($args);

                                while ($loop->have_posts()) : $loop->the_post();
                                $post_slug = $post->post_name;
                                   $title = get_the_title();
                                    if($post_slug) 
                                    echo '<option', $meta == $post_slug ? ' selected="selected"' : '', ' value="' . $post_slug . '">' . $title . '</option>';
                                endwhile;

                                wp_reset_query();
                            }
                        }
                    }
                }


                echo '</select>';
                break;
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" /> 
        <br /><span class="description">' . $field['desc'] . '</span>';
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>'; // end table  
}

// Save the Data  
function save_testimonials_meta($post_id) {
    global $testimonials_meta_fields;

    // verify nonce  
    if (!wp_verify_nonce($_POST['testimonials_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions  
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // loop through fields and save the data  
    foreach ($testimonials_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
}

add_action('save_post', 'save_testimonials_meta');
