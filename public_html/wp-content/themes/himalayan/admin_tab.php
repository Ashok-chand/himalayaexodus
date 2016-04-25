<?php

function mytheme_enqueue_options_style() {
    wp_enqueue_style('mytheme-options-style', get_template_directory_uri() . '/tab/css/jquery-ui.css', false, '1.0.0');
    wp_enqueue_script('mytheme-options-style1', get_template_directory_uri() . '/tab/js/jquery-1.10.2.js', false, '1.0.0');
    wp_enqueue_script('mytheme-options-style2', get_template_directory_uri() . '/tab/js/jquery-ui.js', false, '1.0.0');
    wp_enqueue_script('mytheme-options-style3', get_template_directory_uri() . '/tab/ckeditor/ckeditor.js', false, '1.0.0');
    //for image upload
    wp_enqueue_script('mytheme-options-style12', get_template_directory_uri() . '/include/custom-js.js', false, '1.0.0');
}

add_action('admin_enqueue_scripts', 'mytheme_enqueue_options_style');

// Add the Meta Box  for Other info  ////////////////////////////////////////////// 
function add_admin_tab() {
    $types = array('ourtours', 'ouractivities', 'ourtrekking', 'ourclimbing');

    add_meta_box(
            'custom_tab_meta_box', // $id  
            'Other Info', // $title   
            'show_tab_box', // $callback  
            $types, // Custom Post Type
            'normal', // $context  
            'high'); // $priority  
}

add_action('add_meta_boxes', 'add_admin_tab');

// First
$prefix = 'team_info_';
$custom_meta_fields = array(
    array(
        'label' => 'Left Content',
        //'desc' => 'Left',
        'id' => $prefix . 'glance_left',
        'type' => 'textarea'
    ),
    array(
        'label' => 'Right Content',
        //'desc' => 'Left',
        'id' => $prefix . 'glance_right',
        'type' => 'textarea'
    ),
);
// Second

$prefix2 = 'team_info_two_';
$custom_meta_fields_two = array(
    array(
        'name' => 'Image',
        //'desc'  => 'A description for the field.',
        'id' => $prefix2 . 'image',
        'type' => 'image'
    ),
    array(
        //'label' => 'Phone Number',
        //'desc'  => 'Telephone no.',  
        'id' => $prefix2 . 'accomodation',
        'type' => 'textarea'
    )
);


// Third
$prefix3 = 'team_info_three_';
$custom_meta_fields_three = array(
    array(
        'label' => 'Left Content',
        //'desc'  => 'Email ID',  
        'id' => $prefix3 . 'trip_facts_left',
        'type' => 'textarea'
    ),
    array(
        'label' => 'Right Content',
        //'desc'  => 'Email ID',  
        'id' => $prefix3 . 'trip_facts_right',
        'type' => 'textarea'
    ),
);


// Fifth
$prefix4 = 'team_info_four_';
$custom_meta_fields_four = array(
    array(
        // 'label' => 'Email',
        //'desc'  => 'Email ID',  
        'id' => $prefix4 . 'useful_info',
        'type' => 'textarea'
    ),
);
// Fifth
$prefix5 = 'team_info_five_';
$custom_meta_fields_five = array(
    array(
        // 'label' => 'Email',
        //'desc'  => 'Email ID',  
        'id' => $prefix5 . 'equipments',
        'type' => 'textarea'
    ),
);

