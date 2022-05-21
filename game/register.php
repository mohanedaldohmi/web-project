<?php 
ob_start();
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: index.php');
  }
$pageTitle = "Home";
$section = "home";
include('inc/header.php'); 
  ?>
<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" href="css/style3.css">

	

    
	<br>
   <?php   
   if($_SERVER['REQUEST_METHOD']=="POST"){
   if ( isset($_POST['singup']) ) {
// clean user inputs to prevent sql injections
  $name = trim($_POST['username']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);


   $fname = trim($_POST['fullname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your  username.";
  } else if (strlen($name) < 5) {
   $error = true;
   $nameError = "Name must have atleat 5 characters.";
  }

// basic full name validation
  if (empty($fname)) {
   $error = true;
   $fnameError = "Please enter your full name.";
  } else if (strlen($fname) < 5) {
   $error = true;
   $fnameError = "Name must have atleat 5 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $fnameError = "Name must contain alphabets and space.";
  }




  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";

  } 

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 8) {
   $error = true;
   $passError = "Password must have atleast 8 characters.";
  }
  
 



}

// Check If There's No Error Proceed The User Add

      if (empty($formErrors)) {

        // Check If User Exist in Database

        $check = checkItem("USERNAME", "PLAYERS", $name);

        if ($check == 1) {

          $formErrors[] = 'Sorry This User Is Exists';


        // Check If User Exist in Database

        $check = checkItem("email", "PLAYERS", $email);

        if ($check == 1) {

          $formErrors[] = 'Sorry This email Is Exists';

        } 

        } 

        else {

          // Insert Userinfo In Database

          $stmt = $con->prepare("INSERT INTO 
                      PLAYERS(USERNAME, FULL_NAME, EMAIL, PASS ,SATUES  , Date)
                    VALUES(:zuser, :zfull, :zmail, :zpass, 0, now())");
          $stmt->execute(array(

            'zuser' => $name,
            'zfull' =>$fname,
            'zpass' => sha1($pass),
            'zmail' => $email

          ));

          // Echo Success Message
echo"<div class='alert alert-success'>Congrats You Are Now Registerd User</div> "; 
          
          

        }

      }

    }

 


   ?>
				
				
				
       
		<div class="sec">
		<div class="loginBox">
			<img src="image/2.jpg" class="user">
			<h2>Log In Here</h2>
			<form    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    
   
				<p>username</p>
				<input type="text" name="username" placeholder="Enter your  username" value="">

        <span class="text-danger"> <?php if(isset($nameError)) echo $nameError; ?></span>
       

				<p>full name</p>
				<input type="text" name="fullname" placeholder="Enter your full name" value="">
        <span class="text-danger"> <?php if(isset($fnameError)) echo $fnameError; ?></span>
        
				<p>Email</p>
				<input type="text" name="email" placeholder="Enter Email" >
        <span class="text-danger"> <?php if(isset($emailError)) echo $emailError; ?></span>
       
				<p>Password</p>
				<input type="password" name="pass" placeholder="••••••" >
       <span class="text-danger"> <?php if(isset($passError)) echo $passError; ?></span>
       
				
					<div class="selec">
  					<select>
					    <option value="yemen">country:</option>
					    <option value="1">yemen</option>
					    <option value="2">saqr</option>
					    <option value="3">Citroen</option>
					    <option value="4">Ford</option>
					    <option value="5">Honda</option>
					    <option value="6">Jaguar</option>
					    <option value="7">Land Rover</option>
					    <option value="8">Mercedes</option>
					    <option value="9">Mini</option>
					    <option value="10">Nissan</option>
					    <option value="11">Toyota</option>
					    <option value="12">Volvo</option>
  					</select>
  				</div>

				<input type="submit" name="singup" value="Sign Up">
			</form>
      <div class="the-errors text-center">
    <?php 

      if (!empty($formErrors)) {

        foreach ($formErrors as $error) {

          echo '<div class="msg error">' . $error . '</div>';

        }

      }

      if (isset($succesMsg)) {

        echo '<div class="msg success">' . $succesMsg . '</div>';

      }

    ?>


					</div>
					</div>
		
<?php include('inc/footer.php') ?>