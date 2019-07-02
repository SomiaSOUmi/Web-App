<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
.b2 {
    background-color: transparent;
    border: '2' blue solid ;
    color:blue;
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

</head>

<!--body bgcolor="silver"-->
<body background="Medical Records.jpg">

<?php

session_start() ;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Appointments";

$recipient= $_SESSION['username'];
$page = $_SESSION['page'] ;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// button to see received messages 
if ($_SESSION['page'] !== 'diabetic.php'){ 
$sql = "SELECT Doctor, patient, date, Reason FROM appointment WHERE Doctor = '$recipient' ORDER BY date"  ; // WHERE recipient == $recipient ";
}
else {
$sql = "SELECT Doctor, patient, date, Reason FROM appointment WHERE patient = '$recipient' ORDER BY date"  ; // WHERE recipient == $recipient ";
}


$result = $conn->query($sql);
// to see sent messages 
$numberOfRows = mysqli_num_rows($result);
// echo "the number of messages == $numberOfRows ";

echo "<table border='1' align='center' style='border-color: white ; color:white'   > <tr> <th>Doctor</th> <th>Patient</th> <th>Date</th> <th>Reason</th> </tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Doctor'] . "</td>";
echo "<td>" . $row['patient'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['Reason'] . "</td>";
echo "</tr>";
}
echo "</table>";

 
if (!$numberOfRows ) {
echo "<div align='center' >";
 echo "<h1> No appointment has been booked </h1>";
echo "</div>";

}
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
if ($_SESSION['page'] == 'diabetic.php' ){ 
echo "<div align='center' >" ;
echo  "<button class='b2'  type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboard </button>";
echo "</div>";
}
else { 
echo "<div align='center' >" ;
echo "<button class='b2'  type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboard </button>";
echo "</div>";
}


$conn->close();
?>

</body>

</html>
