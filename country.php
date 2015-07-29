<?php 
include_once('connection.php');

if(isset($_GET['country'])) {
	$govQuery = "
		SELECT
			governorate.pcode,
			governorate.name
		FROM country
		LEFT JOIN governorate
		ON country.pcode = governorate.cntry
		WHERE country.pcode = :gov_pcode
		ORDER BY governorate.name
	";
	$gov = $pdo->prepare($govQuery);
	$gov-> execute(['gov_pcode'=>$_GET['country']]);
	
	$selectedCountry = $gov->fetchAll(PDO::FETCH_ASSOC);
	echo '<option value="">Select one</option>';
	foreach ($selectedCountry as $governorate) {
		echo "<option value=" . $governorate['pcode'] . ">" . $governorate['name'] . "</option>";
	}
}