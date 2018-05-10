<?php
	include_once 'header.php';
?>

<!DOCTYPE html>
<head>
		<title>Signup</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				 <meta charset="utf-8">
				  <meta name="viewport" content="width=device-width, initial-scale=1">
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

<style>

	h2,a{
		color:white;
	}

	h1
	{
		font-family: monospace;
		font-weight:normal;
		font-size:400%;

	}

	p{
		color:#white;
	}
	ol 
	{
		
		font-size: 250%;
		padding-left: 0.5cm;
		list-style: decimal;
		padding-left:15.75cm;
		color:white;
	}

	li 
	{
 		display: list-item;
 		list-style-position: inside;
 		color:white;

	}
	body{
				background-image: url("images/seats.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				 background-size:100% 110vh;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
			}
		
</style>



<body style="background-color:powderblue; color: white">

	<?php 
		echo '<h1 align=middle ><br><b>Welcome   '. $_SESSION['u_first'].'!</b></h1><br><br>';
	?>
	<p style="background-color: transparent;">
		 	<center>
		 	<div id="myCarousel" class="carousel slide" data-ride="carousel">
				

			
			 	<div class="carousel-inner">
			   		<div class="item active">
			      		<img src="images/gangsp.jpg" alt="Gangs of Wasseypur 2" style="width: 50% height:50%;">
			      		
			   	 	</div>

			    	<div class="item">
			      		<img src="images/neramp.jpg" alt="Neram" style="width: 50%; height: 50%;">
			      		
			    	</div>

			   		 <div class="item">
			      		<img src="images/dunkirkp.jpg" alt="Dunkirk" style="width: 50%; height:50%;">
			      		
			    	</div>
			    	 <div class="item">
			      		<img src="images/newtonp.jpg" alt="Newton" style="width: 50%; height: 50%;">
			      		
			    	</div>
			    	 <div class="item">
			      		<img src="images/jlp.png" alt="Justice League" style="width: 50%; height: 50%;">
			    	</div>
			    </div>


			  
			 	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
			  	</a>
			 	<a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
			  </a>
			</div>
			</center>
			</p>

	<br><br><br>

	<h2 style=" text-align: center; font-family:monospace; font-size: 350%; padding-left:0.5cm;"><br><b>The Movies playing this week are:</b></h2>

 	<br><br><br>

 	<p>
 	<ol>
 		<li> <a style=" font-family: monospace;" href="gangs.php"><b>Gangs Of Wasseypur</b></a> </li>
 		<li> <a style=" font-family: monospace;" href="neram.php"><b>Neram</b></a> </li>
 		<li> <a style=" font-family: monospace;" href="dunkirk.php"><b>Dunkirk</b></a> </li>
 		<li> <a style=" font-family: monospace;" href="newton.php"><b>Newton</b></a> </li>
 		<li> <a style=" font-family: monospace;" href="jl.php"><b>Justice league</b></a> </li><br>
 	</ol>
    </p>
 	




</body>

<?php
	include_once 'footer.php';
?>