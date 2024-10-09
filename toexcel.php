<?PHP
  $filename = "CIB_matrix_energy" . date('Ymd') . ".csv";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");
  require_once("connect.php");
  $out = fopen("php://output", 'w');
  // find number of factors to create headings
  $sql= "SELECT count(*) from factors_energy";  
			$dbRecord = mysqli_query ($conn,$sql);
			$arrRecord = mysqli_fetch_row($dbRecord);
			$numfactors = $arrRecord[0];
  
  // create header lines 
  $factors = " , ,";
  $states = " , ,";
  for ($x = 1; $x<= $numfactors; $x++){ 
  	$factors = $factors."F".$x.","." ".",";
  	$states = $states."H".","."L".",";
  }
  $heading = array(
	"Cross Impact Balance Matrix",
	" ",
	$factors,
	$states);
  // write header lines	
  foreach ($heading as $line)
  	{
  	fputcsv($out,explode(',',$line));
  	}
  // set up array structure
  $highmatrix = array();   // initialize matrix array - this will store all arrays, 1 per factor
  $lowmatrix = array();
  $finalHmatrix = array();
  $finalLmatrix = array();
  for ($i =0; $i<$numfactors; $i++){
	$newHArray = array();   // create an array for the row
	$newLArray = array();
	$finalHrow = array();
	$finalLrow = array();
	for($j=0; $j<$numfactors; $j++){
		$finalHrow[] =-1; // initialize final matrix row values
		$finalHrow[] =-1;
		$finalLrow[] = -1;
		$finalLrow[] = -1;
		$intHArray =array(0,0,0,0,0);  // create an array for the 5 entry values
		$intLArray =array(0,0,0,0,0);
		$newHArray[] = $intHArray; // add the 0's array to the row array
		$newLArray[] = $intLArray;
	}
	$highmatrix[] = $newHArray; // add the row array to the matrix array
	$lowmatrix[] = $newLArray;
	$finalHmatrix[] = $finalHrow;
	$finalLmatrix[] = $finalLrow;
  }

  //get data from database and accummulate counts of each state
  $dbRecords = mysqli_query($conn,"SELECT * FROM relationships") or die('Query failed!');
  while($row = mysqli_fetch_row($dbRecords)){
  	$higharr = explode(',',$row[0]);
  	$lowarr = explode(',',$row[1]);
  	$facnum = 0;
  	for ($i=0; $i<$numfactors; $i++){
		for($j=0; $j<$numfactors; $j++){
		 	$highentry = $higharr[$facnum];
			$highmatrix[$i][$j][$highentry+2] ++;
			$lowentry = $lowarr[$facnum];
			$lowmatrix[$i][$j][$lowentry+2] ++;
			$facnum++;
		}	
	}
  }

  //find the median
  for ($i=0; $i<$numfactors; $i++){
	for($j=0; $j<$numfactors; $j++){
		$count = array_sum($highmatrix[$i][$j]); // number of entries - same for high and low
		$sumh=0;
		$suml=0;
		for($k=0; $k<5; $k++){// calc sum of each
			$sumh = $sumh + ($highmatrix[$i][$j][$k])*($k-2);
			$suml = $suml + ($lowmatrix[$i][$j][$k])*($k-2);
		}
		$avgh = $sumh/$count;
		$avgl = $suml/$count;
		if ($count%2 == 1){   // find midpoint or median point
			$medianposn = (($count-1)/2);
			$even = False;
		}
		else{
		 	$medianposn = $count/2; // if even numbers use the state thatis closest to the avg
		 	$even = True;
		}
		// find median of high array
		$hsum = $highmatrix[$i][$j][0]; // get the count of -2 
		$posn = 0;
		while ($hsum<$medianposn){
		 	$posn = $posn+1;;
			$hsum=$hsum+$highmatrix[$i][$j][$posn];
		}
		if ($even){
		 	if (($medianposn+1)>$hsum){
				$nposn = $posn+1;
				while ($highmatrix[$i][$j][$nposn] == 0){ // move up a category if there are no entries selected
					$nposn = $nposn +1;
				}
				if ((abs(($nposn-2)-$avgh))<(abs(($posn-2)-$avgh))){
					$posn = $nposn;
				}
			}
		}
		$finalHmatrix[$i][$j*2] = $posn-2;
		$finalHmatrix[$i][($j*2)+1] = 0-$finalHmatrix[$i][$j*2];
		
		$lsum = $lowmatrix[$i][$j][0]; // get the count of -2 
		$posn = 0;
		while ($lsum<$medianposn){
			$posn++;
			$lsum=$lsum+$lowmatrix[$i][$j][$posn];
		}
		if ($even){
		 	if (($medianposn+1)>$lsum){
				$nposn = $posn+1;
				while ($lowmatrix[$i][$j][$nposn] == 0){ // move up a category if there are no entries selected
					$nposn = $nposn +1;
				}
				if ((abs(($nposn-2)-$avgl))<(abs(($posn-2)-$avgl))){
					$posn = $nposn;
				}
			}
		}
		$finalLmatrix[$i][$j*2] = $posn-2;
		$finalLmatrix[$i][($j*2)+1] = 0-$finalLmatrix[$i][$j*2];
		

	}
  }
 
	for ($i=0; $i<$numfactors; $i++){  
	 	$headingh = array("F".($i+1), "H");
	 	$headingl = array(" ", "L");
		fputcsv($out,array_merge($headingh, $finalHmatrix[$i]), ',', '"');
		fputcsv($out,array_merge($headingl, $finalLmatrix[$i]), ',', '"');
  	}
  fclose($out);
  exit;
?>