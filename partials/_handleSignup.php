<?php
$insert=false;
$passwordNotMatch=false;
$userNameExist=false;
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    include"_dbconnect.php";
  $signupusername = $_POST['signupusername'];
  $useremail = $_POST['useremail'];
  $signuppassword = $_POST['signuppassword'];
  $signupcpassword = $_POST['signupcpassword'];

  $sql="SELECT * FROM `login` WHERE login_name='$signupusername'";
  $result=mysqli_query($conn,$sql);
  $numRows=mysqli_num_rows($result);
  if($numRows>0){
      // echo "Username Exist";
      $userNameExist=true;
      header("Location: /forum/index.php?userExist=true");
  }
  else{
      if($signuppassword == $signupcpassword){
          $hash = password_hash($signuppassword,PASSWORD_DEFAULT);

            $sql= "INSERT INTO `login` (`login_name`, `login_email`, `login_password`, `time`) VALUES ('$signupusername', '$useremail', '$hash', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            if($result){
            $insert=true;
            header("Location: /forum/index.php?signupsuccess=true");
            
        }
        
      }else{
        $passwordNotMatch=true;
        header("Location: /forum/index.php?passwordNotMatch=true");
      }
  }
    
    

}
?>