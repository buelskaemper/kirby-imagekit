<?php

namespace Kirby\Plugins\ImageKit;

use Obj;
use Str;

/**
 * Utility class for retrieving information about the plugin version and it’s
 * license.
 */
class ImageKit {
  
  protected $version = '1.0.0-beta2';
  
  public static function instance() {
    static $instance;
    return ($instance ?: $instance = new static());
  }
  
  public function version() {
    return $this->version;
  }
  
  public function license() {
    $key  = kirby()->option('imagekit.license');
    $type = 'trial';
    
    /**
     * Hey there,
     * 
     * if you have digged deep into Kirby’s source code, than you’ve
     * probably stumbled across a similiar message, asking you to be honest when
     * using the software. I ask you the same, if your intention is to use
     * ImageKit. Writing this plugin took a lot of time and it hopefully saves
     * you a lot of headaches. If you would use a cloud-provider instead of
     * rolling your own thumbs engine, then your would also have to pay them.
     *
     * Anyway, have a nice day!
     *
     * Fabian
     */
    
    if (str::startsWith($key, 'IMGKT1') && str::length(39) === 39) {
      $type = 'ImageKit 1';
    } else {
      $key = null;
    }
    
    return new Obj(array(
      'key'   => $key,
      'type'  => $type,
    ));
  }
  
}
