<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "_dbconnect.php";
    $loginemail = $_POST["loginemail"];
    $loginpassword = $_POST["loginpassword"];
  //CHECKING USERNAME ALREADY EXIST OR NOT  
    $sql = "SELECT * FROM `login` WHERE login_email='$loginemail';";
    $result = mysqli_query($conn, $sql);
    $numRows=mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($loginpassword, $row['login_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $loginemail;
            
            header("Location: /forum/index.php?loginsuccess=true");
        }
        else{
            header("Location: /forum/index.php?passwordnotmatch=true");
        }
    }else{
        header("Location: /forum/index.php?invalidemail=true");
    }
    
}

?>
