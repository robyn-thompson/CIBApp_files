<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="mystyle.css">
	<title>Sustainable Energy Scenario Study</title>
	<meta name="viewport" 
		content="width=device-width, initial-scale=0.8">
	<meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta charset="UTF-8">
</head>
        
<body>
	<?php
		require_once("connect.php"); // connect to database
		if ($_SERVER['REQUEST_METHOD'] != 'POST'){ //if this is the first instance of executing this page
			$IFac=0;				// initialize independent factor number to 1st factor
			$DFac=1;				// initialize dependent factor number to 2nd factor
			$sql= "SELECT count(*) from factors_energy";  // retrieve the description of the driving factor
			$dbRecord = mysqli_query ($conn,$sql);
			$arrRecord = mysqli_fetch_row($dbRecord);
			$numfactors = $arrRecord[0];
			$sql= "SELECT f_desc from factors_energy";  // retrieve the description of the driving factor
			$dbRecord = mysqli_query ($conn,$sql);
			$cnt = 0;
            $ques = 1;
            $perc = 0;
            $totques = ($numfactors*$numfactors)-$numfactors;
			while ($arrRecord = mysqli_fetch_row($dbRecord)){  // get all descriptions and store in an array
        		$f_desc[$cnt] = $arrRecord[0];
        		$cnt++;
    		}
    		$relH = "0"; // string to store all high relationships
    		$relL = "0"; // string to store all low relationships
		}
		else {
		 	$ques = $_POST["ques"];
            $ques ++;
            $totques = $_POST["totques"];
            $perc = round(($ques-1)/$totques*100);
			$numfactors = $_POST["numfac"];
			$relH = $_POST["high"];
			$relL = $_POST["low"];
			$IFac = $_POST["ind"];
			$f_desc = explode(',', $_POST['fdesc']);
			$DFac = $_POST["dep"]+1;
			$relH = $relH.','.$_POST["F1radio"];
			$relL = $relL.','.$_POST["F2radio"];
			if (($DFac == ($numfactors-1)) and ($IFac == ($numfactors-1))) { // if all factors have been processed
				$relH = $relH.','."0"; // adding very last impact Fx on Fx
				$relL = $relL.','."0"; 
				$sql = "INSERT INTO relationships VALUES ('$relH', '$relL')";
				if(!mysqli_query($conn,$sql))
					echo "could not insert data";
				echo '<script type="text/javascript">
    				window.onload = function() {
        			window.location.href = "finished.php";
    				};
				</script>';
			}
			else {
			 	while (($DFac == $numfactors) OR ($DFac == $IFac)){
					if ($DFac == $numfactors){  // if all dependents have been used then move independent up and start independent at 0
						$DFac = 0;
						$IFac = ($IFac+1);
					}
                	if ($DFac == $IFac){			// if dependent and independent are same then move up dependent variable, and add 0's to relH and relL
                		$DFac ++;
                		$relH= $relH.','.'0';
                		$relL= $relL.','.'0';
                	}
				}
			}
		}

	?>

    <h3> Question <?php echo $ques;?> </h3>
    <h3> When considering the adoption of renewable energy ... </h3>   
	<form name="main" action="getdata.php" method="post">
	
	<div class="form-control">
        <table>
            <tr><td colspan = "5">In the future, what influence will a HIGH state of <?php echo $f_desc[$IFac];?> have on a HIGH state of <?php echo $f_desc[$DFac]?>? </td></tr>
			<tr></tr>
                <tr><td><input type="radio" id="HN2" name="F1radio" value="-2" > <label for="HN2">strong restrictive influence</label></td>
				<td><input type="radio" id="HN1" name="F1radio" value="-1" > <label for="HN1">weak restrictive influence</label></td>
				<td><input type="radio" id="HN" name="F1radio" value="0" checked = "checked"> <label for="HN">no significant influence <br></label></td>
				<td><input type="radio" id="HP1" name="F1radio" value="+1" > <label for="HP1">weak promoting influence</label></td>
				<td><input type="radio" id="HP2" name="F1radio" value="+2" > <label for="HP2">strong promoting influence</label></td></tr>                   
		</table>
		<br>
		<table>
            <tr><td colspan = "5">In the future, what influence will a LOW state of <?php echo $f_desc[$IFac];?> have on a HIGH state of <?php echo $f_desc[$DFac]?>? </td></tr>
			<tr><td><input type="radio" id="LN2" name="F2radio" value="-2" > <label for="LN2">strong restrictive influence</label></td>
				<td><input type="radio" id="LN1" name="F2radio" value="-1" > <label for="LN1">weak restrictive influence</label></td>
				<td><input type="radio" id="LN" name="F2radio" value="0" checked = "checked"> <label for="LN">no significant influence</label></td>
				<td><input type="radio" id="LP1" name="F2radio" value="+1" > <label for="LP1">weak promoting influence</label></td>
				<td><input type="radio" id="LP2" name="F2radio" value="+2" > <label for="LP2">strong promoting influence</label></td></tr>                   
		</table>
	</div>
         <h2><button style = "cursor:pointer; ont-family: inherit; font-size: 14px" onclick="openPDF()">View Glossary of Terms</button></h2>
	<script>
		function openPDF() {
    	// URL to the PDF file
    		var pdfUrl = "REglossary.pdf";
    
    	// Open the PDF in a new window
   			 window.open(pdfUrl, "pdfWindow", "width=800,height=600");
		}
	</script>
    <div class="progress-container">
        <div class="label-left"> <?php echo $perc;?>%</div>
        <div class="progress-bar">        
   			<progress value = <?php echo (int)$perc;?> max = "100"></progress>
         </div>
        <div class="label-right">of 100%</div>
    </div>       
    <div class="form-control">        
			<input type="submit" value="Next..." name ="save" ></input>
			<input type="hidden" name="fdesc" value="<?php $str = implode(',', $f_desc); echo $str;?>"></input>
			<input type="hidden" name="numfac" value="<?php echo $numfactors;?>"></input>
			<input type="hidden" name="high" value="<?php echo $relH;?>"></input>
			<input type="hidden" name="low" value="<?php echo $relL;?>"></input>
			<input type="hidden" name="ind" value="<?php echo $IFac;?>"></input>
			<input type="hidden" name="dep" value="<?php echo $DFac;?>"></input>
			<input type="hidden" name="ques" value="<?php echo $ques;?>"></input>
			<input type="hidden" name="totques" value="<?php echo $totques;?>"></input>
	</div>
	</form>
</body>
</html>