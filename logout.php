<?php 
session_start();

include_once 'index.php';

unset($_SESSION['name']);
unset($_SESSION['phone']);
unset($_SESSION['email']);
unset($_SESSION['admin']);

header ('Location:'. 'index.php');