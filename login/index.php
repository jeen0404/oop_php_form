<?php
include('../includes/config.php');

//if not logged in redirect to members page
if($user->is_logged_in()){ header('Location:../index.php'); exit(); }

if(isset($_POST['username'])){

	if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
	if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'A password must be entered';
		}
		else{
			$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: ../');
			exit;
		} else {
			$error[] = 'Wrong username or password or your account has not been activated.';
		}
		}
		
	}else{
		$error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
	}
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Atom -login</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
<!--===============================================================================================-->	
	<link rel='icon' type='image/png' href='images/icons/favicon.ico'/>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/bootstrap/css/bootstrap.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/animate/animate.css'>
<!--===============================================================================================-->	
	<link rel='stylesheet' type='text/css' href='vendor/css-hamburgers/hamburgers.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='vendor/select2/select2.min.css'>
<!--===============================================================================================-->
	<link rel='stylesheet' type='text/css' href='css/util.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
<!--===============================================================================================-->
</head>
<body>
	
	<div class='limiter'>
		<div class='container-login100'>
			<div class='wrap-login100'>
				<div class='login100-pic js-tilt' data-tilt>
					<img src='images/img-01.png' alt='IMG'>
				</div>

				<form class='login100-form validate-form' method="POST">
					<span class='login100-form-title'>
						Atom Login
					</span>
					<?php
						//check for any errors
						echo '<div style="border:1px solid blue; border-radius:5px; passing:15px;margin:10px;">';
						if(isset($error)){
							foreach($error as $error){
								echo '<div>'.$error.'</div>';
							}
						}
						echo "</div>";
						//if action is joined show sucess
						if(isset($_GET['action']) && $_GET['action'] == 'joined'){
							echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
						}
					?>

					<div class='wrap-input100 validate-input' data-validate = 'Valid email is required: ex@abc.xyz'>
						<input class='input100' type='text' name='username' placeholder='username'>
						<span class='focus-input100'></span>
						<span class='symbol-input100'>
							<i class='fa fa-envelope' aria-hidden='true'></i>
						</span>
					</div>

					<div class='wrap-input100 validate-input' data-validate = 'Password is required'>
						<input class='input100' type='password' name='password' placeholder='Password'>
						<span class='focus-input100'></span>
						<span class='symbol-input100'>
							<i class='fa fa-lock' aria-hidden='true'></i>
						</span>
					</div>
					
					<div class='container-login100-form-btn'>
						<button class='login100-form-btn'>
							Login
						</button>
					</div>

					<div class='text-center p-t-12'>
						<span class='txt1'>
							Forgot
						</span>
						<a class='txt2' href='#'>
							Username / Password?
						</a>
					</div>

					<div class='text-center p-t-136'>
						<a class='txt2' href='../signup'>
							Create your Account
							<i class='fa fa-long-arrow-right m-l-5' aria-hidden='true'></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===q============================================================================================-->	
	<script src='vendor/jquery/jquery-3.2.1.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/bootstrap/js/popper.js'></script>
	<script src='vendor/bootstrap/js/bootstrap.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/select2/select2.min.js'></script>
<!--===============================================================================================-->
	<script src='vendor/tilt/tilt.jquery.min.js'></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src='js/main.js'></script>

</body>
</html>
