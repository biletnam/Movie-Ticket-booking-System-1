<?php
	include_once 'header.php';
?>
<html>
	<head>
			<title>Details</title>
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

					<!-- Optional theme -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

					<!-- Latest compiled and minified JavaScript -->
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
					<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<style >
	input:valid {
	  border: 1px solid black;
	}

	body {
		
				background-image: url("images/details.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				background-size: cover;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
				color: white;
		}
	body>p {
		font-family: monospace;
		font-size: 200%;
		font font-weight: normal;
		justify-content: space-between;
	}
	</style>

	<section class="main-container">
		<div class="main-wrapper">
			<h2 style="font-family:monospace; font-size:350%; font-weight:normal;" ><b>Enter New Details</b></h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<br>
				<?php
					echo '	<input type="text" name="first" placeholder="Firstname" value="'.$_SESSION['u_first'].'">
						<input type="text" name="last" placeholder="Lastname" value="'.$_SESSION['u_last'].'">
						<input type="number" name="age" placeholder="Age" value="'.$_SESSION['age'].'">
						<input type="text" name="email" placeholder="E-mail" value="'.$_SESSION['u_email'].'">
						<input type="text" name="phone" placeholder="Phone-no" value="'.$_SESSION['phone'].'">
						<input type="text" name="uid" placeholder="Username" value="'.$_SESSION['u_uid'].'">
						<input type="password" name="pwd" placeholder="Password">
						<br><br>';
				?>
				<center>
						<button style="display:inline-block" type="reset" value="Reset">Reset  <span class="glyphicon glyphicon-edit"></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button style="display:inline-block"; type="submit" name="submit1">Done <span class="glyphicon glyphicon-ok"></span></button> 
			    </center>

			</form>
		</div>
	</section>
	<body>
		<?php
						if(isset($_SESSION['emptys']))
						{
							echo '<p align=middle><br><br>'.$_SESSION['emptys'].'</p>';
							unset($_SESSION['emptys']);	
						}
						elseif (isset($_SESSION['invalid']))
					    {
							echo '<p align=middle><br><br>'.$_SESSION['invalid'].'</p>';
							unset($_SESSION['invalid']);	
						}
						elseif (isset($_SESSION['usertaken']))
					    {
							echo '<p align=middle><br><br>'.$_SESSION['usertaken'].'</p>';
							unset($_SESSION['usertaken']);	
						}
						elseif (isset($_SESSION['age1']))
					    {
							echo '<p align=middle><br><br>'.$_SESSION['age1'].'</p>';
							unset($_SESSION['age1']);	
						}
						elseif (isset($_SESSION['phone1']))
					    {
							echo '<p align=middle><br><br>'.$_SESSION['phone1'].'</p>';
							unset($_SESSION['phone1']);	
						}
					
	    ?>
	</body>
</html>

<?php
	include_once 'footer.php';
?>