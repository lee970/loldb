<?php
	session_start();
	require '../config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Final Project</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700|Spectral+SC:200" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">

</head>
<!-- <body onload="loadChampions()"> -->
<body class="bg">
	<?php include 'nav.php'; ?>

	<div class="container-fluid text-white">

		<div class="row justify-content-center align-items-center">
			<div class="col-4 form-container mt-5">
				<h1 class="font-weight-bold">Welcome!</h1>
				<form action="summoner.php" method="GET" id="search-form">
					<div class="form-group bg-dark mx-3 my-4">
						<div class="input-group">
							<input type="text"
									class="form-control border border-white p-3"
									placeholder="Search for a summoner"
									aria-label="Search for a summoner"
									name="summonerName"
									required>
							<span class="input-group-btn">
								<button class="btn btn-dark text-light font-weight-bold px-3" type="submit">Go!</button>
							</span>
						</div>
					</div>
				</form>
				<h5>First time user?</h5>
			</div> <!-- col -->
		</div> <!-- row -->


		<div class="row justify-content-center align-items-center">
			<div id="champions-container" class="col-4">
				<!-- <h1 class="my-4">Weekly Free Champions</h1> -->
				<div id="result-container" class="row">
					
					<!-- server-side API call to load weekly free champions -->
					<!-- <?php //include '../lol-api/freeChampions.php'; ?> -->

				</div>

			</div>
		</div>
	</div>

	<script>
		// function loadChampions() {
		// 	var xhr = new XMLHttpRequest();
		// 	xhr.onreadystatechange = function() {
		// 		if
		// 		if (this.readyState == 4 && this.status == 200) {
		// 			//
		// 		}
		// 		xhr.open('GET', '../lol-api/freeChampions.php', true);
		// 		xhr.send();
		// 	}
		// }
		// function loadChampions() {
		// 	var xhr = new XMLHttpRequest();

		// 	xhr.getJSON("staticFreeChampions.json", function(json) {
		// 		console.log(json);
		// 	});
		// }
	</script>
</body>
</html>