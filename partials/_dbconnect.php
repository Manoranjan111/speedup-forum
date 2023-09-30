<?php
$servername="localhost";
$username="root";
$password="";
$database="speedup_forum";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "Database not connection";
    // die("Sorry We are failed to connecting the database".mysqli_connect_error());
}else{
//    echo "database connecting Sucessfully";
}

?>