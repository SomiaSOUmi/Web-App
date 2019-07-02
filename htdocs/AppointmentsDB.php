<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php	

// The appointments of this database has been initialized because it should be done by a third part that could be a receptionist. In this project I havent covered the reciption part.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Appointments";
$date = date("Y/m/d") ; 

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create DB
$sql= "CREATE DATABASE Appointments" ;
if (mysqli_query($conn, $sql)) {
echo "Database created successfully";
} else {
echo "Error creating database: " . mysqli_error($conn);
}

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE appointment (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, doctor VARCHAR(30) NOT NULL, patient VARCHAR(30) NOT NULL,date DATE, Reason VARCHAR(200) NOT NULL)";


if ($conn->query($sql) === TRUE) {
echo "Table appointment created successfully";
} else {
echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

</body>

</html>
