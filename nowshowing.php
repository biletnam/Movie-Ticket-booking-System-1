<?php
	include_once 'header.php';
?>
<html>
	<head>
		<title>Show</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>


		<style>
		table,th,td
		{
			border: 2px solid black;
			font-family: monospace;
			font-size: 150%;
			padding: 0.25cm;

		}
		body{
				background-image: url("images/show.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				 background-size:100% 110vh;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
			
			}
		button 
		{
			display: block;
			margin: 0 auto;
			width: 10%;
			height: 40px;
			border: none;
			background-color: #222;
			font-family: arial;
			font-size: 16px;
		    color: #fff;
 			cursor: pointer;
		}	
	</style>

	<body style="background-color: powderblue; font-family: monospace; margin: 0; padding: 0;">
		<h1 align="middle" style="font-size: 300%; color:white;"><b>Now Showing</b></h1>
		<h1 align="middle" style="font-size: 250%; color:white;"><br><b><?php echo $_SESSION['mov_name']; ?></b></h1>

		<?php

			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "password";
			$dbName = "test";

			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
			$sql2="SELECT t_name,time,location,show_id,s.seats from theater t,shows s,movie m where m.mov_name='".$_SESSION['mov_name']."' and t.t_id=s.t_id and s.mov_id=m.mov_id;";
			mysqli_query($conn, $sql2) or die('Error');
			$result2 = mysqli_query($conn, $sql2);
			echo '<br><br><table style="margin-left: 20%; margin-right: 20%; background-color:black; color:white;">
					<tr>
						<td align="middle"><u><b>Show ID</b></u></td>
				  		<td align="middle"><u><b>Theater</b></u></td>
				  		<td align="middle"><u><b>Location</b></u></td>
				  		<td align="middle"><u><b>Date & Time</b></u></td>
				  		<td align="middle"><u><b>Remaining Seats</b></u></td>
					</tr>';
			while($row=mysqli_fetch_array($result2))
			{
				echo  '<tr>
							<td align="middle">'.$row['show_id'].'</td>
							<td align="middle">'.$row['t_name'].'</td>
							<td align="middle">'.$row['location'].'</td>
							<td >'.$row['time'].'</td>
							<td align="middle">'.$row['seats'].'</td>

					  </tr>';
			}

			echo '</table><br><br><br>';
		



			$sql3="SELECT show_id from theater t,shows s,movie m where m.mov_name='".$_SESSION['mov_name']."' and t.t_id=s.t_id and s.mov_id=m.mov_id;";
			mysqli_query($conn, $sql3) or die('Error');
			$result3 = mysqli_query($conn, $sql3);
			$option = '';
			while($row = mysqli_fetch_assoc($result3))
			{
			  $option .= '<option value ='.$row['show_id'].'>'.$row['show_id'].'</option>';
			}

		?>
	

			
			<form align="middle" action="includes/booking.php" method="POST">	 
					<div class="form-group">
	   	  			  	<select style=" width:200px;  margin-left: 42%;"  class="form-control" id="show" name="show">
	   	  			  		 <option selected disabled><b>Select Show Id</b></option>
					 		 <?php echo $option; ?>
						</select><br><br>
						<input style=" width:200px; margin-left: 42%;" type="number" name="seats" placeholder="No of Seats" class="form-control"><br><br>
						<button style="border:1px solid black; font-family:monospace; color:black; font-style:bold; font-size:20px;" type="submit" class="btn btn-success" name="submit"> Confirm <span class="glyphicon glyphicon-ok"></span></button>			
					</div>	
			</form>

	</body>
</html>
<?php
	include_once 'footer.php';
?>