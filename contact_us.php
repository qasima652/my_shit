<?php

		include 'config.php';

		if(!empty($_POST)) {
			$name=$_POST['name'];
			$email=$_POST['email'];
			$msg=$_POST['msg'];
			$sql = "INSERT INTO `contact`( `name`, `email`, `msg`) VALUES ('$name','$email','$msg')";
			$query = mysqli_query($con, $sql);
			if ($query) {
				$result = 'SUCCESS';
			} 
			else {
				$result = 'ERROR';
			}
		}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Contact US</title>
</head>
<body>
	<form method="POST" action="" id="contactform">
		<?php if(isset($result)): ?>
				<div class="alert alert-info">	
						<?= $result ?>
				</div>	
		<?php endif; ?>
		  <div class="card col-md-6 offset-3 my-5">		
		  		<div class="card-body">	
		  				<div class="form-group">	
		  					<label for="name">Name</label>
		  					<input type="text" name="name" id="name" class="form-control">
		  				</div>	
		  				<div class="form-group">
						    <label for="email">Email address</label>
						    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						  </div>
						  <div class="form-group">
						    <label for="msg">Message</label>
						    <input name="msg" type="text" class="form-control" id="msg">
						  </div>
						  <button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>

						  <div class="result"></div>
		  		</div>			
		  </div>	
	</form>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>	

		$(document).ready(function() {
			$("#submit").click(function(e) {
			    e.preventDefault();
			    var formData = {
		            'name'              : $('input[name=name]').val(),
		            'email'             : $('input[name=email]').val(),
		            'msg'    			: $('input[name=msg]').val()
		        };

			    $.ajax({
				  type: 'POST',
				  url: 'contact_us.php',
				  data: formData,
		          success: function (data) {
		          	console.log('SUCCESS');
		             $('#contactform')[0].reset(); //empty form
		          }
			});
		});

	});

	</script>	
</body>
</html>