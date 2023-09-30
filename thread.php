<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/img/fav-icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css"/>
    <title>Comment</title>
    <script  src="https://kit.fontawesome.com/53fb958445.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php 
    include "partials/_header.php";
    include "partials/_dbconnect.php";
  ?>
    <?php echo '
    <div class="container my-3">
    <h6 class="h1">Browse Question</h6>
    </div>';
    $id = $_GET['threadlist_id'];
    $sql= "SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['thread_id'];
      $title=$row['thread_title'];
      $user_Name=$row['user_name'];
      $description=$row['thread_desc'];

      echo ' <div class="container my-3">
      
      <div class="d-flex">
      <div class="flex-shrink-0">
        <img src="img/userdefault.png" height="60px" width="70px" alt="...">
      </div>
      <div class="flex-grow-1 ms-3">
      <h4 class="card-title">'.$user_Name.'</h4>
      <h4class="card-title">'.$title.'</h4>
      '.$description.'
      </div>
    </div>
      </div> ';
    }
?>
<!-- INSERT COMMENT IN DATABSE -->

<?php
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $comment = $_POST['comment'];
        $comment=str_replace("<","&lt;",$comment);
        $comment=str_replace(">","&gt;",$comment);
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          $comment_by=$_SESSION['useremail'];
        }
          $sql= "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$comment_by', current_timestamp());";
          $result=mysqli_query($conn,$sql);
      }
?>
<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo'
  <style>
    body{
      min-height:85vh;
    
    </style>
    <div class="container my-3">
      <h6 class="h4 py-2">Post Privvately Comment</h6>
          <form action = "'.$_SERVER['REQUEST_URI'].'" method="post" >
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Type your Comment</label>
                  <input type="text" class="form-control" id="comment" name="comment"  aria-describedby="emailHelp">
              </div>
              
              <button type="submit" class="btn btn-primary">Post Comment</button>
          </form>
      </div>';
}else{
      echo'<div class="mb-3">
      <p> You are not login please login and post comment</p>
    </div>';
}
?>

  <!-- FETCHING COMMENT IN DATABASE   -->
<?php

    $sql= "SELECT * FROM `comments` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      
      $comment=$row['comment_content'];
      $comment_by=$row['comment_by'];
      $comment_time=$row['comment_time'];

      echo ' <div class="container my-3">
      
      <div class="d-flex">
      <div class="flex-shrink-0">
        <img src="img/userdefault.png" height="60px" width="70px" alt="...">
      </div>
      <div class="flex-grow-1 ms-3">
      
      <h5 class="card-description h5"> '.$comment_by.' '.$comment_time.'</h5>
      '.$comment.'
    
      </div>
    </div>
      </div> ';
      
    }
?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- INCLUDING FOOTER -->
    <?php include "partials/_footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>