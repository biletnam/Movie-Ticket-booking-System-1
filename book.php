<?php
	include_once 'header.php';
	?>

<style>
	body {
		background-color: powderblue;
	}
table,th,td{
			border: 2px color:transparent;
			font-family: monospace;
			font-size: 150%;
			padding: 0.25cm;
			background-color: black;
		}
		body{
				background-image: url("images/show.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				 background-size:100% 110vh;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
				color: white;
				
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

<body>

	<?php 

		if(isset($_SESSION['khali']))
		{
			echo '<p align=middle style="font-family: monospace; font-size:200%;"><br><br>'.$_SESSION['khali'].'</p>';
			unset($_SESSION['khali']);
			echo '<center><a style="font-size: 250%; font-family: monospace;"  href="nowshowing.php"><u><br>Back</u><br><br><br></a></center>';
		}

		elseif(isset($_SESSION['seats_out']))
		{
			echo '<p align=middle style="font-family: monospace; font-size:200%;"><br><br>'.$_SESSION['seats_out'].'</p>';
			unset($_SESSION['seats_out']);
			echo '<center><a style="font-size: 250%; font-family: monospace;"  href="nowshowing.php"><u><br>Back</u><br><br><br></a></center>';
		}

		elseif(isset($_SESSION['seats_remain']))
		{
			echo '<p align=middle style="font-family: monospace; font-size:200%;"><br><br>'.$_SESSION['seats_remain'].'</p>';
			unset($_SESSION['seats_remain']);
			echo '<center><a style="font-size: 250%; font-family: monospace;"  href="nowshowing.php"><u><br>Back</u><br><br><br></a></center>';
		}

		elseif(isset($_SESSION['succ_book']))
		{
			echo '<p align=middle style="font-family: monospace; font-size:200%;"><br><br>'.$_SESSION['succ_book'].'</p>';

			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "password";
			$dbName = "test";

			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

			$sql="SELECT m.mov_name,t.t_name,t.location,s.time,b.no_of_seats from movie m,theater t,shows s,booking b where m.mov_id=s.mov_id and t.t_id=s.t_id and s.show_id=b.show_id and b.show_id='".$_SESSION['show_id']."'  and b.no_of_seats='".$_SESSION['seats']."' order by booking_id desc limit 1";

			mysqli_query($conn, $sql) or die('Error');
			$result = mysqli_query($conn, $sql);
		

			while($row=mysqli_fetch_array($result))
			{
					echo '<br><br><table style="margin-left: auto; margin-right: auto;">
									
									<tr>
										<td><u><b> Movie</b></u></td>
										<td>'.$row['mov_name'].'</td>
									</tr>
									<tr>
										<td><u><b> Theater</b></u></td>
										<td>'.$row['t_name'].'</td>
									</tr>
									<tr>
										<td><u><b> Location </b></u></td>
										<td>'.$row['location'].'</td>
									</tr>
									<tr>
										<td><u><b> Date & Time </b></u></td>
										<td>'.$row['time'].'</td>
									</tr>
									<tr>
										<td><u><b>Seats</b> </u></td>
										<td>'.$row['no_of_seats'].'</td>
									</tr>
							</table><br><br><br>';
				}

				echo 	'<button onclick="myFunction()">Cancel</button>

						<p id="demo"></p>
							<script>
								function myFunction() 
								{
    								if (confirm("Are You Sure You wish to cancel the booking?") == true) 
    								{
    									window.location.href = "cancel.php";
    								} 	
    								else
    								{
  										window.location.href = "second.php";
  									}
    
								}
							</script>';

				
				unset($_SESSION['succ_book']);
		}	
		else
		{
			header('location: second.php');
		}
		
		
		
	?>
	
</body>
<?php
	include_once 'footer.php';
?>
</html>