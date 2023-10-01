<?php
// $servername="localhost";
// $username="root";
// $password="";
// $database="speedup_forum";

$servername="sql205.infinityfree.com";
$username="if0_35142625";
$password="xyYvT1y9C3V94L7";
$database="if0_35142625_speedup";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "Database not connected";
    die("Sorry We are failed to connecting the database".mysqli_connect_error());
}else{
//    echo "database connecting Sucessfully";
}

?>