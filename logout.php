<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();
// alert message

header('location:login_form.php');

?>

