<?php 
include_once('connection.php');

if(isset($_GET['subdistrict'])) {
	$commQuery = "
		SELECT
			community.pcode,
			community.name
		FROM subdistrict
		LEFT JOIN community
		ON subdistrict.pcode = community.subdist
		WHERE subdistrict.pcode = :comm_pcode
		ORDER BY community.name
	";	
	$comm = $pdo->prepare($commQuery);
	$comm-> execute(['comm_pcode'=>$_GET['subdistrict']]);
	
	$selectedSubdistrict = $comm->fetchAll(PDO::FETCH_ASSOC);
	echo '<option value="">Select one</option>';
	foreach ($selectedSubdistrict as $community) {
	echo "<option value=" . $community['pcode'] . ">" . $community['name'] . "</option>";
	}
}