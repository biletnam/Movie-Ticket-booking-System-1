<?php
	include_once 'header.php';
	?>


<style>
		table,th,td
		{
			border: 2px solid black;
			font-family: monospace;
			font-size: 150%;
			padding: 0.25cm;
			background-color: black;
		}
		body{
				background-image: url("book.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				background-size: cover;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
				color: white;
			}
</style>


<head>
		<h1 align="middle" style="font-size: 300%;"><br><b>Your booking history</b></u></h1>
</head>

<body  style="background-color: powderblue; font-family: monospace; margin: 0; padding: 0;">
	<h1>      </h1>

<?php
	
	if(isset($_SESSION['nobooking']))
	{
		echo '<p align=middle style="font-family: monospace; font-size:200%;"><br><br>'.$_SESSION['nobooking'].'</p>';
		unset($_SESSION['nobooking']);
		echo '<center><a style="font-size: 250%; font-family: monospace;"  href="user.php"><u><br>Back</u><br><br><br></a></center>';
	}
	
	else
	{	
		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "password";
		$dbName = "test";
		
		$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
				
		$sql= "SELECT m.mov_name,t.t_name,t.location,s.time,b.no_of_seats,b.booking_time from movie m,theater t,shows s,booking b,users u where m.mov_id=s.mov_id and t.t_id=s.t_id and s.show_id=b.show_id  and b.user_id=u.id and u.id='".$_SESSION['u_id']."' ";

		mysqli_query($conn, $sql) or die('Error booking_display');
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck <= 0)
		{
			header("Location:userbooking.php?userbooking=empty");
			$_SESSION['nobooking'] = "Looks like you have not made any bookings so far!";
			exit();
		} 
		
		else
		{			
			while($row=mysqli_fetch_array($result))
			{
				echo '<br><br><br><table style="margin-left: auto; margin-right: auto;">
											
									<tr>
										<td><u> Movie</u></td>
										<td>'.$row['mov_name'].'</td>
									</tr>
									<tr>
										<td><u> Theater</u></td>
										<td>'.$row['t_name'].'</td>
									</tr>
									<tr>
										<td><u> Location </u></td>
											<td>'.$row['location'].'</td>
									</tr>
									<tr>
										<td><u> Date & Time </u></td>
										<td>'.$row['time'].'</td>
									</tr>
									<tr>
										<td><u>Seats </u></td>
										<td>'.$row['no_of_seats'].'</td>
									</tr>
									<tr>
										<td><u>Booking Made </u></td>
										<td>'.$row['booking_time'].'</td>
									</tr>
									</table><br><br><br>';
			}
		}
	}


	
?>





<?php
	include_once 'footer.php';
?>