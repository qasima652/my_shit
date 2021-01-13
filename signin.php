

<?php 

	
	require_once('./config.php');




if(isset($_POST['submit'])){
    
      
	  $uname = null;
	  $pass = null;

	  if(isset($_POST['uname']) && !empty($_POST['uname'])){
	    $uname=$_POST['uname'];  
	  }
	  else{
	    $uname_error = "Please fill this field";
	  }


	  if(isset($_POST['pass']) && !empty($_POST['pass'])){
	//      $pass=$_POST['pass']; 
	    $pass =  $_POST['pass'];
	  }
	  else{
	    $pass_error = "Please fill this field";
	  }
	  if(!empty($uname) && !empty($pass)){
	    
		$sql = "SELECT * FROM signup where uname = '$uname'";
	    $result = mysqli_query($con,$sql);
	    $data = mysqli_fetch_assoc($result);
	    if (password_verify($pass, $data['pass']))
	    {
	    	
	    	$_SESSION['user'] = $data;

	    	header("location: post.php");
	    	
	    }
	    else{
	    	$pass_error = "Not Match";
	    }


		
	  }
      
      
}

?>












<?php include 'top.php'; ?>

	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card shadow">

					<div class="card-body">
						<h2 class="p-4 text-center">Login</h2>

						<form action="" method="POST" class="needs-validation" novalidate>
						
						
							<div class="form-group ">
							    <label for="uname">User Name</label>
							    <input type="text" class="form-control <?php if(isset($uname_error)) echo 'is-invalid'?>" id="uname" placeholder="Smith123" name="uname" required>
							    <?php if(isset($uname_error)): ?>
							        <div class="invalid-feedback"><?= $uname_error ?></div>
							    <?php endif; ?> 								    
							</div>
							
							<div class="form-group ">
							    <label for="pass">Password</label>
								<input type="password" class="form-control <?php if(isset($pass_error)) echo 'is-invalid'?>" id="pass" placeholder="*******" name="pass" required>
								<?php if(isset($pass_error)): ?>
								    <div class="invalid-feedback"><?= $pass_error ?></div>
								<?php endif; ?>
							</div>
								
							<div class="text-center d-grid mt-4">
								<button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
								
							</div>
							<p class="text-center mt-3"><a href="signup.php">SignUp</a></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	


<?php include 'bottom.php'; ?>