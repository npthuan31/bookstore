<?php
session_start();
if(!isset($_SESSION["user_admin"]))
{
    header("location:login.php");
    exit();
}
include('controllers/c_order.php');
$c_order = new C_order();
$c_order->show_order_detail();
?>