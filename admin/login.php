<?php
session_start();
if(isset($_SESSION["user_admin"]))
{
    header("location:dashboard.php");
    exit();
}
include("controllers/c_user.php");
$c_user=new C_user();
$c_user->show_login();

?>