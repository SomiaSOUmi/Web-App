<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
.b4 {
    background-color: transparent;
    border: thin white solid  ;
    color: white ;
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

<body bgcolor="gray">

<?php	
		
session_start() ;
 $_SESSION['found'] = 0 ;
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MedicalMessages";
$date = date("Y/m/d") ; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$from = $_SESSION['username'];
$to = $_POST['to'];
$message = $_POST['message'] ; 

$sql = "INSERT INTO Messages (sender, recipient, date,message) VALUES ('$from','$to','$date','$message' )";

if ($conn->query($sql) === TRUE) {
echo "<h1 align='center' style='margin:50px; color:white; font-size:xx-large;'> Your message has been sent successfully</h1>";
echo "</div>";
echo "</br></br></br></br>" ;

if ($_SESSION['page'] == 'diabetic.php' ){ 
echo "<div align='center' >";
echo  "<button class='b4'  type='button'= onclick=window.location.assign('diabetic.php') > Return To The Dashboared </button>";
echo "</div>";
}
else {
echo "<div align='center' >";
 echo "<button class='b4' type='button'= onclick=window.location.assign('practitioner.php') > Return To The Dashboared </button>";
echo "</div>";
}

} else {
echo "Error sending the message: " . $conn->error;
}
$conn->close();
?>

</body>

</html>
