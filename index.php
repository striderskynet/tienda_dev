<?php
    session_start();
    require_once("./config.php");


        // Load header asset
    load_asset("HEADER.NAV");

    // Load main navigation asset
    load_asset("MENU.NAV");
    menu_activate();

    load_asset(getAction(), false);
   // echo asset(getAction());

     // Load main navigation asset
    load_asset("FOOTER.NAV");
    
   
?>