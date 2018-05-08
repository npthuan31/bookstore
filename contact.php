<?php
session_start();
include_once("controllers/c_contact.php");
$c_contact=new C_contact();
$c_contact->show_send_contact();
?>