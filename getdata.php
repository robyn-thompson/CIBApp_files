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
            $sql2= "SELECT f_explain from factors_energy";  // retrieve the description of the driving factor
			$dbRecord = mysqli_query ($conn,$sql);
            $dbRecord2 = mysqli_query ($conn,$sql2);    
			$cnt = 0;
            $ques = 1;
            $perc = 0;
            $totques = ($numfactors*$numfactors)-$numfactors;
			while (($arrRecord = mysqli_fetch_row($dbRecord))and ($arrRecord2 = mysqli_fetch_row($dbRecord2))){  // get all descriptions and store in an array
        		$f_desc[$cnt] = $arrRecord[0];    
                $f_explain[$cnt] = $arrRecord2[0];
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
			$f_desc = explode('~', $_POST['fdesc']);
            $f_explain = explode('~', $_POST['fexplain']);  
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
    <h3> When considering the adoption of renewable energy in the future...  </h3>
    <div class = "non-mobile">    [Hover over underlined phrases for extra clarification] </div>
	<form name="main" action="getdata.php" method="post">
	
	<div class="form-control">
        <table>
            <tr><td colspan = "5">If there exists a HIGH <div class="tooltip-container"><u><?php echo $f_desc[$IFac];?></u><span class="tooltip"><?php echo $f_explain[$IFac];?></span></div>, 
                    how will that influence a HIGH <div class="tooltip-container"><u><?php echo $f_desc[$DFac];?></u><span class="tooltip"><?php echo $f_explain[$DFac];?></span></div>?</td></tr>
			<tr></tr>
                <tr><td><input type="radio" id="HN2" name="F1radio" value="-2" > <label for="HN2">strong restrictive influence</label></td>
				<td><input type="radio" id="HN1" name="F1radio" value="-1" > <label for="HN1">weak restrictive influence</label></td>
				<td><input type="radio" id="HN" name="F1radio" value="0" checked = "checked"> <label for="HN">no significant influence <br></label></td>
				<td><input type="radio" id="HP1" name="F1radio" value="+1" > <label for="HP1">weak promoting influence</label></td>
				<td><input type="radio" id="HP2" name="F1radio" value="+2" > <label for="HP2">strong promoting influence</label></td></tr>                   
		</table>
		<br>
		<table>
               <tr><td colspan = "5"> If there exists a LOW <div class="tooltip-container"><u><?php echo $f_desc[$IFac];?></u><span class="tooltip"><?php echo $f_explain[$IFac];?></span></div>, 
                    how will that influence a HIGH <div class="tooltip-container"><u><?php echo $f_desc[$DFac];?></u><span class="tooltip"><?php echo $f_explain[$DFac];?></span></div>?</td></tr>
			<tr><td><input type="radio" id="LN2" name="F2radio" value="-2" > <label for="LN2">strong restrictive influence</label></td>
				<td><input type="radio" id="LN1" name="F2radio" value="-1" > <label for="LN1">weak restrictive influence</label></td>
				<td><input type="radio" id="LN" name="F2radio" value="0" checked = "checked"> <label for="LN">no significant influence</label></td>
				<td><input type="radio" id="LP1" name="F2radio" value="+1" > <label for="LP1">weak promoting influence</label></td>
				<td><input type="radio" id="LP2" name="F2radio" value="+2" > <label for="LP2">strong promoting influence</label></td></tr>                   
		</table>
	</div>
    <div class = "mobile-only">
    <h2><button style = "cursor:pointer; font-family: inherit; font-size: 14px" onclick="openPDF()">View Glossary of Terms</button></h2>
	<script>
		function openPDF() {
    	// URL to the PDF file
    		var pdfUrl = "REglossary.pdf";
    
    	// Open the PDF in a new window
   			 window.open(pdfUrl, "pdfWindow", "width=800,height=600");
		}
	</script>   
    </div>
    <div class="progress-container">
        <div class="label-left"> <?php echo $perc;?>%</div>
        <div class="progress-bar">        
   			<progress value = <?php echo (int)$perc;?> max = "100"></progress>
         </div>
        <div class="label-right">of 100%</div>
    </div>       
    <div class="form-control">    
            <table style="border:none; margin:0;"><tr><td><input type="button" value="Back" onclick="history.back();"></td>
            			<td style ="width:100%;"><input type="submit" value="Next..." name ="save" ></td></tr>
            </table>
			<input type="hidden" name="fdesc" value="<?php $str = implode('~', $f_desc); echo $str;?>">
            <input type="hidden" name="fexplain" value="<?php $str = implode('~', $f_explain); echo $str;?>">
			<input type="hidden" name="numfac" value="<?php echo $numfactors;?>">
			<input type="hidden" name="high" value="<?php echo $relH;?>">
			<input type="hidden" name="low" value="<?php echo $relL;?>">
			<input type="hidden" name="ind" value="<?php echo $IFac;?>">
			<input type="hidden" name="dep" value="<?php echo $DFac;?>">
			<input type="hidden" name="ques" value="<?php echo $ques;?>">
			<input type="hidden" name="totques" value="<?php echo $totques;?>">
	</div>
	</form>
    <div style="font-size:10px;"> This survey forms part of a Phd study being conducted at Durban University of Technology by Mrs RC Thompson <br>
                                  To contact the researcher please email robynt@dut.ac.za<br><br></div>
	 <img src="DUTlogo.png" alt="DUT logo" width="100" height="50">
</body>
</html>