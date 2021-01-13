

<?php 


require_once('./config.php');

if(isset($_POST['submit'])){
    
      $fname = null;
      $lname = null;
      $uname = null;
      $email = null;
      $pass = null;
      $pass1 = null;

      if(isset($_POST['fname']) && !empty($_POST['fname'])){
        $fname=$_POST['fname'];  
      }
      else{
        $fname_error = "Please fill this field";
      }
      if(isset($_POST['lname']) && !empty($_POST['lname'])){
        $lname=$_POST['lname'];  
      }
      else{
        $lname_error = "Please fill this field";
      }
      if(isset($_POST['uname']) && !empty($_POST['uname'])){
        $uname=$_POST['uname'];  
      }
      else{
        $uname_error = "Please fill this field";
      }

      if(isset($_POST['email']) && !empty($_POST['email'])){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $email=$_POST['email'];
        }
        else{
          $email_error = "Enter Email in correct formate";
        }         
      }
      else{
        $email_error = "Please fill this field";
      }

      if(isset($_POST['pass']) && !empty($_POST['pass'])){
        $pass=$_POST['pass'];  
      }
      else{
        $pass_error = "Please fill this field";
      }
      if(isset($_POST['pass1']) && !empty($_POST['pass1'])){
        $pass1=$_POST['pass1'];  
      }
      else{
        $pass1_error = "Please fill this field";
      }

      $hash = password_hash($pass, PASSWORD_ARGON2I);
      $hash1 = password_hash($pass1, PASSWORD_ARGON2I);



      if(!empty($fname) && !empty($lname) && !empty($uname) && !empty($email) && !empty($hash) && !empty($hash1)){
      	if($pass == $pass1)
      	{
      		$sql = "INSERT INTO signup(fname,lname,uname,email,pass)VALUES('$fname','$lname','$uname','$email','$hash')";

	        if($con->query($sql))
	        {
	          header('location:signup.php');
	        }
	        else{
	          echo "failed";
	        }
      		
      	}
      	else{
      		$pass_error = "Not Match";
      		$pass1_error = "Not Match";
      	}
        
      }
      
      
}

?>












<?php include 'top.php'; ?>

	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card">
					
					<div class="card-body shadow">
						<h2 class="p-4 text-center">SignUp</h2>
						<form action="" method="POST" class="needs-validation" novalidate>
							<div class="row">
								<div class="form-group col-md-6">
							        <label for="fname">First Name</label>
							        <input type="text" class="form-control <?php if(isset($fname_error)) echo 'is-invalid'?>" id="fname" placeholder="John" name="fname" required>
							        <?php if(isset($fname_error)): ?>
							          <div class="invalid-feedback"><?= $fname_error ?></div>
							        <?php endif; ?>  
						      	</div>
						      	<div class="form-group col-md-6">
							        <label for="lname">Last Name</label>
							        <input type="text" class="form-control <?php if(isset($lname_error)) echo 'is-invalid'?>" id="lname" placeholder="Smith" name="lname" required>
							        <?php if(isset($lname_error)): ?>
							          <div class="invalid-feedback"><?= $lname_error ?></div>
							        <?php endif; ?>  
						      	</div>	
							</div>
							<div class="form-group">
							    <label for="uname">User Name</label>
							    <input type="text" class="form-control <?php if(isset($uname_error)) echo 'is-invalid'?>" id="uname" placeholder="Smith123" name="uname" required>
							    <?php if(isset($uname_error)): ?>
							        <div class="invalid-feedback"><?= $uname_error ?></div>
							    <?php endif; ?> 								    
							</div>
							<div class="form-group">
					        <label for="email">Email</label>
						        <input type="email" class="form-control <?php if(isset($email_error)) echo 'is-invalid'?>" id="email" placeholder="johnsmith@gmail.com" name="email" required>
						        <?php if(isset($email_error)): ?>
						          <div class="invalid-feedback"><?= $email_error ?></div>
						        <?php endif; ?>
						    </div>
							
							<div class="form-group">
							    <label for="pass">Password</label>
								<input type="password" class="form-control <?php if(isset($pass_error)) echo 'is-invalid'?>" id="pass" placeholder="*******" name="pass" required>
								<?php if(isset($pass_error)): ?>
								    <div class="invalid-feedback"><?= $pass_error ?></div>
								<?php endif; ?>
							</div>
							<div class="form-group">
							    <label for="pass1">Confirm Password</label>
								<input type="password" class="form-control <?php if(isset($pass1_error)) echo 'is-invalid'?>" id="pass1" placeholder="*******" name="pass1" required>
								<?php if(isset($pass1_error)): ?>
								    <div class="invalid-feedback"><?= $pass1_error ?></div>
								<?php endif; ?>
							</div>

							<div class="form-group d-grid mt-4">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
							
						</form>
					</div>

					
					
				</div>
			</div>
		</div>
	</div>
	


<?php include 'bottom.php'; ?>