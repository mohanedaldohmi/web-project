<?php 
ob_start();
	session_start();
$pageTitle = "Home";
$section = "home";
if (isset($_SESSION['user'])) {
		header('Location: index.php');
	}
include('inc/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" href="css/style2.css">

	

    
	<br>
   <?php 
   	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['login'])) {

			$user = $_POST['username'];
			$pass = $_POST['pass'];
			$hashedPass = sha1($pass);

			// Check If The User Exist In Database

			$stmt = $con->prepare("SELECT 
										USERNAME, PASS 
									FROM 
										players
									WHERE 
										USERNAME = ? 
									AND 
										PASS = ?");

			$stmt->execute(array($user, $hashedPass));

			$get = $stmt->fetch();

			$count = $stmt->rowCount();

			// If Count > 0 This Mean The Database Contain Record About This Username

			if ($count > 0) {

				$_SESSION['user'] = $user; // Register Session Name

				$_SESSION['uid'] = $get['PLAYER_ID']; // Register User ID in Session

				header('Location: index.php'); // Redirect To Dashboard Page

				exit();
			}
				else
	echo"<script>alert(' Error : Username Or passwored')</script>";
		}

}
   ?>
				
				
				
       
		<div class="sec">
		<div class="loginBox">
			<img src="image/2.jpg" class="user">
			<h2>Log In Here</h2>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Email">
				<p>Password</p>
				<input type="password" name="pass" placeholder="••••••">
				<input type="submit" name="login" value="login">
				<a href="#">Forget Password</a>
			</form>


					</div>
					</div>
		
<?php include('inc/footer.php') ?>