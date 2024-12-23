<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="mystyle.css">
	<title>Sustainable Energy Scenario Study</title>
	<meta name="viewport" 
		content="width=device-width, initial-scale=0.9">
	<meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta charset="UTF-8">
</head>
<body>

<h2><u><b>Background Information</b></u></h2>
<h4> Complete the checklist to determine if you are a suitable participant.</h4>

	<form name="expertinfo" action="writeexpertdata.php" method="post">
	<div class="form-control">
        <table>
        	<tr><td><b>Check all that apply to you </b></td><td>  </td></tr>
	        <tr><td>I have worked in the energy sector for 5 or more years</td> 
			    <td><input type="hidden" name="yrs" value="0" > <input type="checkbox" name="yrs" value="Y" >  </td></tr>
            <tr><td>I have authored a book, published an article, or presented at a conference in the energy field<br></td>
				<td><input type="hidden" name="auth" value = "0"><input type="checkbox" name="auth" value = "Y"> </td></tr>
            <tr><td>I have been invited to speak at an event in the energy field (in the last 3 years)<br></td>
				<td><input type="hidden" name="event" value = "0"><input type="checkbox" name="event" value = "Y"> </td></tr>
			<tr><td>I have been the leader of a corporate team in the energy field</td>
				<td><input type="hidden" name="corp" value="0"><input type="checkbox" name="corp" value="Y"> </td></tr>
  			<tr><td>I am actively involved in energy policy making and decisions</td>
				<td><input type="hidden" name="policy" value="0"> <input type="checkbox" name="policy" value="Y"> </td></tr>
			<tr><td>I am a member of a committee in the field of energy</td>
				<td><input type="hidden" name="comm" value="0"><input type="checkbox" name="comm" value="Y"> </td></tr>
			<tr><td>I am a point of contact for the media for energy matters</td>
				<td><input type="hidden" name="media" value="0"><input type="checkbox" name="media" value="Y"> </td></tr>
             <tr><td>None of the above are applicable to me</td>
				<td><input type="hidden" name="none" value="0"><input type="checkbox" name="none" value="Y"> </td></tr>
                </table>
         	<table><tr><td><input type="button" value="Back" onclick="history.back();"></td>
            	<td style ="width:100%"><input type="submit" value="Save and Continue" /></td></tr>
            </table>
	</div>	
   
	</form>
	<div style="font-size:10px;"> This survey forms part of a Phd study being conducted at Durban University of Technology by Mrs RC Thompson <br>
                                  To contact the researcher please email robynt@dut.ac.za<br><br></div>
    <img src="DUTlogo.png" alt="DUT logo" width="100" height="50">
</body>
</html>