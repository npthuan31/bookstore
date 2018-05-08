<?php
session_start();
if(!isset($_SESSION["user_admin"]))
{
    header("location:login.php");
    exit();
}
include('controllers/c_dashboard.php');
$c_dashboard=new C_dashboard();
$c_dashboard->show_dashboard();
?>