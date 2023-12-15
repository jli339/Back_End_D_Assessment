<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn)
{die("FAILED". mysqli_connect_error());
}



$sql="SELECT parent_name,parent_address,parent_email,parent_phone,stu_name FROM parents";

$result = mysqli_query($conn, $sql);

echo"<table border='1'><tr><td>NAME</td><td>ADDR</td><td>EMAIL</td><td>PHONE</td><td>STU</td></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>{$row['parent_name']}</td>".
    "<td>{$row['parent_address']}</td>".
    "<td>{$row['parent_email']}</td>".
    "<td>{$row['parent_phone']}</td>".
    "<td>{$row['stu_name']}</td>".
    "</tr>";
}
echo"</table>";

mysqli_close($conn);

?>