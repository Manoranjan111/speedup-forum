<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/img/fav-icon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css"/>
        <style>
            .container{
                min-height: 100vh;
            }
        </style>
     <script  src="https://kit.fontawesome.com/53fb958445.js" crossorigin="anonymous"></script>

    <title>iDescus</title>
</head>

<body>
    <?php 
  include "partials/_header.php";
  include "partials/_dbconnect.php";
  $search=$_GET['search'];
  $sql= "SELECT * FROM main_content WHERE MATCH (category_name,category_description) against('$search')";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $title=$row['category_name'];
    $description=$row['category_description'];
    $threadid=$row['category_id'];
    $url="threadslist.php?categoryid=".$threadid ;
    echo'
      <div class="container">
        <h1 class="text-center h2 my-2 ">Search result for "<em>'.$_GET['search'].'</em>"</h1>';
        if($title == null || $description == null){
            echo '<div class="alert alert-danger" role="alert">No result found</div>';
        }else{
            echo'<div class="card-body py-0">
            <a class="card-title h3 text-dark" href="'.$url.'">'.$title.'</a>
            <p class="card-text my-2">'.$description.'</p>
        </div>';
        }

       echo'   
      </div>';
  }

?>

<!-- INCLUDING FOOTER -->
     <?php include "partials/_footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>