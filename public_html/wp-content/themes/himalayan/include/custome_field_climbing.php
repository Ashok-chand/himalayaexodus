<?php
/** for Climbing */

function add_climbing_meta_box() {  
    add_meta_box(  
        'climbing_climbing_meta_box', // $id  
        'Trip Facts', // $title   
        'show_climbing_meta_box', // $callback  
        'ourclimbing', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_climbing_meta_box');  


/** Create the Field Array */
$prefix = 'tripfacts_';  
$climbing_meta_fields = array(  
	
	  array(  
        'label'=> 'Customer Review',  
        'desc'  => 'Customer Review',  
        'id'    => $prefix.'review',  
        'type'  => 'select',  
        'options' => array (  
			'zero' => array (  
                'label' => 'Select',  
                'value' => '0'  
            ),  
            'one' => array (  
                'label' => 'Level One',  
                'value' => '1'  
            ),  
            'two' => array (  
                'label' => 'Level Two',  
                'value' => '2'  
            ),  
            'three' => array (  
                'label' => 'Level Three',  
                'value' => '3'  
            ),
			 'four' => array (  
                'label' => 'Level Four',  
                'value' => '4'  
            ), 
			 'five' => array (  
                'label' => 'Level Five',  
                'value' => '5'  
            )     
        )  
    ) ,
	
		  array(  
        'label'=> 'Trip Grade',  
        'desc'  => 'Trip Grade',  
        'id'    => $prefix.'grade',  
        'type'  => 'select',  
        'options' => array ( 
			'zero' => array (  
                'label' => 'Select',  
                'value' => '0'  
            ),   
            'one' => array (  
                'label' => 'Level One',  
                'value' => '1'  
            ),  
            'two' => array (  
                'label' => 'Level Two',  
                'value' => '2'  
            ),  
            'three' => array (  
                'label' => 'Level Three',  
                'value' => '3'  
            ),
			 'four' => array (  
                'label' => 'Level Four',  
                'value' => '4'  
            ), 
			 'five' => array (  
                'label' => 'Level Five',  
                'value' => '5'  
            )     
        )  
    ) ,
	
	 array(  
        'label'=> 'Trip Grade Text',  
        'desc'  => 'Trip Grade Text',  
        'id'    => $prefix.'grade1',  
        'type'  => 'select',  
        'options' => array ( 
			'Zero' => array (  
                'label' => 'Select',  
                'value' => ''  
            ),   
            'one' => array (  
                'label' => 'Moderate',  
                'value' => 'Moderate'  
            ),  
            'two' => array (  
                'label' => 'Challenging',  
                'value' => 'Challenging'  
            ),  
            'three' => array (  
                'label' => 'Fairly Strenuous',  
                'value' => 'Fairly Stre.'  
            )
			  
        )  
    ) ,
	  
	 array(  
        'label'=> 'Max Altitude',  
        'desc'  => 'Max Altitude.',  
        'id'    => $prefix.'altitude',  
        'type'  => 'text'  
    ),  
	
    array(  
        'label'=> 'Trip Type',  
        'desc'  => 'Trip Type.',  
        'id'    => $prefix.'trip',  
        'type'  => 'text'  
    ),  
	  array(  
        'label'=> 'Trip Days',  
        'desc'  => 'Trip Days.',  
        'id'    => $prefix.'trip_day',  
        'type'  => 'text'  
    ),  
  
);  


// The Callback  
function show_climbing_meta_box() {  
global $climbing_meta_fields, $post;  
// Use nonce for verification  
echo '<input type="hidden" name="climbing_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
      
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($climbing_meta_fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // begin a table row with  
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    case 'text':  
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
        <br /><span class="description">'.$field['desc'].'</span>';  
break; 
case 'textarea':  
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
        <br /><span class="description">'.$field['desc'].'</span>';  
break;  
case 'checkbox':  
    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';  
break;
// select
case 'select':
    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
    foreach ($field['options'] as $option) {
        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;  
                } //end switch  
        echo '</td></tr>';  
    } // end foreach  
    echo '</table>'; // end table  
}  



// Save the Data  
function save_climbing_meta($post_id) {  
    global $climbing_meta_fields;  
      
    // verify nonce  
    if (!wp_verify_nonce($_POST['climbing_meta_box_nonce'], basename(__FILE__)))   
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
    foreach ($climbing_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_climbing_meta');