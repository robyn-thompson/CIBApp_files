<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // concatenate a string of Y and N indicating which criterion are met
    $yrs = $_POST['yrs'];
        $cnt = 0;
    if ($_POST['yrs']=="Y"){ 
		$exp = "Y";
		}
	else $exp = "N";
   	if ($_POST['auth']=="Y") {
		$exp = $exp."Y";
		$cnt++;
		}
	else $exp = $exp."N";
	if ($_POST['event']=="Y"){
    	$exp = $exp."Y";
    	$cnt++;
    	}
	else $exp = $exp."N";
    if ($_POST['corp']=="Y"){
		$exp = $exp."Y";
		$cnt++;
    	}
	else $exp = $exp."N";
    if ($_POST['policy']=="Y"){
       	$exp = $exp."Y";
       	$cnt++;
    	}
	else $exp = $exp."N";
    if ($_POST['comm']=="Y"){
       	$exp = $exp."Y";
       	$cnt++;
    	}
	else $exp = $exp."N";
    if ($_POST['media']=="Y"){
       	$exp = $exp."Y";
       	$cnt++;
    	}
	else $exp = $exp."N";
	// if less than 5 yrs exp OR no other criterion are met then exit
	if (($yrs != "Y") OR ($cnt < 1)){
        header('Location: exitnoexpert.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="mystyle.css">
	<title>Sustainable Energy Scenario Study</title>
	<meta name="viewport" 
		content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta charset="UTF-8">
</head>
<body>
	<?php
    	// write the expert background info to the database table
		require_once("connect.php"); // connect to database
		$sql = "SELECT count(*) AS total FROM experts"; // get number of expert participants thusfar
		$result = mysqli_query($conn,$sql);
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$numrow = $row['total']+1;
			$expertid = 'E'.$numrow;
		}
		$sql = "INSERT INTO experts VALUES ('$expertid','$exp')";
		if(!mysqli_query($conn,$sql))
				echo "could not insert data";
	?>
	<script>
        // JavaScript redirect
        window.location.href = 'getdata.php';
    </script>
</body>
</html>