// The Callback  
function show_tab_box() {
    global $custom_meta_fields, $post;
    global $custom_meta_fields_two;
    global $custom_meta_fields_three;
    global $custom_meta_fields_four;
    global $custom_meta_fields_five;
// Use nonce for verification
    ?>
    <script>
        $(function () {
            $("#tabs").tabs();
            CKEDITOR.replace('team_info_glance_left');
            CKEDITOR.replace('team_info_glance_right');
            CKEDITOR.replace('team_info_two_accomodation');
            CKEDITOR.replace('team_info_three_trip_facts_left');
            CKEDITOR.replace('team_info_three_trip_facts_right');
            CKEDITOR.replace('team_info_four_useful_info');
            CKEDITOR.replace('team_info_five_equipments');
        });
    </script>
    <?php

    echo '<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Glance</a></li>
    <li><a href="#tabs-2">Accomodation</a></li>
    <li><a href="#tabs-3">Trip Facts</a></li>
	<li><a href="#tabs-4">Useful Info</a></li>
	<li><a href="#tabs-5">Equipments</a></li>
  </ul>';
    echo '<div id="tabs-1">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                </tr><tr><td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
  <div id="tabs-2">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_two as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
            case 'image':
                $image = get_template_directory_uri() . '/images/image.png';
                echo '<span class="custom_default_image" style="display:none">' . $image . '</span>';
                if ($meta) {
                    $image = wp_get_attachment_image_src($meta, 'medium');
                    $image = $image[0];
                }
                echo '<input name="' . $field['id'] . '" type="hidden" class="custom_upload_image" value="' . $meta . '" />
                <img src="' . $image . '" class="custom_preview_image" alt="" /><br />
                    <input class="custom_upload_image_button button" type="button" value="Choose Image" />
                    <small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>
                    <br clear="all" /><span class="description">' . $field['desc'] . '</span>';
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
  <div id="tabs-3">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_three as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
                </tr><tr><td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';


    echo '</div>
 
	  <div id="tabs-4">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_four as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
               
                <td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;

                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	  <div id="tabs-5">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_five as $field) {
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;

                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	
	
	
	
</div>';
}

