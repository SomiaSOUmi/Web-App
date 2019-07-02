<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
.b2 {
    background-color: transparent;
    border: '1' ;
    color:black;
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

<body bgcolor="#9999FF">
<!-- Which patient you want to check <input type="text" name="patientName"> </input -->

<?php

	session_start() ;
	$_SESSION['found'] = 0 ;
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiabeticRecordsDB";
// $recipient= $_SESSION['username'];
$yesterday = date("Y/m/d",strtotime("-1 days"));
//echo $yesterday ; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// button to see received messages 

// $sql = "INSERT INTO Records (patient, InsulieDoseTaken, glucoseLevel, date) VALUES ('$patient','$dose','$level','$date' )";
//echo ( "SELECT patient date(Y/m/d) FROM Records "  ) ;

$sql = "SELECT patient, InsulieDoseTaken,glucoseLevel, date FROM Records WHERE date >'$yesterday' ORDER BY date"  ; // WHERE recipient == $recipient ";
$result = $conn->query($sql);
// to see sent messages 
$numberOfRows = mysqli_num_rows($result);
// echo "the number of messages == $numberOfRows "; 


echo "<table border='2' align='center' style='border-color: white ; color:black'   > <tr> <th>Patient</th> <th>Insuline Dose(ml)</th> <th>Glucose(mmol/L)</th> <th>Date</th> </tr>";

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
	echo "<div align='center' >";
    echo "<h1> No record has been saved </h1>";
	echo "</div>";
}
echo "</br></br></br></br>" ;
//if ($_SESSION['page'] == 'diabetic.php' ){ 
//echo  "<button type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboared </button>";
//}
//else
 //{
 
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;
echo "</br></br></br></br>" ;

echo "<div align='center' >" ;
echo "<button class='b2'  type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboard </button>";
echo "</div>";
//}

$conn->close();
?>
</body>

</html>
