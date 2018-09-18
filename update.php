<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Synchronizer Token Pattern</title>
        
        <link rel="stylesheet"  href="./public/css/bootstrap.min.css">        
        <script src="./public/js/jquery-3.3.1.min.js"></script>
		
		<!--<?php include (realpath(__DIR__)."/public/header.php") ?>
		-->
		<style>
		.footer {
		   position: fixed;
		   left: 0;
		   bottom: 0;
		   width: 100%;
		   background-color: #cdced0;
		   color: black;
		   text-align: center;
		}
		</style>
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
		<div class="col-md-6 mx-auto order-12">
			<div class="card my-5 p-3 shadow">
				<div class="card-body">
					<h5 class="card-title text-center">Update your Address</h5>
						
                                    <?php 
                                        
                                        if(isset($_COOKIE['session_cookie'])) 
                                        {
                                            //Update Address Form submission
											//Here the CSRF token received from the server will be added to a hidden field
                                            echo "
                    						<form class='mt-5 mb-3' action='result.php' method='POST' enctype='multipart/form-data'>
											
                                                <!-- CSRF Token will be added to this hidden field-->
                                                    <input type='hidden' name='csrf_token' id='csrf_token' value=''>   
                                                <!--  -->
												
                                                <div class='form-group row'>
                                                	<label for='streetAddress' class='col-sm-3 col-form-label'>Street Address</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' id='streetAddress' name='streetAddress' placeholder='Street Address' required>
                                                </div>
                                                </div>
                                              
												<div class='form-group row'>
                                                	<label for='city' class='col-sm-3 col-form-label'>City</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' id='city' name='city' placeholder='City' required>
                                                </div>
                                                </div>
												
												<div class='form-group row'>
                                                	<label for='province' class='col-sm-3 col-form-label'>Province</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' id='province' name='province' placeholder='Province' required>
                                                </div>
                                                </div>
												
												<div class='form-group row'>
                                                	<label for='postalCode' class='col-sm-3 col-form-label'>Postal Code</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' id='postalCode' name='postalCode' placeholder='Postal Code' required>
                                                </div>
                                                </div>
												
                                                <button type='submit' class='btn btn-primary btn-block mt-5' id='submit' name='submit'>Update</button>
											</form>";
                                        }
                                    ?>
                                    <!--Request is sent to the server for retrieving the generated CSRF token for the session-->
                                    <!--And that value is embedded to the hidden field value of the form.-->
            						<script >
            						var request="true";
            						$.ajax({
            						url:"endpoint.php",
            						method:"POST",
            						data:{request:request},
            						dataType:"JSON",
            						success:function(data)
            						{
            							document.getElementById("csrf_token").value=data.csrf_token;
            						}

            						})
            						</script>
									
			</div>
		</div>
	</div>
									
		
        <div class="footer">
		<p>Cross Site Request Forgery Protection - Synchronizer Token Pattern  |  IT15010636</p>
		</div>

	</body>
</html>