<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
.b2 {
    background-color: transparent;
    border: thin #666666 solid ;
    color:white;
    padding: 2px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size:large;
    margin: 1px 1px;
    cursor: pointer;
    margin:25px; height:50px; width:200px; font-family:Georgia, 'Times New Roman', Times, serif ;
}
</style>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body background="pdp.jpg">
<!-- Which patient you want to check <input type="text" name="patientName"> </input-->
<table border='1'  align="center" style="border-color: white ; color:white"  >  
<?php

	session_start() ;
	$_SESSION['found'] = 0 ;
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MedicalMessages";
$recipient= $_SESSION['username'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// button to see received messages 

$sql = "SELECT sender, recipient, date, message FROM Messages WHERE recipient = '$recipient' ORDER BY date"  ; // WHERE recipient == $recipient ";
$result = $conn->query($sql);
// to see sent messages 
$numberOfRows = mysqli_num_rows($result);
// echo "the number of messages == $numberOfRows "; 
if ($numberOfRows){
echo "<table border='1' align='left' style='border-color: white ; color:white'   > <tr> <th>Sender</th> <th>Recipient</th> <th>Date</th> <th>Message</th> </tr>";
}
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['sender'] . "</td>";
echo "<td>" . $row['recipient'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['message'] . "</td>";
echo "</tr>";
}
echo "</table>";



if (!$numberOfRows) {
    // output data of each row
 //   while($row = $result->fetch_assoc()) {
   //     echo "Sender: " . $row["sender"]. " - Recipient: " . $row["recipient"]. " - Date: " . $row["date"]. " - Message: " . $row["message"]. "<br>";
    //}
//} else {
	echo "<h1 align='center' style='margin:50px; color:white; font-size:xx-large;'> Sorry, No message has been found </h1>";
    //echo "ne message has been found";
	}
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br></br></br>" ;

if ($_SESSION['page'] == 'diabetic.php' ){ 
echo "<div align='center' >" ;
echo  "<button class='b2' type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboared </button>";
echo "</div>";
}
else { 
echo "<div align='center' >" ;
echo "<button class='b2' type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboared </button>";
echo "</div>";
}

$conn->close();
?>
</body>

</html>
