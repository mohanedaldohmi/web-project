<?php 
ob_start();
	session_start();

	if(isset($_SESSION)){
		$name=$_SESSION['user'];

			

	}
$pageTitle = "Home";
$section = "home";

include('inc/header.php'); ?>
<?php ob_start(); 
					require_once('connect.php');?>	
<link rel="stylesheet" type="text/css" href="css/style1.css" />
				
			

	<div class="wrapper">

    
	<br>
   
		
				
       
		<div class="section">

			
			<?php
			 $sql="select * from games";
				$q=$con->prepare($sql);
				$q->execute();
				$rows=$q->fetchall();
							echo "<div class='container'>
				<div class='row'>";
					foreach($rows as $row){
							$name=$row['NAME'];
							$img=$row['IMG'];
							$det=$row['DETAILS'];
					
			echo "<div class='col-sm-4'>
					<div class='saqr2'> <h3 >$name</h3></div>
					<img class='img img-responsive'
					src='image/games/$img'/>
					<p>$det</p>
					</div>";

						}
		echo "</div>";
		echo "</div>";
					
			
						?>
		
			#</div>
			</div>
<?php include('inc/footer.php') ?>