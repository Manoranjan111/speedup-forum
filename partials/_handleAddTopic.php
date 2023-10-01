<?php
session_start();
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    include"_dbconnect.php";
    $topicname = $_POST['topicname'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $username =  $_SESSION['useremail'];
    
  
    $sql= "INSERT INTO `main_content` (`category_name`, `username`, `category_description`,`image`,`time`) VALUES ('$topicname', '$username', '$description', '$image', current_timestamp());";

    $result=mysqli_query($conn,$sql);
    if($result){
    header("Location: /index.php?addTopicSuccess=true");
    }else{
        header("Location: /index.php?addTopicNotSuccess=true");
        }
}
?>