<?php
session_start();
include('controllers/c_cart.php');
$c_cart = new C_cart();
$c_cart->show_cart();
?>