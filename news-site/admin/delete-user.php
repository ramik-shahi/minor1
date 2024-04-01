<?php



include "config.php";

/* $sql="SELECT * FROM user";
$result2= mysqli_query($conn,$sql);
mysqli_num_rows($result2); */

  $id=$_GET['id'];
/* do{
$sql3="SELECT * FROM category join post on category.category_id=post.category WHERE author=$id AND post";
$result3=mysqli_query($conn,$sql3);
$row=mysqli_fetch_assoc($result3);

$sql2="UPDATE category join post on category.category_id=post.category set post=post-1 WHERE author=$id";
$result2=mysqli_query($conn,$sql2);
}while(mysqli_num_rows($result3)>0); */





 $sql="DELETE FROM user WHERE user_id='{$id}';";
 $sql.="DELETE FROM post WHERE author=$id;";
 


$result=mysqli_multi_query($conn,$sql) or die ("connection failde");
 
/* if(mysqli_query($conn,$sql)){
    header("location:http://localhost/news-site/admin/users.php");
}  */

header("location:http://localhost:8080/news-site/admin/users.php");


?>