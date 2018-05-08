<?php
session_start();
include('controllers/c_order.php');
$c_order = new C_order();
$c_order->c_save_order();
?>