<?php
	$row = 1;
	if (($handle = fopen("energyfactors.csv", "r"))) {
        require_once("connect.php");
    	if ($data = fgetcsv($handle, 1000, ",")) {
        	$num = count($data);
        	echo "<p> $num factors in the study <br /></p>\n";
        	for ($c=0; $c < $num; $c++) {
                $fac = $c+1;
                $sql = "insert into factors_energy values ($fac, '$data[$c]')";  // writing factors to table
        		if(!mysqli_query($conn,$sql))
					echo "could not update data"; 
            	echo $data[$c] . "<br />\n";
        	}
    	}
    	fclose($handle);
    }
?>