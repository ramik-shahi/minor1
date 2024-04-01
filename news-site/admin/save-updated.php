<?php 
include 'config.php';

session_start();
if (empty($_FILES['new-image']['name'])){
    $name=$_POST['old-image'];
   

}

else{
$name=$_FILES['new-image']['name'];
$type=$_FILES['new-image']['type'];
$tmp_name=$_FILES['new-image']['tmp_name'];
$size=$_FILES['new-image']['size'];
$ext=explode('.',$name);
$ext2=strtolower(end($ext));
$extention=array('jepg','jpg','png');
$error=array();


if(in_array($ext2,$extention)==false){

    $error[]="error";

}

if($size<209715125){
    $error[]="error";

}
if(empty($error)){
    
   move_uploaded_file($file_tmp,"upload/".$file_name);
}


}

$id=$_POST['post_id'];
$post_title=mysqli_real_escape_string($conn,$_POST['post_title']);
$postdesc=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);

$sql="UPDATE category JOIN post ON category.category_id = post.category SET post=post-1 WHERE post>0 AND post_id= {$id} ; ";

$result=mysqli_query($conn,$sql);

$sql1="UPDATE post set title='{$post_title}',description='{$postdesc}',category='{$category}', post_img='{$name}'WHERE post_id=$id;";
$sql1.="UPDATE category set post=post+1 WHERE category_id='{$category}'; ";

if(mysqli_multi_query($conn,$sql1)){
    
   header("location:http://localhost:8080/news-site/admin/post.php");
   
}





?>