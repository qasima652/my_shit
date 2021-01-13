
 <?php include 'top.php';?>
  
 	<?php


 		$con = mysqli_connect("localhost","root","","testt");

		if(isset($_POST['submit'])){

			$name = null;
			$email = null;
			$msg = null;


			if(isset($_POST['name']) && !empty($_POST['name'])){
				$name=$_POST['name'];
			}else{
				$name_error = 'Please fill the field.';
			}


			if(isset($_POST['email']) && !empty($_POST['email'])){
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					$email=$_POST['email'];
				}else{
					$email_error = 'Please provide valid email.';
				}
			}else{
				$email_error = 'Please fill the field.';
			}


			if(isset($_POST['msg']) && !empty($_POST['msg'])){
				$msg=$_POST['msg'];
			}else{
				$msg_error = 'Please fill the field.';
			}

			
			if(!empty($name) && !empty($email) && !empty($msg)){
				$sql = "INSERT INTO page(name,email,message)VALUES('$name','$email','$msg')";

				if($con->query($sql))
				{
					header('location:page.php');
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
				<h1 class="p-2">New Form</h1>
				<div class="form-group">
				    <label for="name">Name:</label>
				    <input type="text" class="form-control <?php if(isset($name_error)) echo 'is-invalid'; ?>" id="name" placeholder="Enter Name" name="name" required>
				    <?php if(isset($name_error)): ?>
				    	<div class="invalid-feedback"><?= $name_error ?></div>
				    <?php endif; ?>
				</div>
				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control <?php if(isset($email_error)) echo 'is-invalid'; ?>" id="email" placeholder="Enter Email" name="email" required>
				    <?php if(isset($email_error)): ?>
				    	<div class="invalid-feedback"><?= $email_error ?></div>
				    <?php endif; ?>
				</div>
				<div class="form-group">
				    <label for="msg">Message</label>
				    <input type="text" class="form-control <?php if(isset($msg_error)) echo 'is-invalid'; ?>" id="msg" placeholder="Enter Message" name="msg" required>
				    <?php if(isset($msg_error)): ?>
				    	<div class="invalid-feedback"><?= $msg_error ?></div>
				    <?php endif; ?>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>  
	</form>
 <?php include 'bottom.php';?>
  
 <script>
	// Disable form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {





	    // Get the forms we want to add validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });








	  }, false);
	})();
</script>