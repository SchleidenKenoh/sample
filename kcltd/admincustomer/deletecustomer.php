<?php

require_once '../class/book.class.php';

//resume session here to fetch session values
session_start();


//if the above code is false then code and html below will be executed
$book = new Book;
if (isset($_GET['id'])) {
    if ($book->delete($_GET['id'])) {
        //redirect user to program page after saving
        header('location: customer.php');
    }
}
?>