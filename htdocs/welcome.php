
<html>

<body>
<?php $rows = $_POST["rows"];
 
 echo "<br>" ;
$columns =  $_POST["columns"]; 
echo "<br>" ;
echo "<table border='2'" ;
echo "<br>" ;

 for ($j = 0; $j <= $rows; $j++) {
  echo "<tr>" ;

for ($i = 0; $i <= $columns; $i++) 
  echo "<td>11111</td>" ;
 echo "</tr>" ;

} 
?>
</table>
</body>

</html>
