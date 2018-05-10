<?php
	include_once 'header.php';
?>

<html>
	<head>
		<title>Signup</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
		<style >
		input:valid {
		  border: 1px solid black;
		}

		body>p {
			font-family: monospace;
			font-size: 250%;
			font font-weight: normal;
			color: white;
			font-style: bold;
			justify-content: space-between;
		}
			body{
				background-image: url("images/sign.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				 background-size:100% 110vh;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
			}
		</style>

		<center><form style="padding-top: 0.25%; padding-right:8%; padding-left:65%;  padding-bottom: 1%;" class="form-group" action="includes/signup.inc.php" method="POST">
		    		<div>
		    			<h3 style="font-family:monospace; font-size:250%; font-weight:normal; padding-top: 0.25%; padding-bottom: 1%; color: white;" ><b>Not a user?</b></h3>
		  	    		<h2 style="font-family:monospace; font-size:350%; font-weight:normal; padding-top: 0.5%; color: white;" ><u><b>Register Now!</b></u></h2><br>
							<input type="text" name="first" class="form-control" placeholder="Firstname"><br>
							<input type="text" name="last"  class="form-control"  placeholder="Lastname"><br>
							<input type="number" name="age"  class="form-control"  placeholder="Age"><br>
							<input type="text" name="email"   class="form-control" placeholder="E-mail"><br>
							<input type="text" name="phone"  class="form-control" placeholder="Phone-no"><br>
							<input type="text" name="uid"  class="form-control" placeholder="Username"><br>
							<input type="password" name="pwd"  class="form-control"  placeholder="Password"><br>
							<br>
							
						
							<button style="display:inline-block; color:black;"  class="btn btn-default btn-lg" type="reset" value="Reset">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
							<button style="display:inline-block;  color:black;" class="btn btn-default btn-lg" type="submit" name="submit">Sign up</button> 
					</div>	

				</form>
		</center>

			

		<body style=" color:white;">
			
			<?php
						if(isset($_SESSION['emptys']))
						{
							echo '<p align=middle>'.$_SESSION['emptys'].'</p>';
							unset($_SESSION['emptys']);	
						}
						elseif (isset($_SESSION['invalid']))
					    {
							echo '<p align=middle>'.$_SESSION['invalid'].'</p>';
							unset($_SESSION['invalid']);	
						}
						elseif (isset($_SESSION['usertaken']))
					    {
							echo '<p align=middle>'.$_SESSION['usertaken'].'</p>';
							unset($_SESSION['usertaken']);	
						}
						elseif (isset($_SESSION['success']))
					    {
							echo '<p align=middle>'.$_SESSION['success'].'</p>';
							unset($_SESSION['success']);	
						}
						elseif (isset($_SESSION['age']))
					    {
							echo '<p align=middle>'.$_SESSION['age'].'</p>';
							unset($_SESSION['age']);	
						}
						elseif (isset($_SESSION['phone']))
					    {
							echo '<p align=middle>'.$_SESSION['phone'].'</p>';
							unset($_SESSION['phone']);	
						}
						session_destroy();
		    ?>

		</body>

<?php
	include_once 'footer.php';
?>