<?php
    //Start Sessions
    session_start();
    //Include Configuration
    require_once ('config/config.php');

    //Include Helper Functions Files
    require_once ('helpers/db_helper.php');
    require_once ('helpers/format_helper.php');
    require_once ('helpers/system_helper.php');

    //Autoload Classes
    function __autoload($class_name){
        require_once ('libraries/'.$class_name.'.php');
    }
?>