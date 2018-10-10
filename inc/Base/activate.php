<?php
/**
* alecaddd activate class
*/

namespace inc\Base;

class Activate{

  public static function activate(){
    flush_rewrite_rules();
  }

}

?>
