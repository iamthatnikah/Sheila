<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "Cms";

foreach ($db as $key => $value) {
	define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
/*if ($connection) {
	echo "<h5>We are connected to the database</h5>";
}
else{
	echo "<h5>We are not connected</h5>";
}*/

?>