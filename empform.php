<?php 
	


	$con = mysqli_connect("localhost","root","","testt");

	if(isset($_POST['submit'])){

		$emp_id = null;
		$fname = null;
		$lname = null;
		$dob = null;
		$add1 = null;
		$add2 = null;
		$count = null;
		$state = null;
		$city = null;
		$email = null;
		$no1 = null;
		$no2 = null;
		$last_job = null;
		$sd = null;
		$ed = null;
		$exp = null;


		if(isset($_POST['emp_id']) && !empty($_POST['emp_id'])){
			$fname = $_POST['emp_id'];
		}
		else{
			$emp_id_error = "Please fill this field";
		}
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
		if(isset($_POST['last_job']) && !empty($_POST['last_job'])){
			$last_job = $_POST['last_job'];
		}
		else{
			$last_job_error = "Please fill this field";
		}
		if(isset($_POST['sd']) && !empty($_POST['sd'])){
			$sd = $_POST['sd'];
		}
		else{
			$sd_error = "Please fill this field";
		}
		if(isset($_POST['ed']) && !empty($_POST['ed'])){
			$ed = $_POST['ed'];
		}
		else{
			$ed_error = "Please fill this field";
		}
		if(isset($_POST['exp']) && !empty($_POST['exp'])){
			$exp = $_POST['exp'];
		}
		else{
			$exp_error = "Please fill this field";
		}

		if(!empty($emp_id) &&!empty($fname) && !empty($lname) && !empty($dob) && !empty($add1) && !empty($add2) && !empty($count) && !empty($state) && !empty($city) && !empty($email) && !empty($no1) && !empty($no2) && !empty($last_job) && !empty($sd) && !empty($ed) && !empty($exp)){

			echo $sql = "INSERT INTO empform(emp_id,fname,lname,dob,address1,address2,country,state,city,email,contactNo,landlineNo,lastjob,startDate,endDate,experience) VALUES ('$emp_id','$fname','$lname','$dob','$add1','$add2','$count','$state','$city','$email','$no1','$no2','$last_job','$sd','$ed','$exp')";
			if($con->query($sql)){
				//header('location:empform.php');
				echo "seuucsss";	
			}
			else{
				echo "Failed";
			}
		}
	}
?>




<?php include 'top.php';?>
	<h2 class="text-center">Employee Form</h2>
	<form action="" method="POST" class="needs-validation" novalidate>
	  	<div class="container-fluid">
	    	<div class="row">
		    	<div class="col-md-6 offset-3">
		    		<h5>Personal Details</h5>
		    		<hr>
		    		<div class="form-group">
				        <label for="emp_id">Employee ID</label>
				        <input type="text" class="form-control <?php if(isset($emp_id_error)) echo 'is-invalid'?>" id="emp_id" value="<?php echo(mt_rand(10000,99999)); ?>" name="emp_id" required readonly>
				        <?php if(isset($emp_id_error)): ?>
				          <div class="invalid-feedback"><?= $emp_id_error ?></div>
				        <?php endif; ?>
				    </div>
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
						<label for="dob">Date of Birth</label>
						<input type="Date" class="form-control <?php if(isset($dob_error)) echo 'is-invalid'?>" id="dob" placeholder="dd/mm/yyyy" name="dob" required>
						<?php if(isset($dob_error)): ?>
						    <div class="invalid-feedback"><?= $dob_error ?></div>
						<?php endif; ?>  
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
					        <label for="no2">Landline No</label>
					        <input type="text" class="form-control <?php if(isset($no2_error)) echo 'is-invalid'?>" id="no2" placeholder="03007904454" name="no2" required>
					        <?php if(isset($no2_error)): ?>
					          <div class="invalid-feedback"><?= $no2_error ?></div>
					        <?php endif; ?>
					    </div>
				    </div>
		      
				    <h5 class="p-2">JOB Details</h5>
		    		<hr>
		    		<div class="form-group">
				        <label for="last_job">Last Job</label>
				        <input type="text" class="form-control <?php if(isset($last_job_error)) echo 'is-invalid'?>" id="last_job" placeholder="developer" name="last_job" required>
				        <?php if(isset($last_job_error)): ?>
				          <div class="invalid-feedback"><?= $last_job_error ?></div>
				        <?php endif; ?>
				    </div>
				    <div class="row">
				    	<div class="form-group col-md-6">
					        <label for="sd">Starting Date</label>
					        <input type="date" class="form-control <?php if(isset($sd_error)) echo 'is-invalid'?>" id="sd" name="sd" required>
					        <?php if(isset($sd_error)): ?>
					          <div class="invalid-feedback"><?= $sd_error ?></div>
					        <?php endif; ?>
					    </div>
					    <div class="form-group col-md-6">
					        <label for="ed">Ending Date</label>
					        <input type="date" class="form-control <?php if(isset($ed_error)) echo 'is-invalid'?>" id="ed" name="ed" required>
					        <?php if(isset($ed_error)): ?>
					          <div class="invalid-feedback"><?= $ed_error ?></div>
					        <?php endif; ?>
					    </div>
				    </div>
				    <div class="form-group">
				        <label for="exp">Experience</label>
				        <input type="text" class="form-control <?php if(isset($exp_error)) echo 'is-invalid'?>" id="exp" placeholder="2 Years" name="exp" required>
				        <?php if(isset($exp_error)): ?>
				          <div class="invalid-feedback"><?= $exp_error ?></div>
				        <?php endif; ?>
				    </div>	
				    <div class="p-2"></div>			      
				    <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
		   		</div>
	  		</div>
	  	</div>  
	</form>

<?php include 'top.php';?>
