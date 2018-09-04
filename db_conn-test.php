<?php
	// Conexão 
	require_once 'db_connect.php';
	$dbconn = pg_connect($db_string);
	$result = pg_query($dbconn, "select * from pg_stat_activity");
	var_dump(pg_fetch_all($result));