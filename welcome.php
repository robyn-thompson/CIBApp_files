<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cont'])) {
        header('Location: expertinfo.php');
        exit();
    } elseif (isset($_POST['ex'])) {
        header('Location: exit.php');
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
	<h2> Scenarios for renewable energy adoption </h2>
	<h4> Thank you for showing an interest in contributing to this Phd study.</h4>
	The purpose of the study is to construct consistent scenarios. <br> 
	To accomplish this expert participants will provide evaluations <br>
	of the impacts that 7 factors have on each other.<br><br>
    The survey should take about 15-20 minutes of your time. <br><br>
    	<button style = "cursor:pointer; font-family: inherit; font-size: 14px" onclick="openPDF()">View Letter of Information and Consent</button>
	<script>
		function openPDF() {
    	// URL to the PDF file
    		var pdfUrl = "Information-and-Consent.pdf";
    
    	// Open the PDF in a new window
   			 window.open(pdfUrl, "pdfWindow", "width=800,height=600");
		}
	</script>    
	<h4> Before completing the survey, please consent to being a participant. </h4>
	<form name="welcome"  method="post">
	<div class="form-control">
        <table>
            <tr><td colspan = "2" style="text-align: center; font-size: 16px; font-weight: bold;">Do you agree to take part in the survey?</td></tr>
            <tr><td><input type ="submit" value="Yes" name="cont" ></td>
			<td><input type="submit" value="No" name ="ex" ></td></tr>                   
		</table>
	</div>
    </form>
    <div style="font-size:10px;"> This survey forms part of a Phd study being conducted at Durban University of Technology by Mrs RC Thompson <br>
                                  To contact the researcher please email robynt@dut.ac.za<br><br></div>
    <img src="DUTlogo.png" alt="DUT logo" width="100" height="50">
</body>
</html>