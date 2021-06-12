<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>welcome to iDiscuss-Coding Forums</title>
</head>

<body>
     <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    


    <?php
        $id=$_GET['catid'];
        $sql= "SELECT * FROM `categories` WHERE category_id=$id";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $catname=$row['category_name'];
          $catdesc=$row['category_description'];
        }
        ?>
      
   

    <!-- category container start -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $catname; ?> News</h1>
            <?php
         $id=$_GET['catid'];
         $sql= "SELECT * FROM `threads` WHERE thread_cat_id=$id";
         $result=mysqli_query($con,$sql);
         $noResult=true;
         
         while($row=mysqli_fetch_assoc($result)){
            $noResult=false;
             $id=$row['thread_id'];
           $title=$row['thread_title'];
           $desc=$row['thread_desc'];
          $image=$row["image"];
          
           
         
          echo'<div class="media my-3">
            <img src="images/'.$image.'" width=50px; class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"><a href="thread.php?threadid='.$id.'">' .$title. '</a></h5>
               ' .substr($desc,0,100).'...
            </div>
    </div>';

         }
         if($noResult){
          echo '<div class="jumbotron jumbotron-fluid">
             <div class="container">
               <p class="display-4">No News Found</p>
               
             </div>
           </div>';
         }
?>
           
        </div>
    </div>




    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>