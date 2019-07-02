<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.bd {
    background-color: transparent;
    border: '1' thin blue solid ;
    color: blue;
    padding: 2px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size:large;
    margin: 1px 1px;
    cursor: pointer;
    margin:25px; height:50px; width:200px;text-align:center; font-family:Georgia, 'Times New Roman', Times, serif ;
}
</style>
</head>

<body background="pagebackground2.jpg">


	
	<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: home.html');
    exit();
}
	
	$_SESSION['found'] = 0 ;

	
	
	$patients = simplexml_load_file('patients.xml');
	//while ($_SESSION['found'] == 0 )
	foreach ( $patients->patient as $patient)
	{	
    if ($_SESSION["username"] == $patient->name)
     {
     $_SESSION['found'] = 1 ;
     	echo "<div align='center' >";
    	echo "<h1  style='margin:50px; color:white; font-size:xx-large;'> Welcome ".$_SESSION["username"]."</h1>";
     	//echo "Welcome ".$_SESSION["username"];
     	echo "</div>";
     break ; 
     }    
    }
    if ($_SESSION['found'] == 0)
    {	echo "<div align='center' >";
    	echo "<h1  style='margin:50px; color:white; font-size:xx-large;'> Incorrect username or password. Please try again </h1>";
		echo "</div>";
	//echo("Incorrect username or password. Please try again "); 
    echo "</br></br></br></br>" ;
    //echo "<button type = 'button' = onclick='window.location.assign('patient.html')' > login </button>"; 
    echo "<div align='center' >";
    echo "<button class='bd' style = 'margin-left: 90px' type='button'= onclick = window.location.assign('diabetic.html')> Return to Login page </button>";
	echo "</div>";
	
	}
	else
	{ 
/*	
	echo "<div class='container'>";
	echo "  <h2>Messages</h2>";
	//echo "  <p>Click on the button to toggle between showing and hiding content.</p>";
	echo "  <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo'>Messages</button>" ;
	echo "  <div id='1' class='collapse'>" ;
	echo "</br></br></br></br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('Messages.php') > Check Messages </button>";
	echo "</br></br></br></br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('SendMessage.html') > New Messages </button>";
	echo "</br></br></br></br>" ;
	echo "  </div> "; 
	echo " </div>"; 
	
	echo "<div class='container'>";
	echo "  <h2>Records</h2>";
	//echo "  <p>Click on the button to toggle between showing and hiding content.</p>";
	echo "  <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo'>Records</button>" ;
	echo "  <div id='2' class='collapse'>" ;
	echo "</br></br></br></br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('AddRecordDiabetic.html') > Insert new record </button>";
	echo "</br></br></br></br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('ViewRecords.php') > View records history </button>";
	echo "</br></br></br></br>" ;
	echo "  </div> "; 
	echo " </div>"; 

	
	echo "<button class='bd' type='button'= onclick=window.location.assign('Appointments.php') > Check Appointments </button>";
	echo "</br></br></br></br>" ;
*/	
	echo "<div class='panel-group' id='accordion'>" ; 
   echo "<div class='panel panel-default'>" ; 
   echo " <div class='panel-heading'> ";
   echo "   <h4 class='panel-title'>";
   echo "     <a data-toggle='collapse' data-parent='#accordion' href='#collapse1'>";
   echo "     Messages</a>";
   echo "   </h4>";
   echo " </div>";
   echo " <div id='collapse1' class='panel-collapse collapse'>";
   echo "   <div class='panel-body'>";
			// echo "  <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo'>Messages</button>" ;
			// echo "  <div id='1' class='collapse'>" ;
			//echo "</br></br>" ;
			echo "<button class='bd' type='button'= onclick=window.location.assign('Messages.php') > Check Messages </button>";
			echo "</br>" ;
			echo "<button class='bd' type='button'= onclick=window.location.assign('SendMessage.html') > New Messages </button>";
			//echo "</br></br></br></br>" ;
			// echo "  </div> "; 
   echo "   </div>";
   echo " </div>";
  	echo " </div>";
  echo " <div class='panel panel-default'>";
   echo " <div class='panel-heading'>";
    echo "  <h4 class='panel-title'>";
     echo "   <a data-toggle='collapse' data-parent='#accordion' href='#collapse2'>";
     echo "   Records</a>";
     echo " </h4>";
    echo " </div>";
    echo " <div id='collapse2' class='panel-collapse collapse'>";
    echo "  <div class='panel-body'>";
   // echo "</br></br></br></br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('AddRecordDiabetic.html') > Insert new record </button>";
	echo "</br>" ;
	echo "<button class='bd' type='button'= onclick=window.location.assign('ViewRecords.php') > View records history </button>";
	//echo "</br></br></br></br>" ;
    echo "  </div>";
    echo "</div>";
  	echo " </div>";
 	echo " <div class='panel panel-default'>";
    echo "<div class='panel-heading'>";
    echo "  <h4 class='panel-title'>";
    echo "    <a data-toggle='collapse' data-parent='#accordion' href='#collapse3'>";
    echo "    Appointments</a>";
    echo "  </h4>";
    echo "</div>";
    echo "<div id='collapse3' class='panel-collapse collapse'>";
    echo "  <div class='panel-body'>";
 		echo "<button class='bd' type='button'= onclick=window.location.assign('Appointments.php') > Check Appointments </button>";
		//echo "</br></br></br></br>" ;
 	echo "     </div>";
    echo "</div>";
  echo "</div>";
echo "</div> ";

 }	
	echo "<div align='center' >";
//	echo "< div align='center'>";
	echo "<button class='bd' type='button'= onclick=window.location.assign('logout.php') >Exit</button>";
	echo "</div>";

?>

</br></br>
		
</body>
</html>
