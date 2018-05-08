<?php
session_start();
include('controllers/c_book.php');
$c_book = new C_book();
$c_book->show_sale_book();
?>