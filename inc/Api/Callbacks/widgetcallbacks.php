<?php
/**
 * widget callbacks
 */

namespace Inc\Api\Callbacks;

use Inc\Base\Basecontroller;

class WidgetCallbacks extends Basecontroller
{
  public function widgetDashboard(){
    return require( $this->plugin_path.'templates/widget.php' );
  }
}


 ?>
