<?php
/**
 * @Alecaddd-plugin
 */

namespace Inc\Api;

class SettingsApi
{
  public $admin_pages = array();
  public $admin_subpages = array();

  public $admin_settings = array();
  public $admin_sections = array();
  public $admin_fields = array();

  /**
   * check condition if $admin_pages is not empty
   * run add_action hook admin_menu
   */
  public function register(){
      if( !empty( $this->admin_pages )){
        add_action('admin_menu', array($this , 'addAdminMenu' ));
      }

      if( !empty( $this->admin_settings )){
        add_action('admin_init', array($this , 'registerCustomFields' ));
      }
  }

  /**
   * get and store pages in array $this->pages
   */
  public function addPages(array $pages){

    $this->admin_pages= $pages;
    return $this;

  } // end add_pages


  /**
   * default subpage title
   */
  public function withSubpages(string $title=null){


    if( empty($this->admin_pages  ) ){
      return $this;
    }

    $admin_page = $this->admin_pages[0];
    $subpage = array(
			array(
        'parent_slug' => $admin_page['menu_slug'],
				'page_title' => $admin_page['page_title'],
				'menu_title' => ( !empty($title)? $title : $admin_page['menu_title']),
				'capability' => $admin_page['capability'],
				'menu_slug' => $admin_page['menu_slug'],
				'callback' => $admin_page['callback'],
			),
		); //array finished

    $this->admin_subpages = $subpage;

    return $this;

  } // end withSubpages


  // -----------------------------------
  public function addSubpages(array $pages){

    $this->admin_subpages = array_merge($this->admin_subpages, $pages);
    return $this;

  } // end addSubpages

  public function addSettings(array $settings){
    $this->admin_settings= $settings;
    return $this;
  } // end add_settings setter method

  public function addSections(array $sections){
    $this->admin_sections= $sections;
    return $this;
  } // end add_settings setter method

  public function addFields(array $fields){
    $this->admin_fields= $fields;
    return $this;
  } // end add_settings setter method

  /**
  * execute admin_menu add all pages one by one
  * create add_admin_menu for create new admin menu
  */
  public function addAdminMenu(){

    foreach ($this->admin_pages as $page) {
      add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'],
      $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
    } // end foreach

    foreach ($this->admin_subpages as $page) {
      add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
       $page['callback'] );
    } // end foreach

  } // end addAdminMenu method

  public function registerCustomFields(){

    foreach ($this->admin_settings as $setting) {
      // var_dump($setting['option_name']); die();
      register_setting( $setting['option_group'], $setting['option_name'], ( isset($setting['callback'])? $setting['callback']:'' ) );
    }
    foreach ($this->admin_sections as $section) {
      // var_dump($section); die();
      add_settings_section( $section['id'], $section['title'], ( isset($section['callback'])? $section['callback']:'' ), $section['page'] );
    }
    foreach ($this->admin_fields as $field) {
      // var_dump($field); die();
      add_settings_field( $field['id'], $field['title'], ( isset($field['callback'])? $field['callback']:'' ), $field['page'], $field['section'], $field['args'] );
    }

  }

} // end SettingsClass

?>
