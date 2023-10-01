<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/img/fav-icon.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css"/>
    <title>Start Discussion</title>
    <script  src="https://kit.fontawesome.com/53fb958445.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php 
    include "partials/_header.php";
    include "partials/_dbconnect.php";
  ?>


 <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      $user_Name=$_SESSION['useremail'];
    }
    $id=$_GET['categoryid'];
    $sql= "SELECT * FROM `main_content` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $category_name=$row['category_name'];
      $description=$row['category_description'];
      $blob = $row['image'];
    }

    echo '   
    <div class="container my-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Welcome to '.$category_name.' forums </h2>
            <p class="card-text">'. $description.'</p>
          </div>
        </div>
    </div> 
    ';

    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
      $th_title = $category_name;
      $th_title=str_replace("<","&lt;",$th_title);
      $th_title=str_replace(">","&gt;",$th_title);

      $th_desc = $_POST['desc'];
      $th_desc=str_replace("<","&lt;",$th_desc);
      $th_desc=str_replace(">","&gt;",$th_desc);
      
     $sql= "INSERT INTO `threads` (`user_name`, `thread_title`, `thread_desc`, `thread_category_id`, `thread_user_id`, `time`) VALUES ('$user_Name', '$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        
     
    
    }
?>
 <div class="container my-3">
        <div class="container">
        <h6 class="h4 py-2">Start Discussion</h6>
        <?php
             if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              echo'
            <form action = "'.$_SERVER['REQUEST_URI'].'" method="post">
                <div class="mb-3">
                    <label for="description" class="form-label">Elaborate your concern</label>
                    <input type="text" class="form-control" id="desc" placeholder="Description" name="desc">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
               
            </form>';
          }else{
            echo'<div class="mb-3">
            <p> You are not login please login and post comment</p>
          </div>';
          }

        ?>

      </div>
        <h6 class="h4 mb-3 mt-4">Comments</h6>
    </div>

    <?php

    $sql= "SELECT * FROM `threads` WHERE thread_category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['thread_id'];
      $title=$row['thread_title'];
      $description=$row['thread_desc'];
      $userid=$row['user_name'];

      echo ' <div class="container my-3">
      
      <div class="d-flex">
      <div class="flex-shrink-0">
        <img src="img/userdefault.png" height="60px" width="70px" alt="...">
      </div>
      <div class="flex-grow-1 ms-3">
      <h4 class="card-title h5 my-0"><a href="thread.php?threadlist_id='.$id.'">'.$userid.'</a></h4>
      <h5 class="card-description h5 my-0"> '.$title.'</h5>
      '.$description.'
     
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