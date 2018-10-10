<?php
/**
* alecaddd adminpages class
*/

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\Basecontroller;
use Inc\Api\SettingsApi;

class Admin extends Basecontroller{

	public $settings;
	public $callback;

	public $pages = array();
	public $subpages = array();

	public function pages(){
		// var_dump(array( $this->callback, 'adminDashboard' )); die();
		/**
		* create instance of SettingsApi
		* put menu descriptioned content in array $this->pages
		*/
		 $this->pages = array(
			 array(
				 'page_title' => 'Alecaddd Plugin',
				 'menu_title' => 'Alecaddd',
				 'capability' => 'manage_options',
				 'menu_slug' => 'alecaddd_plugin',
				 'callback' => array( $this->callback, 'adminDashboard' ),
				 'icon_url' => 'dashicons-admin-home',
				 'position' => 110
			 )
		 ); //array finished
	} // finish pages function

	public function subpages(){

		$this->subpages = array(
			array(
				'parent_slug' => 'alecaddd_plugin',
				'page_title' => 'Custom Post Type manager',
				'menu_title' => 'CPT manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd_cpt',
				'callback' => array($this->callback, 'cptDashboard')
			),
			array(
				'parent_slug' => 'alecaddd_plugin',
				'page_title' => 'Taxonomy manager',
				'menu_title' => 'TXN manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd_txn',
				'callback' => array($this->callback, 'taxonomyDashboard')
			),
			array(
				'parent_slug' => 'alecaddd_plugin',
				'page_title' => 'Widget manager',
				'menu_title' => 'widger manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd_widget',
				'callback' => array($this->callback, 'widgetDashboard')
			)
		); //array finished

	} // end finished subpages

	/**
	 * In this register function which will run
	 * chain method form SettingsApi obj
	 * @param $this->pages which contain array of admin menu
	 */
	function register(){
		$this->settings = new SettingsApi();

		$this->callback = new AdminCallbacks();

		$this->pages();
		$this->subpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		//  chain functionaning
		$this->settings->addPages( $this->pages )->withSubpages('Dashboard')->addSubpages( $this->subpages )->register();
  } // register


	public function setSettings(){
		$args = array(
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'text_example',
				'callback' => array($this->callback, 'alecadddOptionsGroup'),
			),
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'first_name',
				'callback' => array($this->callback, 'alecadddOptionsGroup'),
			)
		); //array finished
		$this->settings->addSettings( $args ); // call setter function
	}

	public function setSections(){
		$args = array(
			array(
				'id' => 'alecaddd_admin_index',
				'title' => 'Settings Page Sections',
				'callback' => array($this->callback, 'alecadddAdminSection'),
				'page' => 'alecaddd_plugin'
			)
		); //array finished
		$this->settings->addSections( $args ); // call setter function
	}
	public function setFields(){
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array($this->callback, 'alecadddTextExample'),
				'page' => 'alecaddd_plugin',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for'=> 'text_example',
					'class' => 'example_class'
				)
			),
				array(
					'id' => 'first_name',
					'title' => 'First Name',
					'callback' => array($this->callback, 'alecadddFirstName'),
					'page' => 'alecaddd_plugin',
					'section' => 'alecaddd_admin_index',
					'args' => array(
						'label_for'=> 'first_name',
						'class' => 'example_class'
					)
				),
		); //array finished
		$this->settings->addFields( $args ); // call setter function
	}

} // end class Admin

?>
