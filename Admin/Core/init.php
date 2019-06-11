<?php 
require 'Database/db_connect.php';
require 'Function/Users.php';

session_start();
error_reporting(0);
ob_start();
$errors = array();
?>