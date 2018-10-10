<?php
/**
* alecaddd activate class
*/

namespace Inc;

class Init{

  /**
  * store all the clasess inside an array
  * @return array full list of clasess
  */
  public static function get_services(){

    return [
      Pages\Admin::class,
      Base\Enqueue::class,
      Base\SettingsLinks::class
    ];

  } // end get_services method

  /**
  * Loop throuth the clasess, initialize theme_head
  * and call the register method if it exists
  * @return
  */
  public static function register_services(){

    foreach (self::get_services() as $class) {
      $service = self::instantiate( $class );
      if( method_exists($service, 'register') ){
        $service->register();
      }
    }
  } // end register_services

  /**
  * initialize class
  * @param class $class from services array
  * @return class object
  */
  private static function instantiate($class){
      return new $class();
  } //end initialize method

} // end of the class

?>
