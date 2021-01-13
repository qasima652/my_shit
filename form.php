

<?php 
	


	$con = mysqli_connect("localhost","root","","testt");

	if(isset($_POST['submit'])){

		$fname = null;
		$lname = null;
		$fathername = null;
		$dob = null;
		$add1 = null;
		$add2 = null;
		$count = null;
		$state = null;
		$city = null;
		$email = null;
		$no1 = null;
		$no2 = null;
		$last_degree = null;
		$tmarks = null;
		$omarks = null;

		if(isset($_POST['fname']) && !empty($_POST['fname'])){
			$fname = $_POST['fname'];
		}
		else{
			$fname_error = "Please fill this field";
		}
		if(isset($_POST['lname']) && !empty($_POST['lname'])){
			$lname = $_POST['lname'];
		}
		else{
			$lname_error = "Please fill this field";
		}
		if(isset($_POST['fathername']) && !empty($_POST['fathername'])){
			$fathername = $_POST['fathername'];
		}
		else{
			$fathername_error = "Please fill this field";
		}
		if(isset($_POST['dob']) && !empty($_POST['dob'])){
			$dob = $_POST['dob'];
		}
		else{
			$dob_error = "Please fill this field";
		}
		if(isset($_POST['add1']) && !empty($_POST['add1'])){
			$add1 = $_POST['add1'];
		}
		else{
			$add1_error = "Please fill this field";
		}
		if(isset($_POST['add2']) && !empty($_POST['add2'])){
			$add2 = $_POST['add2'];
		}
		else{
			$add2_error = "Please fill this field";
		}
		if(isset($_POST['count']) && !empty($_POST['count'])){
			$count = $_POST['count'];
		}
		else{
			$count_error = "Please fill this field";
		}
		if(isset($_POST['state']) && !empty($_POST['state'])){
			$state = $_POST['state'];
		}
		else{
			$state_error = "Please fill this field";
		}
		if(isset($_POST['city']) && !empty($_POST['city'])){
			$city = $_POST['city'];
		}
		else{
			$city_error = "Please fill this field";
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
	    if(isset($_POST['no1']) && !empty($_POST['no1'])){
			$no1 = $_POST['no1'];
		}
		else{
			$no1_error = "Please fill this field";
		}
		if(isset($_POST['no2']) && !empty($_POST['no2'])){
			$no2 = $_POST['no2'];
		}
		else{
			$no2_error = "Please fill this field";
		}
		if(isset($_POST['last_degree']) && !empty($_POST['last_degree'])){
			$last_degree = $_POST['last_degree'];
		}
		else{
			$last_degree_error = "Please fill this field";
		}
		if(isset($_POST['tmarks']) && !empty($_POST['tmarks'])){
			$tmarks = $_POST['tmarks'];
		}
		else{
			$tmarks_error = "Please fill this field";
		}
		if(isset($_POST['omarks']) && !empty($_POST['omarks'])){
			$omarks = $_POST['omarks'];
		}
		else{
			$omarks_error = "Please fill this field";
		}

		if(!empty($fname) && !empty($lname) && !empty($fathername) && !empty($dob) && !empty($add1) && !empty($add2) && !empty($count) && !empty($state) && !empty($city) && !empty($email) && !empty($no1) && !empty($no2) && !empty($last_degree) && !empty($tmarks) && !empty($omarks)){

			$sql = "INSERT INTO form(fname,lname,fatherName,dob,address1,address2,country,state,city,email,contactNo,parentContacNo,lastDegree,totalMarks,obtainMarks) VALUES ('$fname','$lname','$fathername','$dob','$add1','$add2','$count','$state','$city','$email','$no1','$no2','$last_degree','$tmarks','$omarks')";
			if($con->query($sql)){
				header('location:form.php');			}
			else{
				echo "Failed";
			}
		}
	}
?>







<?php include 'top.php';?>
	<h2 class="text-center">Registration Form</h2>
	<form action="" method="POST" class="needs-validation" novalidate>
	  	<div class="container-fluid">
	    	<div class="row">
		    	<div class="col-md-6 offset-3">
		    		<h5>Personal Details</h5>
		    		<hr>
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
				    
				    	<div class="form-group col-md-6">
						    <label for="fathername">Father Name</label>
						    <input type="text" class="form-control <?php if(isset($fathername_error)) echo 'is-invalid'?>" id="fathername" placeholder="Smith" name="fathername" required>
						    <?php if(isset($fathername_error)): ?>
						       <div class="invalid-feedback"><?= $fathername_error ?></div>
						    <?php endif; ?>  
					    </div>
					    <div class="form-group col-md-6">
						    <label for="dob">Date of Birth</label>
						    <input type="Date" class="form-control <?php if(isset($dob_error)) echo 'is-invalid'?>" id="dob" placeholder="dd/mm/yyyy" name="dob" required>
						    <?php if(isset($dob_error)): ?>
						       <div class="invalid-feedback"><?= $dob_error ?></div>
						    <?php endif; ?>  
					    </div>
				    </div>
				    
				    <h5 class="p-2">Contact Details</h5>
		    		<hr>

		    		<div class="form-group">
				        <label for="add1">Address 1</label>
				        <input type="text" class="form-control <?php if(isset($add1_error)) echo 'is-invalid'?>" id="add1" placeholder="F 210 Buch Villas" name="add1" required>
				        <?php if(isset($add1_error)): ?>
				          <div class="invalid-feedback"><?= $add1_error ?></div>
				        <?php endif; ?>
				    </div>
				    <div class="form-group">
				        <label for="add2">Address 2</label>
				        <input type="text" class="form-control <?php if(isset($add2_error)) echo 'is-invalid'?>" id="add2" placeholder="F 210 Buch Villas" name="add2" required>
				        <?php if(isset($add2_error)): ?>
				          <div class="invalid-feedback"><?= $add2_error ?></div>
				        <?php endif; ?>
				    </div>

				    <div class="row">
				    	<div class="form-group col-md-6">
					        <label for="count">Country</label>
					        <input type="text" class="form-control <?php if(isset($count_error)) echo 'is-invalid'?>" id="count" placeholder="Pakistan" name="count" required>
					        <?php if(isset($count_error)): ?>
					          <div class="invalid-feedback"><?= $count_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="state">State</label>
					        <input type="text" class="form-control <?php if(isset($state_error)) echo 'is-invalid'?>" id="state" placeholder="Punjab" name="state" required>
					        <?php if(isset($state_error)): ?>
					          <div class="invalid-feedback"><?= $state_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="city">City</label>
					        <input type="text" class="form-control <?php if(isset($city_error)) echo 'is-invalid'?>" id="city" placeholder="Multan" name="city" required>
					        <?php if(isset($city_error)): ?>
					          <div class="invalid-feedback"><?= $city_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="email">Email:</label>
					        <input type="email" class="form-control <?php if(isset($email_error)) echo 'is-invalid'?>" id="email" placeholder="johnsmith@gmail.com" name="email" required>
					        <?php if(isset($email_error)): ?>
					          <div class="invalid-feedback"><?= $email_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="no1">Contact #</label>
					        <input type="text" class="form-control <?php if(isset($no1_error)) echo 'is-invalid'?>" id="no1" placeholder="03007904454" name="no1" required>
					        <?php if(isset($no1_error)): ?>
					          <div class="invalid-feedback"><?= $no1_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="no2">Parent Contact #</label>
					        <input type="text" class="form-control <?php if(isset($no2_error)) echo 'is-invalid'?>" id="no2" placeholder="03007904454" name="no2" required>
					        <?php if(isset($no2_error)): ?>
					          <div class="invalid-feedback"><?= $no2_error ?></div>
					        <?php endif; ?>
					    </div>
				    </div>
		      
				    <h5 class="p-2">Educational Details</h5>
		    		<hr>
		    		<div class="form-group">
				        <label for="last_degree">Last Degree</label>
				        <input type="text" class="form-control <?php if(isset($last_degree_error)) echo 'is-invalid'?>" id="last_degree" placeholder="MCS" name="last_degree" required>
				        <?php if(isset($last_degree_error)): ?>
				          <div class="invalid-feedback"><?= $last_degree_error ?></div>
				        <?php endif; ?>
				    </div>
				    <div class="row">
				    	<div class="form-group col-md-6">
					        <label for="tmarks">Total Marks</label>
					        <input type="text" class="form-control <?php if(isset($tmarks_error)) echo 'is-invalid'?>" id="tmarks" placeholder="1500" name="tmarks" required>
					        <?php if(isset($tmarks_error)): ?>
					          <div class="invalid-feedback"><?= $tmarks_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="omarks">Obtain Marks</label>
					        <input type="text" class="form-control <?php if(isset($omarks_error)) echo 'is-invalid'?>" id="omarks" placeholder="1220" name="omarks" required>
					        <?php if(isset($omarks_error)): ?>
					          <div class="invalid-feedback"><?= $omarks_error ?></div>
					        <?php endif; ?>
					    </div>
				    </div>	
				    <div class="p-2"></div>			      
				    <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
		   		</div>
	  		</div>
	  	</div>  
	</form>

<?php include 'top.php';?>
