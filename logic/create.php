<?php 
	require '../logic/connection/info.php';
	// pak met de post alles uit titel (input name="titel" in createpage.php, en zet het in $text)
	$text = $_POST ['titel'];
	// als de connectie niet gemaakt kan worden om welke reden dan ook, geef een error
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
// voeg in tabel activiteiten >(tabel) titel de value $text toe waarin dus alle getypte info staat uit de input
	$sql = "INSERT INTO lijsten (titel) VALUES ('$text')";
	// als de sql is uitgevoerd en de connectie goed was, ga terug naar createpage.php
	if (mysqli_query($conn, $sql)) {
	    header('Location: createpage.php');
	} else {
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>ToDo</title>
	</head>
<body>
<?php 
	echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
?>
</body>
</html>
<?php
	}
?>