<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn)
{die("FAILED". mysqli_connect_error());
}



$sql="SELECT teacher_name,class_id,teacher_phone,teacher_address,background_check,email FROM teachers";

$result = mysqli_query($conn, $sql);

echo"<table border='1'><tr><td>NAME</td><td>CLASS</td><td>PHONE</td><td>ADD</td><td>BG_CHECK</td><td>EMAIL</td></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>{$row['teacher_name']}</td>".
    "<td>{$row['class_id']}</td>".
    "<td>{$row['teacher_phone']}</td>".
    "<td>{$row['teacher_address']}</td>".
    "<td>{$row['background_check']}</td>".
    "<td>{$row['email']}</td>".
    "</tr>";
}
echo"</table>";

mysqli_close($conn);

?>