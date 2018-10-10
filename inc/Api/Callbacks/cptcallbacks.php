<?php
/**
 * custom post types callbacks
 */

namespace Inc\Api\Callbacks;

use Inc\Base\Basecontroller;

class CptCallbacks extends Basecontroller
{
  public function cptDashboard(){
    return require( $this->plugin_path.'templates/cpt.php' );
  }
}


 ?>
