<?php 

ini_set('display_errors', 'On');
    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pass = "heshan";
    $mysql_db = "taxiapp";

    if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysql_select_db($mysql_db)){
        die("Connection Error");
    }
    session_start();
?>
