<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn)
{die("FAILED". mysqli_connect_error());
}



$sql="SELECT stu_name,stu_id,stu_address,stu_mediInfo,class_id,parent1,parent2 FROM students"; 

$result = mysqli_query($conn, $sql);

echo"<table border='1'><tr><td>NAME</td><td>ID</td><td>ADDR</td><td>MEDI</td><td>CLASS</td><td>parent1</td><td>parent2</td></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //using DML in PHP to access Database

    echo "<tr><td>{$row['stu_name']}</td>".
    "<td>{$row['stu_id']}</td>".
    "<td>{$row['stu_address']}</td>".
    "<td>{$row['stu_mediInfo']}</td>".
    "<td>{$row['class_id']}</td>".
    "<td>{$row['parent1']}</td>".
    "<td>{$row['parent2']}</td>"."</tr>";
}
echo"</table>";  //print the table

mysqli_close($conn);

?>