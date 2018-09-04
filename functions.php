<?php
	function cleanstring($value){
    	$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    	$replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    	return str_replace($search, $replace, $value);
	}
?>