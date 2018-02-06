<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Final Project Summary</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700|Spectral+SC:200" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="../main.css">

</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center m-4">
			<div class="col-6 my-3">
				<h2>Project Summary</h2>
				<p>This site allows users to search players of the popular online game League of Legends by their summoner name. Users can view a summoner's profile picture, level, and if they are logged in, they can also view information about the summoner's ranking in the game.</p>
				<p>To search for a summoner, simply type in their summoner name in the search bar on the main page (index.php). If the summoner exists, the user will see their profile; if the summoner does not exist or if there was an error with the search, the user will see an error message and option to return to search.</p>
				<p>Game-related data is retrieved through Riot Games' <a href="https://developer.riotgames.com/">official API</a>. The database diagram for user info can be seen <a href="https://drive.google.com/file/d/1_tEvK4qpaiiByit1gtwlqqFHPntaDBp9/view?usp=sharing">here</a> (I did not have enough time to implement functionality for following summoners).</p>
				<p>Extras used include different user permission levels (only logged in users can view summoner ranking information) and Riot's API (JSON / server-side).</p>
			</div>
		</div>
	</div>
</body>