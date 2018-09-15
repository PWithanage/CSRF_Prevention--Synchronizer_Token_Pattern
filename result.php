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
        <div class="container">
            <div class="row" align="center" style="padding-top: 100px;">
                <div class="col-12">           
                    <div class="card">
                        <h5 class="card-header">Updated Successfully</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
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
                								echo "<div class='alert alert-secondary' role='alert'>".$city."</div>";
                								echo "<div class='alert alert-success' role='alert'>".$province."</div>";
                								echo "<div class='alert alert-info' role='alert'>".$postal_code."</div>";		
                							}
                							else
                							{
                                                
                								echo "<script>alert('ERROR!!!')</script>";
                							}
                						}
            						?>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="./public/js/bootstrap.min.js"></script>
        <script src="./public/js/popper.min.js"></script>
    </body>
</html>