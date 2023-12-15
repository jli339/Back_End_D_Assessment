<?php
$dbhost="localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "stalphonsus";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn)
{die("FAILED". mysqli_connect_error());
}

if(isset($_POST["submit"])){
    $parent_name=$_POST["parent_name"];
    if($parent_name== NULL){
        die("error!parent_name can't be empty!");
    }
    $parent_address=$_POST["parent_address"];
    $parent_email=$_POST["parent_email"];
    $parent_phone=$_POST["parent_phone"];
    $stu_name=$_POST["stu_name"];
    $select=$_POST["sel"];
   
    $opt=$_POST["opt"];

}

switch ($opt){

    case "_ADD":
        $sql="INSERT INTO parents". 
        "(parent_name,parent_address,parent_email,parent_phone,stu_name)". 
        "VALUES". 
        "('$parent_name','$parent_address','$parent_email','$parent_phone','$stu_name')";
        break;

    case "_UPDATE":
       switch ($select){
        case "parent_address":
            $sql= "UPDATE parents SET parent_address='$parent_address' Where parent_name='$parent_name'";
            break;
        case "parent_email":
            $sql= "UPDATE parents SET parent_email='$parent_email' Where parent_name='$parent_name'";
            
            break;
        case "parent_phone":
            $sql= "UPDATE parents SET parent_phone='$parent_phone' Where parent_name='$parent_name'";
            break;
        case "stu_name":
            $sql= "UPDATE parents SET stu_name='$stu_name' Where parent_name='$parent_name'";
            break;
        default:
            echo"111";
            break;

       }
       break;

    case "_DELETE":
        $sql= "DELETE FROM parents Where parent_name='$parent_name'";
        
        break;

    default:
        echo"111";
        break;

}

$result = mysqli_multi_query($conn, $sql);
if (!$result){
    die("FAIL!". mysqli_error($conn));
}
echo"SUCCESS!";


?>