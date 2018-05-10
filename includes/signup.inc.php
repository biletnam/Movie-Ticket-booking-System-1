<?php
session_start();

if (isset($_POST['submit'])) {
	
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "password";
	$dbName = "test";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die('Error database signup');

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($age) || empty($phone))
	{
		header("Location: ../signup.php?signup=empty");
	    $_SESSION['emptys'] = "One or more fields were left empty.<br>Please fill all details.";
	    exit();
	} 
	else 
	{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) 
		{
			header("Location: ../signup.php?signup=invalid");
			$_SESSION['invalid'] = "Ivalid entry(s) detected.<br>Please enter valid details.";
			exit();
		}
	    else 
	    {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				header("Location: ../signup.php?signup=email");
				$_SESSION['invalid'] = "Ivalid entry(s) detected.<br>Please enter valid details.";
				exit();
			}
			elseif ($age<15)
		    {
				header("Location: ../signup.php?signup=age");
				$_SESSION['age'] = "Sorry.<br>You should be 15 or above to register.";
				exit();
			}
			elseif (!preg_match('/^[0-9]*$/', $phone) || strlen($phone)!=10)
		    {
				header("Location: ../signup.php?signup=phone");
				$_SESSION['phone'] = "Please enter a valid phone number.";
				exit();
			}
		    else
		    {
				$sql = "SELECT * FROM users WHERE uname='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0)
			    {
					header("Location: ../signup.php?signup=usertaken");
					$_SESSION['usertaken'] = "This username is already in use.<br>Please try with a different username.";
					exit();
				} 
				else 
				{
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (fname,lname,age,email,phone,uname,pwd) VALUES ('$first', '$last','$age', '$email','$phone', '$uid', '$hashedPwd')";
					mysqli_query($conn, $sql) or die ('Insert error');
					header("Location: ../signup.php?signup=success");
					$_SESSION['success'] = "Signup successfull.<br>Login to continue.";
					exit();
				}
			}
		}
	}

} 
elseif (isset($_POST['submit1'])) {
	
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "password";
	$dbName = "test";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || empty($age) || empty($phone))
	{
		header("Location: ../details.php?change=empty");
	    $_SESSION['emptys'] = "One or more fields were left empty.<br>Please fill all details.";
	    exit();
	} 
	else 
	{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) 
		{
			header("Location: ../details.php?change=name");
			$_SESSION['invalid'] = "Ivalid entry(s) detected.<br>Please enter valid details.";
			exit();
		}
	    else 
	    {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				header("Location: ../details.php?change=email");
				$_SESSION['invalid'] = "Ivalid entry(s) detected.<br>Please enter valid details.";
				exit();
			}
			elseif ($age<15)
		    {
				header("Location: ../details.php?change=age");
				$_SESSION['age1'] = "Sorry.<br>You should be 15 or above.";
				exit();
			}
			elseif (!preg_match('/^[0-9]*$/', $phone) || strlen($phone)!=10)
		    {
				header("Location: ../details.php?change=phone");
				$_SESSION['phone1'] = "Please enter a valid phone number.";
				exit();
			}
		   
			elseif($uid!=$_SESSION['u_uid'])
			{
				$sql = "SELECT * FROM users WHERE uname='$uid'";
				mysqli_query($conn, $sql)or die('error usertaken change');
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0)
			    {
					header("Location: ../details.php?change=usertaken");
					$_SESSION['usertaken'] = "This username is already in use.<br>Please try with a different username.";
					exit();
				} 
			}
							
			else 
			{
					//Hashing the password
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
				$sql = "UPDATE `users` SET `fname` = '$first', `lname` = '$last', `age` = '$age', `phone` = '$phone', `email` = '$email', `uname` = '$uid',`pwd` ='$hashedPwd' WHERE `users`.`id` ='".$_SESSION['u_id']."'";
				mysqli_query($conn, $sql) or die ('Change error');
				header("Location: ../index1.php?change=success");
				$_SESSION['success1'] = "Details changed successfully.<br>Please Logout and Login again to continue.";
				exit();
			}
			
		}
	}

} 


else
{
	header("Location: ../users.php");
	exit();
}
