<?php 
    $lifetime = 60*60;
    session_set_cookie_params($lifetime,'/');
    session_start();
    require_once 'Bridge.php';
?>