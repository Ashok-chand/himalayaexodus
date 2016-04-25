<?php

/** for Staff */
function add_staff_meta_box() {
    add_meta_box(
            'staff_meta_box', // $id  
            'Extra Field', // $title   
            'show_staff_meta_box', // $callback  
            'ourstaff', // $page  
            'normal', // $context  
            'high'); // $priority  
}

add_action('add_meta_boxes', 'add_staff_meta_box');


/** Create the Field Array */
$prefix = 'custom_';
$staff_meta_fields = array(
    array(
        'label' => 'Designation',
        'desc' => 'Designation.',
        'id' => $prefix . 'designation',
        'type' => 'text'
    ),
);

// The Callback  
function show_staff_meta_box() {
    global $staff_meta_fields, $post;
// Use nonce for verification  
    echo '<input type="hidden" name="staff_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Begin the field table and loop  
    echo '<table class="form-table">';
    foreach ($staff_meta_fields as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                <td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" /> 
        <br /><span class="description">' . $field['desc'] . '</span>';
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>'; // end table  
}

// Save the Data  
function save_staff_meta($post_id) {
    global $staff_meta_fields;

    // verify nonce  
    if (!wp_verify_nonce($_POST['staff_meta_box_nonce'], basename(__FILE__)))
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
    foreach ($staff_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
}

add_action('save_post', 'save_staff_meta');
