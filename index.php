<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Synchronizer Token Pattern</title>

    <link rel="stylesheet"  href="./public/css/bootstrap.min.css">
    <script src="./public/js/jquery-3.3.1.min.js"></script>
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
            <a class='nav-link active' href='index.php'>Online Shopping</a>
        </nav>
    <div class="container">
      <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">
          <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <form action='index.php' method='POST' enctype='multipart/form-data'>       
                    <div class="form-group row">
                      <label for="Email" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Login</button>
                  </form>
                </div>
                <div class="col-sm-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<div class="footer">
		<p>Cross Site Request Forgery Protection - Synchronizer Token Pattern  |  IT15010636</p>
	</div>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/popper.min.js"></script>
  </body>
</html>

<!--After User clicks login button-->
<?php
	
  if(isset($_POST['submit']))
  {
    //Invoke login function
		login();
	}

	function login()
	{
    //Here hardcoded credentials are used
		$username='admin';
		$password='admin';

		$input_username = $_POST['username'];
		$input_pwd = $_POST['password'];
		
    //check whether user input credentials match with the hardcoded credentials
		if(($input_username == $username)&&($input_pwd == $password))
		{
      //After the user validation, session is started
			session_set_cookie_params(300);
			session_start();
			session_regenerate_id();

			//create the session cookie
			setcookie('session_cookie', session_id(), time() + 300, '/');

			//Create the CSRF token for the session and store in the memory
			$_SESSION['CSRF_Token'] = generate_token();

			//User is redirected to the update address page
			header("Location:update.php");
   		exit;
		}
		else
		{
			//if credentials are invalid
			echo "<script>alert('Credentials are invalid!')</script>";
		}
	}
	
  //Generate CSRF token
  function generate_token()
	{
	  return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
	}
?>
