<?php 
include_once('connection.php');

if(isset($_GET['district'])) {
	$sdQuery = "
		SELECT
			subdistrict.pcode,
			subdistrict.name
		FROM district
		LEFT JOIN subdistrict
		ON district.pcode = subdistrict.dist
		WHERE district.pcode = :sd_pcode
		ORDER BY subdistrict.name
	";	
	$sd = $pdo->prepare($sdQuery);
	$sd-> execute(['sd_pcode'=>$_GET['district']]);
	
	$selectedDistrict = $sd->fetchAll(PDO::FETCH_ASSOC);
	echo '<option value="">Select one</option>';
	foreach ($selectedDistrict as $subdistrict) {
	echo "<option value=" . $subdistrict['pcode'] . ">" . $subdistrict['name'] . "</option>";
	}
}