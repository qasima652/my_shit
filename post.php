
<?php

 

 include 'top.php';
 require_once('./config.php');


	

		if(isset($_POST['submit'])){

			$msg = null;


			if(isset($_POST['msg']) && !empty($_POST['msg'])){
				$msg=$_POST['msg'];
			}else{
				$msg_error = 'Please fill the field.';
			}

			$userID = $_SESSION['user']['id'];
			
			if(!empty($msg) && !empty($userID)){

				$sql = "INSERT INTO post_tbl(msg, userID)VALUES('$msg','$userID')";
				echo "$sql";
				$qry_run = mysqli_query($con,$sql);	
				if($qry_run){

					header('location:post.php');
				}
				else{
					echo "failed";
				}
			}

						
		}

 	?>


	<form action="" method="POST" class="needs-validation" novalidate>
		<div class="row">
			<div class="col-md-6 offset-3">
				<h1 class="p-2">Post</h1>
				<h5><a href="logout.php">Logout</a></h5>
				<p>Welcome! <?= $_SESSION['user']['uname'] ?></p>
				<div class="form-group">
				    <label for="msg">Message</label>
				    <textarea type="text" name="msg" class="form-control <?php if(isset($msg_error)) echo 'is-invalid'; ?>" id="msg" requir></textarea>
				    <?php if(isset($msg_error)): ?>
				    	<div class="invalid-feedback"><?= $msg_error ?></div>
				    <?php endif; ?>
				</div>
				<div class="p-2"></div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>  
	</form>
	
	<div class="col-md-6 offset-3">
		<?php
			$sql = "SELECT post_tbl.*, signup.uname FROM post_tbl 
			INNER JOIN signup ON post_tbl.userID = signup.id
			ORDER BY post_tbl.id DESC" ;
			$user1 = $_SESSION['user']['uname'];	
			$qry_run = mysqli_query($con,$sql);	
			if($qry_run){
				foreach($qry_run as $row)
				{
		?>
		<div class="card border-primary mb-3 mt-5">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h5 align="left"><?= $row['uname'] ?></h5>
					</div>
					<div class="col-md-6">
						
						<?php if($row['uname'] == $user1){?>
							<div class="float-end">
									<div class="btn-group">
										<a class="text-success"  ><i class="fas fa-edit"></i></a>
										<a class="text-danger ms-2"  ><i class="fas fa-trash"></i></a>
									</div>
							</div>
						<?php }?>
					</div>
					

				</div>
				
				

			</div>
			<div class="card-body ">
				<h5><?php echo $row['msg']; ?></h5>
			</div>
			
		</div>
		<?php
			}
			}
			else{
				echo "No Record Found";
			}

		?>
	</div>
	

<?php include 'bottom.php';?>