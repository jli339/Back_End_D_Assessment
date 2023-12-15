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
    $class_id=$_POST["class_id"];
    if($class_id== NULL){
        die("error!class_id can't be empty!");
    }
    $student_num=$_POST["student_num"];
    $student_num=(int) $student_num ;
    $class_year=$_POST["class_year"];
    $class_year=(int) $class_year ;

    $select=$_POST["sel"];
    $opt=$_POST["opt"];

}

switch ($opt){

    case "_ADD":
        $sql="INSERT INTO class". 
        "(class_id,student_num,class_year)". 
        "VALUES". 
        "('$class_id','$student_num','$class_year')";
        break;

    case "_UPDATE":
        switch ($select){
            case "student_num":
                $sql= "UPDATE class SET student_num='$student_num' Where class_id='$class_id'";
                break;
            case "class_year":
                $sql= "UPDATE class SET class_year='$class_year' Where class_id='$class_id'";
                break;
            default:
                echo"111";
                break;

        }
        break;

    case "_DELETE":
        $sql= "DELETE FROM class Where class_id='$class_id'";
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