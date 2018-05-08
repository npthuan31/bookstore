<?php
session_start();
if(!isset($_SESSION["user_admin"]))
{
    header("location:login.php");
    exit();
}
include('controllers/c_author.php');
include('controllers/c_category.php');
include('controllers/c_nha_xuat_ban.php');
if($_POST["key"]=="tac_gia")
{
    $c_author = new C_author();
    $c_author->autocomplete_author_name();
}
if($_POST["key"]=="loai_sach")
{
    $c_category = new C_category();
    $c_category->autocomplete_category_name();
}
if($_POST["key"]=="nha_xuat_ban")
{
    $c_nha_xuat_ban = new C_nha_xuat_ban();
    $c_nha_xuat_ban->autocomplete_nha_xuat_ban_name();
}

?>