<?php include 'top.php';?>

	<div class="container my-5">
			<div class="card">
			<div class="card-body">
				<?php  
					$con = mysqli_connect("localhost","root","","testt");
					$sql = "SELECT * FROM form";		
					$qry_run = mysqli_query($con,$sql);
				?>
				<table class="table table-info table-striped">
					<thead class="table-dark">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">First Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">DOB</th>
							<th scope="col">Address</th>
							<th scope="col">Country</th>
							<th scope="col">City</th>
							<th scope="col">Email</th>
							<th scope="col">Contact No</th>
							<th scope="col">Parent Contact</th>
							<th scope="col">Last Degree</th>
							<th scope="col">Total Marks</th>
							<th scope="col">Obtain Marks</th>
						</tr>
				  
					</thead>
					<?php

						if($qry_run){
							foreach($qry_run as $row)
							{
						

					?>
					  	<tbody>
						    <tr>
						      <td><?php echo $row['id']; ?></td>
						      <td><?php echo $row['fname']; ?></td>
						      <td><?php echo $row['lname']; ?></td>
						      <td><?php echo $row['dob']; ?></td>
						      <td><?php echo $row['address1']; ?></td>
						      <td><?php echo $row['country']; ?></td>
						      <td><?php echo $row['city']; ?></td>
						      <td><?php echo $row['email']; ?></td>
						      <td><?php echo $row['contactNo']; ?></td>
						      <td><?php echo $row['parentContacNo']; ?></td>
						      <td><?php echo $row['lastDegree']; ?></td>
						      <td><?php echo $row['totalMarks']; ?></td>
						      <td><?php echo $row['obtainMarks']; ?></td>
						    </tr>
					  	</tbody>
				  	<?php
				  			}
				  		}
				  		else{
				  			echo "No Record Found";
				  		}

				  	?>
				</table>
			</div>
		</div>
	</div>	
	

<?php include 'bottom.php';?>

