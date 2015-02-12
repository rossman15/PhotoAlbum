<?php
	//SEES IF A USER IS LOGGED IN
	session_start();
	if(isset($_SESSION['username'])) {
		$loggedin = TRUE;
	}else {
		$loggedin = FALSE;
	}
?>
