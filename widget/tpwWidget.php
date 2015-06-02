<?php

/**
 * Class tpw_widget - prepares the sidebar widget
 * @autor Traian Zainescu - Weblab.nl
 */

class tpwWidget extends WP_Widget {

    public function __construct() {

        parent::__construct(
                    'tpw_rating', // Base ID of your widget
                    __( 'ThePerfectWedding.nl Widget', 'tpwratingwidget' ), // Widget name will appear in UI
                    array( 'description' => __( 'With this widget you’re able to share the reviews you gathered on your own Wordpress website - The widget contains the right mark-up to display “review stars” in the Google search result.', 'tpwratingwidget' ) ) // Widget description
        );
    }


    // Create widget front-end
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if( !empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

            // This is where you run the code and display the output
            $ratings = new tpwRatings();
            $ratings->renderRatings();

        echo $args['after_widget'];
    }


    //Create Widget Backend
    public function form( $instance ) {

        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'ThePerfectWedding.nl Widget', 'tpwratingwidget' );
        }
        // Widget admin form
        include( 'tpwWidgetAdminFormTemplate.php' );
    }

    // Update widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


