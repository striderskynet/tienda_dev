<?php
    function load_asset ($name, $main = true) {
      global $_config;
      
      $name = explode(".", strtolower($name));
      

      //
      if ( !isset($name[1])) $name[1] = "pages";
      if ( stristr($name[0], ":") ) $name[0] = str_replace(":", ".", $name[0]);

     // print_r ( $name );

      $file_path = _LOCAL . "assets" . DS . "_pages" . DS . strtoLower($name[0]) . ".asset";
      if ( $main == true ) $file_path = _LOCAL . "assets" . DS . "_" . $name[1] . DS . strtoLower($name[0]) . ".asset";
      
      if ( !file_exists($file_path) ) {
        echo file_get_contents( _LOCAL . "assets" . DS . "_pages" . DS . $_config['errorAction'] . ".asset" );
        return ;
      }

      echo file_get_contents( $file_path );
    }
    
    function getAction(){
      global $_config;

      if ( !isset(array_keys($_GET)[0]) ) return $_config['defaultAction'];

      return array_keys($_GET)[0];
    }
  
    function menu_activate(){
      if (!isset(array_keys($_GET)[0])) $action = "portal";
      else $action = array_keys($_GET)[0];
  
      if (stristr($action, ":")) $menu = explode(":", $action);
      else $menu[0] = $action;
  
      $submenu = "";
      if (isset($menu[1])) {
          $submenu = "$('#menu_{$menu[0]}_{$menu[1]}').addClass('active');";
      }
      echo "<script>
          $('#menu_{$menu[0]}').addClass('active open');
          {$submenu}
      </script>";
  }
?>