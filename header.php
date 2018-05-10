<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Movie Database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <?php
      if (isset($_SESSION['u_id'])) 
      {
        echo ' <a class="navbar-brand" href="second.php">Home</a>';
      }
      ?>
     
    </div>
         <?php
      if (isset($_SESSION['u_id'])) 
      {
        echo '  <ul class="nav navbar-nav navbar-right">
                <li><a href="user.php"><span class="glyphicon glyphicon-user"></span>&nbspProfile</a></li>
                <li><a href="includes/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span>&nbspLogout</a></li>
                </ul>';
      }
      else 
      {
        echo '<ul class="nav navbar-nav navbar-right">
        	  <li><a style="font-size:120%;" href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        	  </ul>

              <form action="includes/login.inc.php" class="navbar-form navbar-right" method="POST">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" name="uid" placeholder="Username/e-mail">                                        
                </div>

                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" name="pwd" class="form-control" placeholder="Password">                                     
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Login</button>
              </form>';
      }
      ?>
  </div>
</nav>
</header>
</body>