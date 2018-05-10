
<?php
	include_once 'header.php';
?>
<html>
	<head>
			<title>Dunkirk</title>
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

					<!-- Optional theme -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

					<!-- Latest compiled and minified JavaScript -->
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<style>
		table,th,td
		{
			border: 2px color:transparent;
			font-family: monospace;
			font-size: 150%;
			padding: 0.25cm;
			background-color: black;

		}
		body{
				background-image: url("images/dunk1.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
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



	<head>
		<h1 align="middle" style="font-size: 500%; color:black;"><b><u>Dunkirk</u></b></h1>
	</head>


	
	<body  style="background-color: powderblue; font-family: monospace; margin: 0; padding: 0;">
		<h1>      </h1>
		<p align=middle>
			<video width="700" height="545" controls >
				<source src="video/dunkirk.mp4" type="video/mp4">
			</video>
			<h1 align="middle" style="font-size: 300%; color:black;"><u><b>Trailer</b></u></h1>
		</p>

		<br><br><br><br>

		<?php
			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "password";
			$dbName = "test";

			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

			$sql="SELECT description,genre,mov_lang,dir_name,stars from movie m,director d,rating r where d.dir_id=m.dir_id and r.mov_id=m.mov_id and mov_name='Dunkirk'; ";
			mysqli_query($conn, $sql) or die('Error');
			$result = mysqli_query($conn, $sql);
			while($row=mysqli_fetch_array($result))
			{
				echo '<table style="margin-left:20%; margin-right:20%;">
							
							<tr>
								<td><u><b>Description</b></u></td>
								<td>'.$row['description'].'</td>
							</tr>
							<tr>
								<td><u><b> Genre</b></u></td>
								<td>'.$row['genre'].'</td>
							</tr>
							<tr>
								<td><u><b> Language </b></u></td>
								<td>'.$row['mov_lang'].'</td>
							</tr>
							<tr>
								<td><u><b> Director</b> </u></td>
								<td>'.$row['dir_name'].'</td>
							</tr>
							<tr>
								<td><u><b>Rating</b> </u></td>
								<td>'.$row['stars'].'</td>
							</tr>
					</table><br><br><br>';
			}
		?>

		<h1 align="middle" style="font-size: 300%; color:white;"><br><b><u>Cast</u></b></h1>

		<?php
			$sql1="SELECT actor_name,role from actor a,movie m,movie_cast mc where a.actor_id=mc.actor_id and mc.mov_id=m.mov_id and m.mov_name='Dunkirk';";
			mysqli_query($conn, $sql) or die('Error');
			$result1 = mysqli_query($conn, $sql1);
			echo '<br><table style="margin-left: auto; margin-right: auto;">
					<tr align="middle">
				  		<td><u><b>Actor</b></u></td>
				  		<td><u><b>Role</b></u></td>
					</tr>';
			while($row=mysqli_fetch_array($result1))
			{
				echo  '<tr>
							<td>'.$row['actor_name'].'</td>
							<td align="middle">'.$row['role'].'</td>
					  </tr>';
			}

			echo '</table><br><br><br>';

			$_SESSION['mov_name']="Dunkirk";

		?>	
		
		<center><a href="nowshowing.php"  class="btn btn-default btn-lg"  style="font-size:15px padding-top:0.25%;  font-family: comic sans ms; color: black" role="button"><b>Book now</b></a></center><br>
		
	</body>

	
<?php
	include_once 'footer.php';
?>
</html>