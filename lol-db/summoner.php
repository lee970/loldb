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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../main.css">

</head>
<body>
<?php
	include 'nav.php';

	$summoner_name = $_GET['summonerName'];
	$summoner_endpoint = 'https://na1.api.riotgames.com/lol/summoner/v3/summoners/by-name/';

	$url = $summoner_endpoint . $summoner_name . '?api_key=' . API_KEY;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	$response = json_decode($response, true);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// summoner doesn't exist
	if ($httpcode == 404) : ?>
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center m-4">
				<div class="col-6 my-3">
					<h1>Sorry, this summoner doesn't exist!</h1>
					<a href="index.php" class="btn btn-light m-3">Return to Search</a>
				</div>
			</div>
		</div>

	<?php elseif ($httpcode != 200) : ?>
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center m-4">
				<div class="col-6 my-3">
					<h1>Sorry, there was an error with your request.</h1>
				</div>
			</div>
		</div>
<?php
	// summoner found
	else :
		// var_dump($response);
		$name = $response['name'];
		$profileIconId = $response['profileIconId'];
		$summonerLevel = $response['summonerLevel'];

		$api_img = 'http://ddragon.leagueoflegends.com/cdn/7.24.1/img/profileicon/';
		$img_src = $api_img . $profileIconId . '.png';
?>
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center m-4">
			<div class="col-4">
				<img src="<?php echo $img_src ?>" alt="<?php echo $name ?>" class="summoner-icon img-fluid img-thumbnail rounded-circle m-4">
				<h2 class="font-weight-bold"><?php echo $name ?></h2>
				<h4 class="m-3">Level <?php echo $summonerLevel ?></h4>
				<hr>

				<div class="row">
					<div class="col">

					<?php if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ) : ?>

						<?php

						$api_league = 'https://na1.api.riotgames.com/lol/league/v3/positions/by-summoner/';
						$summoner_id = $response['id'];

						$league = $api_league . $summoner_id . '?api_key=' . API_KEY;
						// var_dump($league);

						$ch1 = curl_init();
						curl_setopt($ch1, CURLOPT_URL, $league);
						curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
						$rank_response = curl_exec($ch1);
						$rank_response = json_decode($rank_response, true);
						$httpcode = curl_getinfo($ch1, CURLINFO_HTTP_CODE);

						if ($httpcode != 200) : ?>

							<h2>Unable to retrieve info. Please try again later.</h2>

						<?php else : ?>

							<?php
								if (empty($rank_response)) {
									$tier = "UNRANKED";
									$rank = "";
								}
								else {
									$tier = $rank_response[0]['tier'];
									$rank = $rank_response[0]['rank'];
								}
							?>

							<img src="../img/<?php echo $tier; ?>.png" alt="<?php echo $tier; ?> Rank Badge">
							<h2><?php echo $tier . " " . $rank; ?></h2>

						<?php endif; ?>

					<?php else : ?>

						<form action="../login/login.php" method="GET">
							<button type="submit" class="btn btn-info m-3">Login to see more!</button>
							<input type="hidden" name="location" value="<?php echo $name ?>">
						</form>

						<?php //echo urlencode($_SERVER['REQUEST_URI']) ?>

						<!-- <a href="../login/login.php" class="btn btn-info m-3">Login to see more!</a>
						<input type="hidden" name="location"> -->

					<?php endif; ?>
						
						<a href="index.php" class="btn btn-secondary m-3">Return to Search</a>

					</div>
				</div>
			</div> <!-- col -->
		</div> <!-- row -->
	</div>
<?php endif; ?>

</body>
</html>