<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Counselling Service Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.navbar {
			background-color: steelblue;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#5072A7;">
    <div class="container d-flex justify-content-between">
        <div>
            <a href="index.php" class="navbar-brand">
                <img src="https://th.bing.com/th/id/R.7f49db5c9271969c41b3050939f4d844?rik=FWObzJUqXkfF1g&riu=http%3a%2f%2fprestongeocem.com%2fwp-content%2fuploads%2f2018%2f02%2flogo-uthm-web.png&ehk=sfH1cYPY9YINFXl23vAgAAJKbmRs2yvtIv7KVjOdEug%3d&risl=&pid=ImgRaw&r=0" alt="UTHM Logo" height="30">
            </a>
            <h3 class="navbar-brand text-white">Counselling Service Management System</h3>
        </div>
        <div>
	

	<div class="mr-auto"></div>

	<ul class="navbar-nav">
		<?php
		if (isset($_SESSION['student'])) {
			?>
			<li class="nav-item">
            <a href="index.php" class="nav-link">Login</a>

<!--
				<a href="#" class="nav-link"><?php echo $_SESSION['student']; ?></a>
-->
			</li>
			<li class="nav-item">
				<a href="register.php" class="nav-link">Register</a>
			</li>
			<?php
		} else if (isset($_SESSION['admin'])) {
			?>
			<li class="nav-item">
            <a href="index.php" class="nav-link">Login</a>

<!--
				<a href="index.php" class="nav-link"><?php echo $_SESSION['admin']; ?></a>
-->
			</li>
			<li class="nav-item">
				<a href="register.php" class="nav-link">Register</a>
			</li>
			<?php
		} else {
			?>
			<li class="nav-item">
				<a href="index.php" class="nav-link">Login</a>
			</li>
			<li class="nav-item">
				<a href="register.php" class="nav-link">Register</a>
			</li>
			<?php
		}
		?>
	</ul>
</nav>

</body>
</html>
