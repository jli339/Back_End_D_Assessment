

<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);  //connet to the Database
if (!$conn)
{die("FAILED". mysqli_connect_error());
}


if(isset($_POST["login"])){                     //recive and store the value passed from the login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];
}

$sql="SELECT * FROM login_tb WHERE userid='$username' AND user_password='$password' AND user_level='$level'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){ //Identify if the value passed by user matches the data stored in the Database

    $url="http://localhost/BED/admin_index.html";  //If match, go to admin version index
    echo"<script language='javascript'>";
    echo "alert('You are logging in as ADMIN, you have full permission');";
    echo "location='$url'";
    echo"</script>";
}

else{
    $url="http://localhost/BED/index.html";  //If not match, go to guest version index
    echo"<script language='javascript'>";
    echo "alert('You are logging in as GUEST, you have no permission to change the data');";
    echo "location='$url'";
    echo"</script>";
}
?>