<?php
function Userexists($Email){
	$Email = sanitize($Email);
	$query = mysql_query("SELECT COUNT ('User_id') FROM 'users' WHERE 'User_EmailAddress' = '$Email'");
	return (mysql_result($query, 0) == 1) ? true : false;
}
?>