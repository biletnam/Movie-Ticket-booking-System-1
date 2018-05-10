<?php
	include_once 'header.php';
	?>

<style>

		body{
				background-image: url("images/cancel.jpg");
				background-repeat: no-repeat;
				background-size:100%;
				color: white;
			}
</style>
<body  style="background-color: powderblue; font-family: monospace; margin: 0; padding: 0;">

	<?php

			$dbServername = "localhost";
			$dbUsername = "root";
			$dbPassword = "password";
			$dbName = "test";
			$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
			
			
			$sql="call adding ('".$_SESSION['show_id']."','".$_SESSION['seats']."')";
			mysqli_query($conn, $sql) or die('Error delete');
			
			$sql1="SELECT booking_id from booking ORDER BY booking_id desc LIMIT 1";
			$result1=mysqli_query($conn,$sql1) or die("error delete 1");
			$row=mysqli_fetch_array($result1);
			

			$sql2="delete from booking where booking_id='".$row['booking_id']."'";
			$result2=mysqli_query($conn,$sql2) or die("error delete 2");
			
			$id=(int)$row['booking_id'];
			
			
			$sql3="ALTER TABLE booking AUTO_INCREMENT=$id";
			mysqli_query($conn, $sql3) or die('Error auto_inc');

			echo '<center><p style="font-family: monospace; font-size:400%;"><br><b>Tickets Cancelled!</b><p></center>';


		
			unset($_SESSION['seats']);
			unset($_SESSION['show_id']);

	?>




</body>

<?php
	include_once 'footer.php';
?>