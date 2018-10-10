<?php
/**
 * taxonomy callbacks
 */

namespace Inc\Api\Callbacks;

use Inc\Base\Basecontroller;

class TaxonomyCallbacks extends Basecontroller
{
  public function taxonomyDashboard(){
    return require( $this->plugin_path.'templates/taxonomy.php' );
  }
}


 ?>
