<?php
/**
* alecaddd adminpages class
*/

namespace Inc\Base;

use Inc\Base\Basecontroller;

class Enqueue extends Basecontroller{

	public function register(){
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );
  } // register

	// enqueue
	public function enqueue(){
		wp_enqueue_style( 'my-css', $this->plugin_url.'/assets/css/style.css' );
		wp_enqueue_script( 'my-js', $this->plugin_url.'/assets/js/script.js' );
	} // enqueue

} // end class Enqueue

?>
