<?php
	require '../config/config.php';
	
	// get IDs of weekly free champions
	$free_champions_endpoint = 'https://na1.api.riotgames.com/lol/platform/v3/champions?freeToPlay=true&api_key=';

	$url = $free_champions_endpoint . API_KEY;

	$result = file_get_contents($url);
	$result_json = json_decode($result)->champions;

	// store array of free champions' ID
	$freeChampionIds = array();
	for ($i = 0; $i < sizeof($result_json); $i++) {
		array_push($freeChampionIds, $result_json[$i]->id);
	}

	// get info for each free champion
	$champion_endpoint = 'https://na1.api.riotgames.com/lol/static-data/v3/champions/';
	$params = '?locale=en_US&tags=image&api_key=';

	// var_dump($freeChampionIds);

	for ($i = 0; $i < sizeof($freeChampionIds); $i++) :
		$url = $champion_endpoint . $freeChampionIds[$i] . $params . API_KEY;
		$result = file_get_contents($url);
		$result_json = json_decode($result);
		

		// echo $result_json->name . ": " . $result_json->title;
		// echo "<hr>";
?>

<div class="col">
	<img src="http://via.placeholder.com/100x100" alt="<?php $result_json->name ?>">
	<h3><?php echo $result_json->name ?></h3>
	<p><?php echo $result_json->title ?></p>
</div>

<?php endfor;

	// dummy champ
	// $name = 'Blah';
	// $title = 'The Blah Blah';

	

?>