<?php   
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $cont_email=$_POST['email'];
    $cont_name=$_POST['name'];
    $cont_subject=$_POST['subject'];
    $cont_message=$_POST['message'];

    
   
            $sql="INSERT INTO `contact` (`contact_name`, `contact_email`, `contact_subject`,`contact_message`,`contact_time`) VALUES ( '$cont_name', '$cont_email','$cont_subject','$cont_message', current_timestamp())";
            $result=mysqli_query($con,$sql);
            if($result){
                header("Location:/News/contact.php?submitt=true");
            }
            else{
                echo 'Something went wrong!!Please try again later';
            }
       
    }
?>