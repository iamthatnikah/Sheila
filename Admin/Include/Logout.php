<?php

session_start();

unset($_SESSION["User_id"]);

unset($_SESSION["User_EmailAddress"]);

$_SESSION["User_Id"] = null;
$_SESSION["User_EmailAddress"] = null;
$_SESSION["User_FirstName"] = null;
$_SESSION["User_LastName"] = null;
$_SESSION["User_Image"] = null;

header("location:Login.php");

?>