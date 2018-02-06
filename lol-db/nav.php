<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Final Project</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700|Spectral+SC:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="../main.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">League of Legends Database</a>
			</div>
			<ul class="nav navbar-nav navbar-right">

				<li><a href="summary.php">Project Summary</a></li>
				
				<?php if ( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ) : ?>

					<li><a href="../login/registration.php">Sign Up</a></li>
					<li><a href="../login/login.php">Login</a></li>

				<?php else : ?>
					
					<li class="text-light">Hello <?php echo $_SESSION['username']; ?>!</li>
					<li><a href="../login/logout.php">Logout</a></li>

				<?php endif; ?>

			</ul>
		</div>
	</nav>
</body>
</html>