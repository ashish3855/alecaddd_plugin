<?php
/**
* alecaddd adminpages class
*/
use Inc\Base\Basecontroller;
namespace Inc\Base;

class SettingsLinks extends Basecontroller{

	public function register(){
			add_filter( 'plugin_action_links_'.$this->plugin, array( $this, 'add_action_links') );
	} // register

	// add custom settings links admin plugin
	function add_action_links ( $links ) {
		 $mylinks = array(
		 '<a href="' . admin_url( 'options-general.php?page=alecaddd_plugin' ) . '">Settings</a>',
		 );
		 return array_merge( $links, $mylinks );
	} // add_action_links

} // end class Enqueue

?>
