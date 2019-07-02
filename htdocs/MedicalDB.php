<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php	
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MedicalMessages";
$date = date("Y/m/d") ; 

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create DB
$sql= "CREATE DATABASE MedicalMessages" ;
if (mysqli_query($conn, $sql)) {
echo "Database created successfully";
} else {
echo "Error creating database: " . mysqli_error($conn);
}

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE Messages (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, sender VARCHAR(30) NOT NULL, recipient VARCHAR(30) NOT NULL,date DATE, message VARCHAR(200) NOT NULL)";

if ($conn->query($sql) === TRUE) {
echo "Table Messages created successfully";
} else {
echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

</body>

</html>
