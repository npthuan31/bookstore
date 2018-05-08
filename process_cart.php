<?php
session_start();
include('controllers/c_cart.php');
$action=$_POST["action"];
$c_cart = new C_cart();
if($action=="add_book")
{
    $c_cart->add_book();
}

if($action=="remove_book")
{
    $c_cart->remove_book();
}

if($action=="update_quantity")
{
    $c_cart->update_quantity();
}
?>