<?php //* Don't include this PHP Opening Tag

function agentpress_front_page_enqueue_scripts() {

	//* Load scripts only if custom background is being used
	if ( ! get_option( 'agentpress-home-image' ) )
		return;

	//* Enqueue Backstretch scripts
	wp_enqueue_script( 'agentpress-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'agentpress-backstretch-set', get_bloginfo( 'stylesheet_directory' ).'/js/backstretch-set.js' , array( 'jquery', 'agentpress-backstretch' ), '1.0.0' );
	wp_localize_script( 'agentpress-backstretch-set', 'BackStretchImg', array( 'src' => str_replace( 'http:', '', get_option( 'agentpress-home-image' ) ) ) );
	
  	//* Enqueue JS and CSS files for Carousel Effect
  	global $wp_widget_factory;
  	if ( is_active_widget( false, false, $wp_widget_factory->widgets[Extended_AgentPress_Featured_Listings_Widget]->id_base, true ) ) {
    		wp_enqueue_style( 'bxslider-css', get_bloginfo( 'stylesheet_directory' ) . '/jquery.bxslider.css' );
    		wp_enqueue_script( 'bxslider-js', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.bxslider.min.js', array(), '1.0.0' );
    		wp_enqueue_script( 'easing-js', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.easing.1.3.js', array(), '1.0.0' );
    		wp_enqueue_script( 'listings-slider', get_bloginfo( 'stylesheet_directory' ) . '/js/listings_slider.js', array(), '1.0.0' );
  	}

	//* Add agentpress-pro-home body class
	add_filter( 'body_class', 'agentpress_body_class' );
}
