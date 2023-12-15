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
    $stu_name=$_POST["stu_name"];
    if($stu_name== NULL){
        die("error! stu_name can't be empty");
    }
    $stu_id=$_POST["stu_id"];
    $stu_address=$_POST["stu_address"];
    $stu_mediInfo=$_POST["stu_mediInfo"];
    $class_id=$_POST["class_id"];
    $parent1=$_POST["parent1"];
    $parent2=$_POST["parent2"];

    $select=$_POST["sel"];
    $opt=$_POST["opt"];

}

switch ($opt){  //Capture the change option of users, use different DML according to user's option

    case "_ADD":
        $sql="INSERT INTO students".    //USE INSERT TO ADD 
        "(stu_name,stu_id,stu_address,stu_mediInfo,class_id,parent1,parent2)". 
        "VALUES". 
        "('$stu_name','$stu_id','$stu_address','$stu_mediInfo','$class_id','$parent1','$parent2')";
        break;

        case "_UPDATE":
            switch ($select){       //Capture the fields that users want to change
             case "stu_id":
                $sql= "UPDATE students SET stu_id='$stu_id' Where stu_name='$stu_name'";

                                    //Update function
                break;
            case "stu_address":
                $sql= "UPDATE students SET stu_address='$stu_address' Where stu_name='$stu_name'";
                break;
            case "stu_mediInfo":
                $sql= "UPDATE students SET stu_mediInfo='$stu_mediInfo' Where stu_name='$stu_name'";
                break;
            case "class_id":
                $sql= "UPDATE students SET class_id='$class_id' Where stu_name='$stu_name'";
                break;
            case "parent1":
                $sql= "UPDATE students SET parent1='$parent1' Where stu_name='$stu_name'";
                break;

            case "parent2":
                $sql= "UPDATE students SET parent2='$parent2' Where stu_name='$stu_name'";
                break;
             default:
                 echo"111";
                 break;
     
            }
            break;

    case "_DELETE":
        $sql= "DELETE FROM students Where stu_name='$stu_name'"; //delete function
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