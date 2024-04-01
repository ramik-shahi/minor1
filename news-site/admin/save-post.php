<?php
include "config.php";
session_start();

if(isset($_FILES['fileToUpload'])){
$error=array();
$file_name=$_FILES['fileToUpload']['name'];
$file_tmp=$_FILES['fileToUpload']['tmp_name'];
$file_size=$_FILES['fileToUpload']['size'];

$file_type=$_FILES['fileToUpload']['type'];
$break=explode('.',$file_name);
$ext=strtolower(end($break));
$extention=['jpg','png','jpeg'];

if(in_array($ext,$extention)===false){

    $error[]='please selected the img ';

}

if($file_size > 209715125){
    $error[]='uplode less than 2mb';
}

if(empty($error)){
    move_uploaded_file($file_tmp,"upload/".$file_name);

}

else{

    print_r($error);
    die('couldnot upload file');
}



}

$post_title=mysqli_real_escape_string($conn,$_POST['post_title']);
$postdesc=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);

 $auther=$_SESSION['user_id'];


 $date=date("d M ,y");




$sql="INSERT INTO post(title,description,category,post_date,author,post_img)VALUES('{$post_title}','{$postdesc}','{$category}','{$date}','{$auther}','{$file_name}');";

$sql.="UPDATE category set post=post+1 WHERE category_id='{$category}'; ";

if(mysqli_multi_query($conn,$sql)){
    $content = "Added  sucessfully";

    // Set a cookie with the content
    setcookie('redirect_content', $content, time() + 1, '/');
       // header("location:http://localhost:8080/news-site/admin/post.php");
      
   header('location:http://localhost:8080/news-site/admin/post.php');

}






?> 