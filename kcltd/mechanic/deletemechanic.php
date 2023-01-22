<?php

require_once '../class/mechanics.class.php';

//resume session here to fetch session values
session_start();


//if the above code is false then code and html below will be executed
$mechanic = new Mechanic;
if (isset($_GET['id'])) {
    if ($mechanic->delete($_GET['id'])) {
        //redirect user to program page after saving
        header('location: mechanics.php');
    }
}
?>