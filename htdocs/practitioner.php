<html>
<head>
<style>
.b1 {
    background-color: transparent;
    border: thin blue solid ;
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


<script>
function loadXMLDoc(){
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
document.getElementById("username").innerHTML=xmlhttp.responseText;
}
xmlhttp.open("GET","getusername.php",true);
xmlhttp.send();
}
</script>


<body background="805790.jpeg" onload="loadXMLDoc()">


<?php
	
	session_start() ;
	$_SESSION['found'] = 0 ;
	
	
	echo "<h1 id=username align='center' color:blue; font-size:xx-large;> </h1>" ; 
	
	$doctors = simplexml_load_file('doctors.xml');
	
	foreach ( $doctors->doctor as $doctor)
	{	
   if ($_SESSION["username"] == $doctor->name ) 
     {
     		$_SESSION['found'] = 1 ;
     		break ;
     }    
    }
    if ($_SESSION['found'] == 0)
    {
    echo("<h1 align='center' style='margin:50px; color:blue; font-size:xx-large;'> Incorrect username or password. Please try again </h1>"); 
    echo "</br></br></br></br>" ;
    echo "<button  class='b1' type = 'button' = onclick='window.location.assign('practitioner.html')' > login </button>"; 
    echo "<button  class='b1' type='button'= onclick = window.location.assign('practitioner.html')> Return to Login page </button>";
	}
	else
	{
	echo "<div align='center' >" ; 
	echo "</br></br>" ;
	echo "<button class='b1' type='button'= onclick=window.location.assign('Messages.php') > Check Messages </button>";
	echo "</br></br>" ;
	echo "<button class='b1' type='button'= onclick=window.location.assign('SendMessage.html') > New Messages </button>";
	echo "</br></br>" ;
	echo "<button class='b1' type='button'= onclick=window.location.assign('Appointments.php') > Check Appointments </button>";
	echo "</br></br>" ;
	echo "<button class='b1' type='button'= onclick=window.location.assign('Patientsupdaits.php') > Check Patients Updaits </button>";
	echo "</br></br></br></br>" ;
	echo "<button class='b1' type='button'= onclick=window.location.assign('home.html') > Exit </button>";
	echo "</br></br></br></br>" ;
	echo "</div>";
	}	
?>

</br></br>
		
</body>
</html>
