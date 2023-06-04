<?php
    define("DS", DIRECTORY_SEPARATOR);
    define("_LOCAL", $_SERVER['DOCUMENT_ROOT'] . DS);

    $_config['defaultAction'] = "PORTAL";
    $_config['errorAction'] = "404";

    require_once ( _LOCAL . "class" . DS . "core" . DS . "assets.php");
?>