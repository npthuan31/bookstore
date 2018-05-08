<?php
session_start();
include('controllers/c_review.php');
$c_review = new C_review();
$c_review->post_review();
?>