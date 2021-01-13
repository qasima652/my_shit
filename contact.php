 
<?php 
	require_once('config.php');


		if(isset($_POST['submit'])){

			$msg = null;

			if(isset($_POST['name']) && !empty($_POST['name'])){
		        $name=$_POST['name'];  
		    }
		    else{
		        $name_error = "Please fill this field";
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

			if(isset($_POST['msg']) && !empty($_POST['msg'])){
				$msg=$_POST['msg'];
			}else{
				$msg_error = 'Please fill the field.';
			}
			
			if(!empty($name) && !empty($email) && !empty($msg)){

				$sql = "INSERT INTO contact(name,email,msg)VALUES('$name','$email','$msg')";
				$qry_run = mysqli_query($con,$sql);	
				if($qry_run){

					header('location:contact.php');
					$success = '<div class="alert alert-success">DONE</div>';
				}
				else{
					echo "failed";
				}
			}

						
		}


?>



 
 <html>
<head>
<link href="form_style.css" type="text/css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
	function save_detail()
	{
	 var name=$("#sender_name").val();
	 var email=$("#sender_email").val();
	 var reason=$("#reason").val();
	 var message=$("#message").val();
	 if(name!="" && email!="" && reason!="" && message!="")
	 {
	  $.ajax
	  ({
	   type:'post',
	   url:'contact.php',
	   data:{
	    submit_contact:"submit_contact",
	    name:name,
	    email:email,
	    reason:reason,
	    message:message
	   },
	   success:function(response) {
	    if(response=="submitted")
	    {
	     document.getElementById("contact_form").innerHTML="Thanks For Contacting Us We Will Contact You Soon";
	    }
	   }
	  });
	 }
	 else
	 {
	  alert("Please Fill All The Details");
	 }
	 
	 return false;
	}
</script>
</head>
<body>
<div id="wrapper">

<div id="contact_form">
<h1>Contact Form</h1>
<?php if(isset($success)) 
	{
		$success;
	}
 ?>
<form method="post" action="contact.php" onsubmit="return save_detail();">
	<table align=center>
	 <tr>
	  <td>Enter Your Name : </td><td><input type="text" id="sender_name" name="sender_name"></td>
	 </tr>
	 <tr>
	  <td>Enter Your Email : </td><td><input type="text" id="sender_email" name="sender_email"></td>
	 </tr>
	 <tr>
	  <td>Contact Reason : </td><td><input type="text" id="reason" name="reason"></td>
	 </tr>
	 <tr>
	  <td>Message : </td><td><textarea id="message" name="message"></textarea></td>
	 </tr>
	</table>
	
	<p><input type="submit" name="send_mail" value="SUBMIT FORM"></p>
</form>
</div>

</div>
</body>
</html>