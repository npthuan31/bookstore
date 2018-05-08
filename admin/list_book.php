<?php
session_start();
if(!isset($_SESSION["user_admin"]))
{
    header("location:login.php");
    exit();
}
include('controllers/c_book.php');
$c_book = new C_book();
$c_book->show_all_book();
?>