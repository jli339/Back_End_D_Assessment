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
    $teacher_name=$_POST["teacher_name"];
    
    if($teacher_name== NULL){
        die("FAIL,teacher_name can't be NULL!"); // If user don't input PK, exit the script and report error message
    }
    $class_id=$_POST["class_id"];
    $teacher_phone=$_POST["teacher_phone"];
    $teacher_address=$_POST["teacher_address"];
    $background_check=$_POST["background_check"];
    $email=$_POST["email"];
    
    $select=$_POST["sel"];
    $opt=$_POST["opt"];

}

switch ($opt){

    case "_ADD":
        $sql="INSERT INTO teachers". 
        "(teacher_name,class_id,teacher_phone,teacher_address,background_check,email)". 
        "VALUES". 
        "('$teacher_name','$class_id','$teacher_phone','$teacher_address','$background_check','$email')";
        break;

        case "_UPDATE":
            switch ($select){
             case "class_id":
                 $sql= "UPDATE teachers SET class_id='$class_id' Where teacher_name='$teacher_name'";
                 break;
             case "teacher_phone":
                $sql= "UPDATE teachers SET teacher_phone='$teacher_phone' Where teacher_name='$teacher_name'";
                 
                 break;
             case "teacher_address":
                $sql= "UPDATE teachers SET teacher_address='$teacher_address' Where teacher_name='$teacher_name'";
                 break;
             case "background_check":
                $sql= "UPDATE teachers SET background_check='$background_check' Where teacher_name='$teacher_name'";
                 break;

            case "email":
                $sql= "UPDATE teachers SET email='$email' Where teacher_name='$teacher_name'";
                break;
                
             default:
                 echo"111";
                 break;
     
            }
            break;

    case "_DELETE":
        $sql= "DELETE FROM teachers Where teacher_name='$teacher_name'";
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