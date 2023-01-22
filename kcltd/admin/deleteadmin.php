<?php

require_once '../class/admins.class.php';

//resume session here to fetch session values
session_start();


//if the above code is false then code and html below will be executed
$admins = new Admin;
if (isset($_GET['id'])) {
    if ($admins->delete($_GET['id'])) {
        //redirect user to program page after saving
        header('location: admins.php');
    }
}
?>