<?php
/**********************************************************/
/**********************************************************/

/* Widget start for contact detail */

/**********************************************************/
/**********************************************************/

class contact  extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contact', // Base ID
			__('Contact Detail', 'text_domain'), // Name
			array( 'description' => __( 'Contact widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		} ?>
		<ul class="footer_contact">
                    	<li style="text-transform:uppercase;"><i class="fa fa-home"></i><?php echo get_bloginfo( 'name' ); ?></li>
                        <li><i class="fa fa-map-marker"></i><?php echo get_option('crossover_company_address');?> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_option('crossover_company_address1');?></li>
                        <li><i class="fa fa-phone"></i><?php echo get_option('crossover_company_phone');?></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo get_option('crossover_company_email');?>"><?php echo get_option('crossover_company_email');?></a></li>
                    </ul>
				  
                 
		<?php 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
			
		?>
     
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		  
		
         <ul class="footer_contact">
                    	<li style="text-transform:uppercase;"><i class="fa fa-home"></i><?php echo get_bloginfo( 'name' ); ?></li>
                        <li><i class="fa fa-map-marker"></i><?php echo get_option('crossover_company_address');?> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_option('crossover_company_address1');?></li>
                        <li><i class="fa fa-phone"></i><?php echo get_option('crossover_company_phone');?></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo get_option('crossover_company_email');?>"><?php echo get_option('crossover_company_email');?></a></li>
                    </ul>
                  
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		

		return $instance;
	}

} 

function register_contact () {
    register_widget( 'contact' );
}
add_action( 'widgets_init', 'register_contact' );

/* End contact detail widget */
/**********************************************************/
/**********************************************************/

/* Widget start for Footer Link detail */

/**********************************************************/
/**********************************************************/

class footer_link  extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'footer_link', // Base ID
			__('Footer Links', 'text_domain'), // Name
			array( 'description' => __( 'Footer Links widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		} ?>
		<?php
		
		$defaults = array(
			'theme_location'  => 'footer-menu',
			'menu'            => '',
			'container'       => 'ul',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'footer_menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		
		wp_nav_menu( $defaults );
		
		?> 
				  
                 
		<?php 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
			
		?>
     
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		  
		
         <?php
		
		$defaults = array(
			'theme_location'  => 'footer-menu',
			'menu'            => '',
			'container'       => 'ul',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'footer_menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		
		wp_nav_menu( $defaults );
		
		?> 
                  
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		

		return $instance;
	}

} // class contact

function register_footer_link () {
    register_widget( 'footer_link' );
}
add_action( 'widgets_init', 'register_footer_link' );

/* End Footer Links widget */
/**********************************************************/
/**********************************************************/

/* Widget start for Working Hours detail */

/**********************************************************/
/**********************************************************/

class working_hour  extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'working_hour', // Base ID
			__('Working Hours', 'text_domain'), // Name
			array( 'description' => __( 'Working Hours widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		} ?>
		<p class="hour"><?php echo get_option('crossover_working_hour');?></p>
				  
                 
		<?php 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
			
		?>
     
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		  
		
       <p class="hour"><?php echo get_option('crossover_working_hour');?></p>
                  
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		

		return $instance;
	}

} // class contact

function register_working_hour () {
    register_widget( 'working_hour' );
}
add_action( 'widgets_init', 'register_working_hour' );