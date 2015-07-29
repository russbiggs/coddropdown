<?php 

include_once('connection.php');


$countryQuery = "
		SELECT
			name,
			pcode
			FROM country
	";
	
$countries = $pdo->query($countryQuery);


	if (isset($_POST['id'])){
		if (isset($_POST['community'])) {
			$enumid = $_POST['id'];
			$commcover = $_POST['community'];
			
			$submitQuery = "INSERT INTO coverage (enumid, commcover) VALUES (?,?)";
			$query = $pdo->prepare($submitQuery);
			
			$query->bindParam(1,$enumid);
			$query->bindParam(2,$commcover);
			$query->execute();
		}
	header('Location:countrylisting.php');
	}


?>





<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>
			<fieldset>
			Country:<select name="country" id="country-select" class = "dropdown">
				<option value="">Select one</option>
				<?php foreach($countries->fetchAll() as $country): ?>
					<option value="<?php echo $country['pcode']; ?>"><?php echo $country['name'];?></option>
				<?php endforeach; ?>		
			</select><br>
			Governorate;<select name="governorate"  id="gov-select" class = "dropdown" disabled>
				<option value="">Select one</option>
				
			</select><br>
			District:<select name="district"  id="dist-select"  class = "dropdown" disabled>
				<option value="">Select one</option>
		
			</select><br>
			Sub-district:<select name="subdistrict"  id="sd-select"  class = "dropdown" disabled>
				<option value="">Select one</option>
				
			</select><br>
			Community:<select name="community"  id="comm-select" class = "dropdown" disabled>
				<option value="">Select one</option>
				
			</select><br>
			</fieldset>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src=dropdown.js"></script>
	</body>
</html>
