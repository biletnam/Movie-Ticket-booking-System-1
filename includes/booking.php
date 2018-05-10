<?php

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "password";
	$dbName = "test";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	$show_id = mysqli_real_escape_string($conn,$_POST['show']);
	$seats = mysqli_real_escape_string($conn,$_POST['seats']);
	
	if (empty($seats) || empty($show_id)) 
	{	
		session_start();
		$_SESSION['khali'] = "One or more fields left empty for booking.<br> Please Try Again.";
		header("Location: ../book.php?empty");
		exit();
	}

	else 
	{		
			session_start();
			$_SESSION['show_id']=$show_id;
			$_SESSION['seats']=$seats;
			$sql1= "SELECT seats from shows WHERE show_id='".$_SESSION['show_id']."' ";
			mysqli_query($conn, $sql1) or die('Error seats');
			$result=mysqli_query($conn, $sql1);
			$row = mysqli_fetch_row($result);

			if((int)$row[0]<=0)
			{
				header('Location: ../book.php');
				$_SESSION['seats_out']="Sorry!<br>This Show is Sold out.";
				exit();
			}
			elseif($seats>(int)$row[0])
			{
				header('Location: ../book.php');
				$_SESSION['seats_remain']="Sorry!<br>Only seats ".$row[0]." remaining.";
				exit();
			}
			else
			{
				$_SESSION['succ_book']="Tickets Booked Succesfully!<br>The Ticket Details are:";

				$sql = "INSERT into booking (show_id,no_of_seats,booking_time,user_id) values ('$show_id','$seats',now(),'".$_SESSION['u_id']."')";
				
				mysqli_query($conn, $sql) or die('Error');
				$sql="CALL sub('".$show_id."','".$seats."')";
				mysqli_query($conn, $sql) or die('Error procedure');
				
				
				header('Location: ../book.php');
				exit();
			}
	}		

?>	