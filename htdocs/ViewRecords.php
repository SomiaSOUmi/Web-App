<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>


<style>
.b1 {
    background-color: transparent;
    border: '2' thin black solid ;
    color: white;
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

<body bgcolor="teal">
<!-- Which patient you want to check <input type="text" name="patientName"> </input -->

<?php

	session_start() ;
	$_SESSION['found'] = 0 ;
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiabeticRecordsDB";
$recipient= $_SESSION['username'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// button to see received messages 

// $sql = "INSERT INTO Records (patient, InsulieDoseTaken, glucoseLevel, date) VALUES ('$patient','$dose','$level','$date' )";


$sql = "SELECT patient, InsulieDoseTaken,glucoseLevel, date FROM Records WHERE patient = '$recipient' ORDER BY date"  ; // WHERE recipient == $recipient ";
$result = $conn->query($sql);
// to see sent messages 
$numberOfRows = mysqli_num_rows($result);
// echo "the number of messages == $numberOfRows "; 

echo "<table border='1' align='left' style='border-color: white ; color:white'   > <tr> <th>Patient</th> <th>Insuline Dose</th> <th>Glucose level</th> <th>Date</th> </tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row["patient"] . "</td>";
echo "<td>" . $row["InsulieDoseTaken"] . "</td>";
echo "<td>" . $row["glucoseLevel"] . "</td>";
echo "<td>" . $row["date"] . "</td>";
echo "</tr>";
}
echo "</table>";



if (!$numberOfRows ) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
      //  echo "Patient: " . $row["patient"]. " - Insuline Dose: " . $row["InsulieDoseTaken"]. " - Glucose: " . $row["glucoseLevel"]. " - Date: " . $row["date"]. "<br>";
    //}
//} else {
echo "<div align='center' >";
 echo "<h1> No record has been saved </h1>";
echo "</div>";
}
echo "</br></br></br></br>" ;echo "</br></br></br></br>" ;echo "</br></br></br></br>" ;echo "</br></br></br></br>" ;echo "</br></br></br></br>" ;
//if ($_SESSION['page'] == 'diabetic.php' ){ 
echo "<div align='center' >";
echo  "<button class='b1' type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboard </button>";
echo "</div>";

//echo  "<button type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboard </button>";
//}
//else { echo "<button type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboared </button>";
//}

$conn->close();
?>
</body>

</html>
