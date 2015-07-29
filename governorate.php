<?php 
include_once('connection.php');

if(isset($_GET['governorate'])) {
	$distQuery = "
		SELECT
			district.pcode,
			district.name
		FROM governorate
		LEFT JOIN district
		ON governorate.pcode = district.gov
		WHERE governorate.pcode = :dist_pcode
		ORDER BY district.name
	";	
	$dist = $pdo->prepare($distQuery);
	$dist-> execute(['dist_pcode'=>$_GET['governorate']]);
	
	$selectedGovernorate = $dist->fetchAll(PDO::FETCH_ASSOC);
	echo '<option value="">Select one</option>';
	foreach ($selectedGovernorate as $district) {
	echo "<option value=" . $district['pcode'] . ">" . $district['name'] . "</option>";
	}
}