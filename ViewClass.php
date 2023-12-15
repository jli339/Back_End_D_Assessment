<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn)
{die("FAILED". mysqli_connect_error());
}



$sql="SELECT class_id,student_num,class_year FROM class";

$result = mysqli_query($conn, $sql);

echo"<table border='1'><tr><td>CLASS_ID</td><td>STU_NUM</td><td>YEAR</td></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>{$row['class_id']}</td>".
    "<td>{$row['student_num']}</td>".
    "<td>{$row['class_year']}</td>".
   
    "</tr>";
}
echo"</table>";

mysqli_close($conn);

?>