<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="icon" href="./img/icon.png" type="image/gif" sizes="16x16" /> -->
    <link rel="icon" href="/img/fav-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script  src="https://kit.fontawesome.com/53fb958445.js" crossorigin="anonymous"></script>
    <title>Speedup Forum</title>
    <style>
        a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php 
        include "partials/_header.php";
        include "partials/_dbconnect.php";
        include "partials/_addTopicModal.php";
    ?>

    <div class="container add-topic-bar">
        <div class="row text-start mt-3">

            <div class="col text-left">
            <h4 class="">Latest</h4>
            </div>

            <div class="col text-left">
                <h4 class="card-title">New</h4>
            </div>

            <div class="col text-left">
                <h4 class="card-title">Unread</h4>
            </div>

            <div class="col text-left">
                <h4 class="card-title">Bookmarks</h4>
            </div>

            <div class="col-6 text-end">
                <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                        echo'<button class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#addTopicModalLable">Add Topic</button>'
                        ;
                    }else{
                        echo'<a href="#" class="btn btn-primary disabled mb-1">Add Topic</a>';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-start mt-4">
            <div class="col-6">
            <h6 class="card-title">Topics</h6>
            </div>

            <div class="col text-center mt-2">
            <h6 class="card-title">Replies</h6>
            </div>

            <div class="col text-center mt-2">
                <h6 class="card-title">Views</h6>
            </div>

            <div class="col text-center mt-2">
                <h6 class="card-title">Activities</h6>
            </div>
        </div>
    </div>


    <div class="container my-2">
        <div class="row ">
            <!-- iterating for loop -->
            <?php
            $sql= "SELECT * FROM `main_content`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
              $id=$row['category_id'];
              $category=$row['category_name'];
              $username=$row['username'];
              $description=$row['category_description'];
              $replies = $row['replies'];
              $views = $row['views'];
              $activity = $row['time'];
              
              echo '   

                <div class="container mb-4">
                    <div class="row text-start ">
                        <div class="col-6">
                        <h5 class="main-title"><a href="threadslist.php?categoryid='.$id.'">'.$category.'</a></h5>
                        <p class="d-inline bg-danger text-white mb-0">'.$username.'</p>
                        <p class="card-text">'.substr($description,0,55).'...</p>
                        </div>

                        <div class="col text-center mt-4">
                            <p>'.$replies.'</p>
                        </div>

                        <div class="col text-center mt-4">
                            <p>'.$views.'</p>
                        </div>

                        <div class="col text-center mt-4">
                            <p>'.$activity.'</p>
                        </div>
                    </div>
                </div>
              ';
            }
          ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- INCLUDING FOOTER -->
    <?php include "partials/_footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>