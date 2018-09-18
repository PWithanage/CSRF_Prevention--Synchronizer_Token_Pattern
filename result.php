<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Synchronizer Token Pattern</title>

        <link rel="stylesheet"  href="./public/css/bootstrap.min.css">
        <script src="./public/js/jquery-3.3.1.min.js"></script>
   
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <ul class="nav justify-content-end">
                <?php 
                    if(isset($_COOKIE['session_cookie'])) 
                    {
                        echo "<li class='nav-item'>
                                <a class='nav-link active' href='logout.php'>Logout</a>
                            </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="col-md-5 mx-auto order-12">
				<div class="card my-5 p-3 shadow">
					<div class="card-body" align="center">
						<h5 class="card-title text-center">Updated Successfully</h5>
            						<?php
                                        
                						if(isset($_COOKIE['session_cookie']))
                						{
                							session_start();
                                            //comparing the CSRF token submitted with the POST request and the token saved in server code.
                							if ($_POST['csrf_token'] == $_SESSION['CSRF_Token']) 
                							{
                                                
                								$streetAddress=$_POST['streetAddress'];
                								$city=$_POST['city'];
                								$province=$_POST['province'];
                								$postal_code=$_POST['postalCode'];

                								echo "<div class='alert alert-primary' role='alert'>".$streetAddress."</div>";
                								echo "<div class='alert alert-primary' role='alert'>".$city."</div>";
                								echo "<div class='alert alert-primary' role='alert'>".$province."</div>";
                								echo "<div class='alert alert-primary' role='alert'>".$postal_code."</div>";
												echo "<div class='alert alert-info' role='alert'>Address updated successfully. CSRF Token submitted through the
													form and the CSRF token which was stored in server side are equal. Therefore this is a legitimate user request.</div>";
                							}
                							else
                							{                                                
                								echo "<script>alert('ERROR!!!')</script>";
                							}
                						}
            						?>
			</div>
		</div>
	 </div>

    </body>
</html>