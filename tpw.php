<?php

    /*
    Plugin Name: ThePerfectWedding.nl Widget
    Plugin URI: https://www.theperfectwedding.nl
    Description: With this widget you’re able to share the reviews you gathered on your own Wordpress website - The widget contains the right mark-up to display “review stars” in the Google search result.
    Author: ThePerfectWedding.nl
    Version: 1.0
    Author URI: https://www.theperfectwedding.nl
    */

    //load translations
    function TPW_Rating_Widget_textdomain() {
        load_plugin_textdomain( 'tpwratingwidget', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
    }
    add_action( 'plugins_loaded', 'TPW_Rating_Widget_textdomain' );

    //add settings link below plugin in plugins screen
    function TPW_Rating_Widget_link( $links ) {
        $mylink = array(
            '<a href="' . esc_url( get_admin_url( null, 'options-general.php?page=TPWWidget' ) ) . '">' . __( 'Settings' ) . '</a>'
        );
        return array_merge( $links, $mylink );
    }
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'TPW_Rating_Widget_link' );


    //include config files
    require_once( 'config/tpwConfig.php' );

    //include the admin files
    require_once( 'admin/tpwAdminPanel.php' );

    //include  the widget files
    require_once( 'widget/tpwWidget.php' );
    require_once( 'widget/tpwRatings.php' );

    //include library files
    require_once( 'lib/tpwHelpers.php' );
    require_once( 'lib/tpwCache.php' );

    //register the sidebar widget
    function registerWidget() {
        register_widget( 'tpwWidget' );
    }

    add_action( 'widgets_init', 'registerWidget' );