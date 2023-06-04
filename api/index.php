<?php
    
    require_once("mysql.php");

    $config['db']['host'] = "127.0.0.1";
    $config['db']['user'] = "root";
    $config['db']['pass'] = "";
    $config['db']['data'] = "mitaller_dev";

    $db = @new db($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['data']);

    if ( !isset ($_GET['mode']) or !isset ($_GET['type']) or !isset ($_GET['value']) ) die ("error!");
    //if ( !isset ($_POST['mode']) or !isset ($_POST['type']) or !isset ($_POST['value']) ) die ("error!");

    function request_columns_items(){
        global $db;
        
        $query = 'SHOW COLUMNS FROM `mitaller_dev`.`inventory_items`';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    function request_datalist_kids(){
        global $db;
        
        $query = 'SELECT kids FROM `icc_endirecto`.`price_hotel` WHERE `kids` IS NOT NULL GROUP BY `kids` ';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    function request_datalist_room(){
        global $db;
        
        $query = 'SELECT room FROM `icc_endirecto`.`price_hotel` WHERE `room` IS NOT NULL GROUP BY `room` ';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    function request_datalist_roomtype(){
        global $db;
        
        $query = 'SELECT hab_type_1 FROM `icc_endirecto`.`price_hotel` WHERE `hab_type_1` IS NOT NULL GROUP BY `hab_type_1` ';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    function request_datalist_agency(){
        global $db;
        
        $query = 'SELECT `name` FROM `icc_endirecto`.`price_agency` WHERE `name` IS NOT NULL GROUP BY `name` ';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    function request_datalist_location(){
        global $db;
        
        $query = 'SELECT `place` FROM `icc_endirecto`.`price_hotel` WHERE `place` IS NOT NULL GROUP BY `place` ';
        $data = $db->query($query)->fetchAll();
        return json_encode($data);
    }

    echo ($_GET['mode'] ."_". $_GET['type'] ."_". $_GET['value'])();
    $db->close();
?>