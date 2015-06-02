<?php

/**
 * Class tpwAdmin - contains WP administration panel for TPW Ratings plugin
 * @author Weblab.nl - Traian Zainescu
 */

class tpwAdminPanel{

	function __construct() {
		//register administration menu hook
		add_action( 'admin_menu', array( $this, 'addMenuLink' ) );
	}

	/**
	 * Include the link to the class settings in the menu
	 */
	function addMenuLink() {
		add_options_page(
				__( 'ThePerfectWedding.nl Widget', 'tpwratingwidget' ),
				__( 'TPW Widget Options', 'tpwratingwidget' ),
				'administrator',
				'TPWWidget',
				array( $this, 'renderTemplate' )
		);
	}

	function renderTemplate() {
		include( 'tpwAdminPanelTemplate.php' );
	}

}

new tpwAdminPanel;