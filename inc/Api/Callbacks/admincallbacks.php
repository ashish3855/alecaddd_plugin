<?php
/**
 * admin callbacks
 */

namespace Inc\Api\Callbacks;

use Inc\Base\Basecontroller;

class AdminCallbacks extends Basecontroller
{
  public function adminDashboard(){
    return require( $this->plugin_path.'templates/admin.php' );
  }

  public function cptDashboard(){
    var_dump('I am in cpt dashboard');
    return require( $this->plugin_path.'templates/cpt.php' );
  }

  public function taxonomyDashboard(){
    var_dump('I am in taxonomy dashboard');
    return require( $this->plugin_path.'templates/taxonomy.php' );
  }

  public function widgetDashboard(){
    var_dump('I am in widget dashboard');
    return require( $this->plugin_path.'templates/widget.php' );
  }

  public function alecadddOptionsGroup( $input ){
    return $input;
  }

  public function alecadddAdminSection(){
    // echo "This is the settings section";
  }

  public function alecadddTextExample(){
    $value = esc_attr( get_option( 'text_example' ) );
    echo "<input type='text' class='regular-text' name='text_example' value='".$value."' placeholder='Write Something Here'>";
  }
  public function alecadddFirstName(){
    $value = esc_attr( get_option( 'first_name' ) );
    echo "<input type='text' class='regular-text' name='first_name' value='".$value."' placeholder='Write First Name'>";
  }

}


 ?>