// Save the Data  
function save_date_meta($post_id) {
    global $custom_meta_fields, $custom_meta_fields_two, $custom_meta_fields_three, $custom_meta_fields_four, $custom_meta_fields_five, $custom_meta_fields_six;

    // verify nonce  
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
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
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //Second tab
    // loop through fields and save the data  
    foreach ($custom_meta_fields_two as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //Third tab
    // loop through fields and save the data  
    foreach ($custom_meta_fields_three as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //fourth tab
    // loop through fields and save the data  
    foreach ($custom_meta_fields_four as $field) {
        // print_r($_POST);die();
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //fifth tab
    // loop through fields and save the data  
    foreach ($custom_meta_fields_five as $field) {
        // print_r($_POST);die();
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
    //sixth tab
    // loop through fields and save the data  
    foreach ($custom_meta_fields_six as $field) {
        // print_r($_POST);die();
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}

add_action('save_post', 'save_date_meta');

// End  the Meta Box  for Other info  ////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
// Start the Meta Box  for Repeatable tabs   ////////////////////////////////////////////// 
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

function add_repeatable_tab() {
    $types = array('ourtours', 'ouractivities', 'ourtrekking', 'ourclimbing');

    add_meta_box(
            'repeatble_tab_meta_box', // $id  
            'Repeatable Tab', // $title   
            'show_repeatable_tab_box', // $callback  
            $types, // Custom Post Type
            'normal', // $context  
            'high'); // $priority  
}

add_action('add_meta_boxes', 'add_repeatable_tab');

// First
$repeat_prefix = 'repeatable_info_';
$repeatable_meta_fields = array(
    array(
        'label' => 'Note',
        //'desc' => 'Left',
        'id' => $repeat_prefix . 'note',
        'type' => 'textarea'
    ),
    array(
        //'label' => 'Repeatable',
        // 'desc'  => 'A description for the field.',
        'id' => $repeat_prefix . 'itinerary',
        'type' => 'double_repeatable',
        'options' => array('Title', 'Description')
    )
);
// Second

$repeat_prefix2 = 'repeatable_info_two_';
$repeatable_meta_fields_two = array(
    array(
        // 'name'  => 'Image',
        //'desc'  => 'A description for the field.',
        'id' => $repeat_prefix2 . 'faqs',
        'type' => 'double_repeatable',
        'options' => array('Question', 'Answer')
    ),
);


// Third
$repeat_prefix3 = 'repeatable_info_three_';
$repeatable_meta_fields_three = array(
    array(
        // 'label' => 'Repeatable',
        //'desc'  => 'A description for the field.',
        'id' => $repeat_prefix3 . 'imgrepeatablee',
        'type' => 'image_repeatable',
    ),
);
//fourth tab
$repeat_prefix4 = 'repeatable_info_four_';
$repeatable_meta_fields_four = array(
    array(
        //'label' => 'Repeatable',
        // 'desc'  => 'A description for the field.',
        'id' => $repeat_prefix4 . 'video',
        'type' => 'repeatable',
    ),
);
// Fifth tab
$repeat_prefix5 = 'repeatable_info_five_';
$repeatable_meta_fields_five = array(
    array(
        //'label' => 'Repeatable',
        // 'desc'  => 'A description for the field.',
        'id' => $repeat_prefix5 . 'slider',
        'type' => 'slider_repeatable',
    ),
);
// Fifth tab
$repeat_prefix6 = 'repeatable_info_six_';
$repeatable_meta_fields_six = array(
    array(
        'name' => 'Map Location',
        //'desc'  => 'A description for the field.',
        'id' => $repeat_prefix6 . 'image',
        'type' => 'image'
    ),
);

// The Callback  
function show_repeatable_tab_box() {
    global $repeatable_meta_fields, $post;
    global $repeatable_meta_fields_two;
    global $repeatable_meta_fields_three;
    global $repeatable_meta_fields_four;
    global $repeatable_meta_fields_five;
    global $repeatable_meta_fields_six;

// Use nonce for verification
    ?>
    <script>
        $(function () {
            $("#tabs1").tabs();
        });
        $(document).ready(function () {
            CKEDITOR.replace('repeatable_info_note');
            CKEDITOR.replaceClass = 'itinerary';
            CKEDITOR.replaceClass = 'ckeditor';
        });

    </script>

    <?php

    echo '<div id="tabs1">
  <ul>
    <li><a href="#tabs1-1">Itinerary</a></li>
    <li><a href="#tabs1-2">FaQs</a></li>
    <li><a href="#tabs1-3">Gallery</a></li>
	<li><a href="#tabs1-4">Videos</a></li>
	<li><a href="#tabs1-5">Slider Images</a></li>
	<li><a href="#tabs1-6">Map Location</a></li>
  </ul>';



    echo '<div id="tabs1-1">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        echo '<tr> 
                <td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<label for="' . $field['id'] . '">' . $field['label'] . '</label><br />';
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;

            case 'double_repeatable':
                echo '<a class="repeatable-add button" id="itinerary" href="#">+</a>';
                echo '<ul id="' . $field['id'] . '-double_repeatable" class="custom_repeatable double_repeatable">';

                $i = 0;
                if ($meta) {
                    foreach ($meta as $row) {

                        echo '<li>';
                        echo '<span><label>Title</label></span><br /> <input class="full_length" id="' . $field['id'][$i] . '" name="' . $field['id'] . '[' . $i . '][0]" size="30" type="text" value="' . $row[0] . '"><br />';

                        echo '<span><label>Description</label></span><br />
<textarea class="itinerary ckeditor" name=" ' . $field['id'] . '[' . $i . '][1]" id="' . $field['id'] . '_' . $i . '" cols="90" rows="4">' . $row[1] . '</textarea>';

                        echo '<a class="repeatable-remove button" href="#">-</a></li>';
                        $i++;
                    }
                } else {

                    echo '<li>';
                    echo '<span><label>Title</label></span><br/> <input class="full_length"  id="' . $field['id'][$i] . '" name="' . $field['id'] . '[' . $i . '][0]" size="30" type="text" value="' . $row[0] . '"><br />';

                    echo '<span><label>Description</label></span><br/>
<textarea class="itinerary ckeditor" name=" ' . $field['id'] . '[' . $i . '][1]" id="' . $field['id'] . '_' . $i . '" cols="90" rows="4">' . $row[1] . '</textarea>';
                    echo '</li>';

                    $i++;
                }
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
  
  
  
  
  
  <div id="tabs1-2">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields_two as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'double_repeatable':
                echo '<a class="repeatable-add button" id="faqs" href="#">+</a>';
                echo '<ul id="' . $field['id'] . '-double_repeatable" class="custom_repeatable double_repeatable">';

                $i = 0;
                if ($meta) {

                    foreach ($meta as $row) {
                        echo '<li>';
                        echo '<span><label>Question</label></span><br /> <input class="full_length" id="' . $field['id'] . $i . '" name="' . $field['id'] . '[' . $i . '][0]" size="30" type="text" value="' . $row[0] . '"><br />';

                        echo '<span><label>Answer</label></span><br />
                            <textarea class="faqs ckeditor"  name=" ' . $field['id'] . '[' . $i . '][1]" id="' . $field['id'] . '_' . $i . '" cols="90" rows="4">' . $row[1] . '</textarea>';

                        echo '<a class="repeatable-remove button" href="#">-</a></li>';
                        $i++;
                    }
                } else {
                    echo '<li>';
                    echo '<span><label>Question</label></span><br/> <input class="full_length" id="' . $field['id'] . $i . '" name="' . $field['id'] . '[' . $i . '][0]" size="30" type="text" value="' . $row[0] . '"><br />';

                    echo '<span><label>Answer</label></span><br/>
                        <textarea class="faqs ckeditor" name=" ' . $field['id'] . '[' . $i . '][1]" id="' . $field['id'] . '_' . $i . '" cols="90" rows="4">' . $row[1] . '</textarea>';
                    echo '<a class="repeatable-remove button" href="#">-</a></li>';

                    $i++;
                }
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	
	
	
	
	
<div id="tabs1-3">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields_three as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);

        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'image_repeatable':


                echo '<a class="repeatable-add button" id="galleries" href="#">+</a><ul id="' . $field['id'] . '-repeatable" class="custom_repeatable">';
                $i = 0;
                if ($meta) {

                    foreach ($meta as $row) {
                        $image = wp_get_attachment_image_src($row, 'medium');

                        echo '<li><span class="custom_default_image" style="display:none">' . $image . '</span>';

                        echo '<input name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . '[' . $i . ']" type="hidden" class="custom_upload_image" value="' . $row . '" />';
                        echo '<img width="100" height="100" src="' . $image[0] . '" class="custom_preview_image" alt="" /><br />';

                        echo '<button class="custom_upload_image_button button" />Choose Image</button>';

                        echo '<small> <a href="#" class="custom_clear_image_button">Remove Image</a></small><a class="repeatable-remove button" href="#">-</a></li>';

                        $i++;
                    }
                } else {
                    $image = get_template_directory_uri() . '/images/image.png';

                    echo '<li><span class="custom_default_image" style="display:none">' . $image . '</span>';

                    echo '<input width="100" height="100" name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . '[' . $i . ']" type="hidden" class="custom_upload_image" value="" />';
                    echo '<img src="' . $image . '" class="custom_preview_image" alt="" /><br />';

                    echo '<button  class="custom_upload_image_button button" type="button" />Choose Image</button>';
                    echo '<small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>  <br clear="all" /><span class="description">' . $field['desc'] . '</span>';
                    echo '<a class="repeatable-remove button" href="#">-</a></li>';
                }
                echo '</ul>';

                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	
	
	
	
	
    <div id="tabs1-4">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields_four as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);

        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'repeatable':

                echo '<a class="repeatable-add button" id="videos" href="#">+</a> <ul id="' . $field['id'] . '-repeatable" class="custom_repeatable">';
                $i = 0;
                if ($meta) {
                    foreach ($meta as $row) {
                        echo '<li><input type="text" name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . $i . '" value="' . $row . '" size="30" /><a class="repeatable-remove button" href="#">-</a></li>';
                        $i++;
                    }
                } else {
                    echo '<li><input type="text" name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . $i . '" value="" size="30" /></li>';
                }
                echo '</ul> <span class="description">' . $field['desc'] . '</span>';
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	
	
	<div id="tabs1-5">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields_five as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);

        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'slider_repeatable':


                echo '<a class="repeatable-add button" id="slider_images" href="#">+</a> Image size(750x450)<ul id="' . $field['id'] . '-repeatable" class="custom_repeatable">';
                $i = 0;
                if ($meta) {

                    foreach ($meta as $row) {

                        $image = wp_get_attachment_image_src($row, 'medium');

                        echo '<li><span class="custom_default_image" style="display:none">' . $image . '</span>';

                        echo '<input name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . '[' . $i . ']" type="hidden" class="custom_upload_image" value="' . $row . '" />';
                        echo '<img width="100" height="100" src="' . $image[0] . '" class="custom_preview_image" alt="" /><br />';

                        echo '<button class="custom_upload_image_button button" />Choose Image</button>';

                        echo '<small> <a href="#" class="custom_clear_image_button">Remove Image</a></small><a class="repeatable-remove button" href="#">-</a></li>';

                        $i++;
                    }
                } else {
                    $image = get_template_directory_uri() . '/images/image.png';

                    echo '<li><span class="custom_default_image" style="display:none">' . $image . '</span>';

                    echo '<input width="100" height="100" name="' . $field['id'] . '[' . $i . ']" id="' . $field['id'] . '[' . $i . ']" type="hidden" class="custom_upload_image" value="" />';
                    echo '<img src="' . $image . '" class="custom_preview_image" alt="" /><br />';

                    echo '<button  class="custom_upload_image_button button" type="button" />Choose Image</button>';
                    echo '<small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>  <br clear="all" /><span class="description">' . $field['desc'] . '</span>';
                    echo '<a class="repeatable-remove button" href="#">-</a></li>';
                }
                echo '</ul>';

                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
		
	<div id="tabs1-6">';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    echo '<table class="form-table">';
    foreach ($repeatable_meta_fields_six as $field) {

        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);

        // begin a table row with  
        // <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
        echo '<tr> 
                
                <td>';
        switch ($field['type']) {
            case 'image':
                $image = get_template_directory_uri() . '/images/image.png';
                echo '<span class="custom_default_image" style="display:none">' . $image . '</span>';
                if ($meta) {
                    $image = wp_get_attachment_image_src($meta, 'medium');
                    $image = $image[0];
                }
                echo '<input name="' . $field['id'] . '" type="hidden" class="custom_upload_image" value="' . $meta . '" />
                <img src="' . $image . '" class="custom_preview_image" alt="" /><br />
                    <input class="custom_upload_image_button button" type="button" value="Choose Image" />
                    <small> <a href="#" class="custom_clear_image_button">Remove Image</a></small>
                    <br clear="all" /><span class="description">' . $field['desc'] . '</span>';
                break;
        } //end switch  
        echo '</td></tr>';
    } // end foreach  
    echo '</table>';
    echo '</div>
	

</div>';
}

// Save the Data  
function save_repeated_meta($post_id) {
    global $repeatable_meta_fields, $repeatable_meta_fields_two, $repeatable_meta_fields_three, $repeatable_meta_fields_four, $repeatable_meta_fields_five, $repeatable_meta_fields_six;

    // verify nonce  
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
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
    foreach ($repeatable_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //Second tab
    // loop through fields and save the data  
    foreach ($repeatable_meta_fields_two as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //Third tab
    // loop through fields and save the data  
    foreach ($repeatable_meta_fields_three as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    //Third tab
    // loop through fields and save the data  
    foreach ($repeatable_meta_fields_four as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach 
    //fifth  tab
    // loop through fields and save the data  
    foreach ($repeatable_meta_fields_five as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
    // loop through fields and save the data  
    foreach ($repeatable_meta_fields_six as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach  
}

add_action('save_post', 'save_repeated_meta');
?>