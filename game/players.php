<?php 
$pageTitle = "Home";
$section = "home";
include('inc/header.php'); 

?>





<br>
<div class="container">
	<div class="row">



		<?php
		
			if(isset($_GET['action'],$_GET['id']) and is_int(intval($_GET['id'])) and intval($_GET['id'])!=0){
			// Var_Dump($_GET);
				switch(strtolower($_GET['action'])){
					case 'active':
						// echo "Active";
						$sql="update students set active=1 where id=?";
						$q=$con->prepare($sql);
						$q->execute(array($_GET['id']));
						echo "Active";
					break;
					case 'unactive':
					echo "UnActive";
					break;
					
					case 'delete':
					echo "Delete";
					break;
					
					case 'edit':
					echo "Edit";
					break;
					
					default:echo "Error";
					break;
				}
				
			}
		
		?>
		
            
			
			<?php
				
				// $sql="select * from students order by id desc limit 10";
				$sql="select * from players";
				$q=$con->prepare($sql);
				$q->execute();
				$rows=$q->fetchall();
				if($q->rowcount()>0){

					foreach($rows as $row){
							$id=$row['PLAYER_ID'];
							$name=$row[1];
							$pass=$row['PASS'];
							$full=$row['FULL_NAME'];
							$email=$row['EMAIL'];
				echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail item-box">';
						echo '<span class="price-tag">$' . $id . '</span>';
						echo '<img class="img-responsive" src="img.png" alt="" />';
						echo '<div class="caption">';
							echo '<h3><a href="items.php?itemid='. $name .'">' . $name .'</a></h3>';
							echo '<p>' . $pass . '</p>';
							echo '<div class="date">' . $full. '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		
	
					
					/*echo "<table border=1 width=30%>";
						echo "<tr>";
							echo "<th>ID</th>";
							echo "<th>NAME</th>";
							echo "<th>pass</th>";
							echo "<th>fullname</th>";
							echo "<th>EMAIL</th>";
							echo "<th colspan=3>Actions</th>";
						echo "</tr>";
						
						foreach($rows as $row){
							$id=$row['PLAYER_ID'];
							$name=$row[1];
							$pass=$row['PASS'];
							$full=$row['FULL_NAME'];
							$email=$row['EMAIL'];
							echo "<tr>";
							echo "<td>$id</td>";
							echo "<td>$name</td>";
							echo "<td>$pass</td>";
							echo "<td>$full</td>";
							echo "<td>$email</td>";
							echo "<td>
								<a href='?action=edit&id=$id'><i class='fa fa-edit'></i></a>
								</td>";
							echo "<td>
								<a href='?action=delete&id=$id'><i class='fa fa-trash'></i></a>
								</td>";
								if($row[4]==0)
							echo "<td>
								<a href='?action=active&id=$id'><i class='fa fa-check'></i></a>
								</td>";
								else
								echo "<td>
								<a href='?action=unactive&id=$id'><i class='fa fa-close'></i></a>
								</td>";
							echo "</tr>";
						}
					
					echo "</table>";*/
				}
				else
					echo "Empty";
					
			?>
      
	
	</div>
</div>

<?php include('inc/footer.php') ?>