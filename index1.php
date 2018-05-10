<?php
	include_once 'header.php';
?>

<style >
	p    {font-family: monospace; font-size: 300%; color:  yellow;}
	body{
				background-image: url("images/cinema.jpg");
				-moz-background-size: cover;
				-webkit-background-size: cover;
				 background-size:100% 115vh;
				background-position: top center !important;
				background-repeat: no-repeat !important;
				background-attachment: fixed;
				
			}
</style>

<section class="main-container" >
	<div class="main-wrapper">
		
		<?php
			if(isset($_SESSION['success1'])) 
			{
				echo '<p align=middle><br><br><br>'.$_SESSION['success1'].'</p>';
				unset($_SESSION['success1']);
			}
			else
			{
				if (isset($_SESSION['u_id'])) {
					echo "<p align=center><br><b>You are still Logged in. <BR> Log out to Continue.</b></p> ";
				}

				if(isset($_SESSION['errors'])) 
				{
					echo '<p align=middle> Invalid username or password.<br> Please try again.</b></p>';
					unset($_SESSION['errors']);
				}
			}
				
		?>
	</div>
</section>
<body></body>
<?php
	include_once 'footer.php';
?>