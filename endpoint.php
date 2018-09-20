<?php
	//reply to the Ajax request sent from the client's browser and return the CSRF token saved in the server side.
	session_start();
	if(isset($_POST["request"]))
	{
		$data["csrf_token"]=$_SESSION['CSRF_Token'];
		echo json_encode($data);	
	}
?>