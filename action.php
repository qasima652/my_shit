
<?php  

$con = mysqli_connect("localhost","root","","testt");

if(isset($_POST['submit'])){
		
		
			
			$name=$_POST['name'];
			$email = $_POST['email'];
			$msg = $_POST['msg'];
			
			$sql = "INSERT INTO page(name,email,message)VALUES('$name','$email','$msg')";

			if($con->query($sql))
			{
				header('location:page1.php');
			}
			else{
				echo "failed";
			}
			
}

?>