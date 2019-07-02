<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
.b1 {
    background-color: transparent;
    border: '2' thin black solid ;
    color: black;
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

<body bgcolor="silver">

<?php	
		
session_start() ;
 $_SESSION['found'] = 0 ;
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiabeticRecordsDB";
//$date = date("Y/m/d") ; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$patient= $_SESSION['username'];
$dose = $_POST['dose'];
$level = $_POST['glucose'] ; 
$date = date("Y/m/d/h/m/s")  ; 
//$sql = "CREATE TABLE Records (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, patient VARCHAR(30) NOT NULL, InsulieDoseTaken INT(6) NOT NULL,glucoseLevel INT(6) NOT NULL ,date DATETIME)";

$sql = "INSERT INTO Records (patient, InsulieDoseTaken, glucoseLevel, date) VALUES ('$patient','$dose','$level','$date' )";

if ($conn->query($sql) === TRUE) {

echo "<div align='center' >";
 echo "<h1> The record has been saved successfully </h1>";
echo "</div>";


//echo "The record has been saved successfully";
echo "</br></br></br></br>" ;

//if ($_SESSION['page'] == 'diabetic.php' ){ 
echo "<div align='center' >";
echo  "<button class='b1' type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboard </button>";
echo "</div>";
//}
//else { echo "<button type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboared </button>";
//}

} else {
echo "Error sending the message: " . $conn->error;
}
$conn->close();
?>
</body>

</html>
