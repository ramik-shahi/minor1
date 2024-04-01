<?php

include "config.php";

$id=$_GET['id'];

$sql="DELETE FROM post WHERE post_id=$id;";

$result=mysqli_multi_query($conn,$sql) or die ("connection failde");


    header("location:http://localhost:8080/news-site/admin/post.php");


?>