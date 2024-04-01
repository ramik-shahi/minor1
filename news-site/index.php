<style> 
#main-content{
    padding: 30px 0;
    min-height: 750px;
}

#main-content .post-container{
    background-color: #fff;
    padding: 25px;
    box-shadow: 0 0px 0px rgba(0, 0, 0, 0.13);
}


   

#main-content .post-content{
    border-bottom: 1px solid #d1d1d1;
    padding: 0 0 30px;
    margin-bottom:30px;
}

#main-content .post-content img{
  width: 100%;
}

#main-content .post-content .post-img{
  border: 3px solid #e7e7e7;
  display: block;
  height: 145px;
  overflow: hidden;
  transition: border .3s;
}
#main-content .post-content .post-img:hover{
  border: 3px solid #1e90ff;
}
#main-content .post-content .inner-content{
    /* border: 1px solid #000; */
}

#main-content1 .post-content h3{
    font-size: 21px;
    line-height: 28px;
    font-weight: 600;
    margin: 0 0 7px;
    color: #333;

}
#main-content .post-content h3 a{
    color: #1e90ff;
    transition:all 0.3s;
}
#main-content .post-content h3 a:hover{
    color:#333;
}

#main-content .post-content .post-information span{
    color: #606060;
    font-size: 12px;
    text-transform: capitalize;
    margin: 0 5px 5px 0;
    display: inline-block;
}

#main-content .post-content .post-information i{
    color: #1e90ff;
    margin-right: 1px;
}

#main-content .post-content .post-information a{
    color: #606060;
    text-decoration: none;
}

#main-content .post-content .post-information a:hover{
    color: #333;
    text-decoration: none;
}

#main-content .post-content p,
#main-content .single-post p{
    color: #666;
    font-size: 14px;
    letter-spacing: 0.5px;
    margin:0 0 10px;
}

#main-content .post-content a.read-more{
    color: #fff;
    background-color:  #738291;
    font-size: 12px;
    text-transform: capitalize;
    padding: 3px 8px;
    border-radius: 2px;
    transition: all 0.3s;
}

#main-content .post-content a.read-more1:hover{
    color: #fff;
    background-color: #333;
}

#main-content .single-post{
    border: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

#main-content .single-post h3{
    color: #1e90ff;
}

#main-content .single-post .post-information{
    margin: 0 0 10px;
}
#main-content .single-post p{
    text-align: justify;
}

#main-content .single-post img.single-feature-image{
    width: 70%;
    margin: 0 auto 20px;
    display: block;
    border: 3px solid #e7e7e7;
}

#main-content .post-content a.read-more1{
    color: #fff;
    background-color: #738291;
    font-size: 12px;
    text-transform: capitalize;
    padding: 3px 8px;
    border-radius: 2px;
    transition: all 0.3s;}
   
    #main-content .post-content a.read-more1:hover{
    color: #fff;
    background-color:white;
    
    }
    

</style>

<?php include 'header.php'; 
$limit=4;
 if(isset($_GET['page'])){
    $page=$_GET['page'];

  }
  else{
    $page=1;
  }

  
  $offset=($page-1)*$limit;?>

    <div id="main-content" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0); background-image: url('admin/upload/hand-drawn-old-newspaper-background_23-2149626707.jpg');">
    
        <div class="container" style= 'box-shadow: 0 0px 0px rgba(0, 0, 0, 0);'>
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container1"     style=" background:#ffff;">

                    <?php
                    include "admin\config.php";

                    $sql="SELECT * FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id 
                    ORDER BY post.post_id DESC 
                    LIMIT $offset, $limit";
                    
                    // $sql= "SELECT * FROM post LEFT JOIN category ON post.category=category.category_id
                    // LEFT JOIN user ON post.author=user.user_id DESC LIMIT $offset,$limit";
                   $result=mysqli_query($conn,$sql);

                   if(mysqli_num_rows($result)>0){

                    while($rows=mysqli_fetch_assoc($result)){

                    ?>
                     <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href='single.php?id=<?php echo $rows['post_id'] ?>'><img src="admin/upload/<?php echo $rows['post_img'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">

                                    <div class="inner-content clearfix">
                                        <h3><a style="color:black;" href='single.php?id=<?php echo $rows['post_id'] ?>'><?php echo $rows['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?id=<?php echo $rows['category_id'] ?>'><?php echo $rows['category_name']?> </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='#'><?php echo $rows['username']?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $rows['post_date']?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($rows['description'],0,100)."..."?>
                                        </p>
                                        <a style=" background-color:  #7d7e7f" class='read-more1' href='single.php?id=<?php echo $rows['post_id'] ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                                    <?php }}?>
                    

                    

                        
                      
                      
                      
                      
                      
                      
                      
                      
                        
                        <ul class='pagination'>
                        <?php
                  
                  $sql_P='SELECT *FROM post';
                  $result_P=mysqli_query($conn,$sql_P);
                  if(mysqli_num_rows($result_P)>0){
                   $page_no=ceil((mysqli_num_rows($result_P))/$limit);


                   $prev=$page-1;
                   $next=$page+1;

                   if($page!=1){
                    echo  "<li><a href='index.php?page=$prev'>Prev</a></li>";
                   }
                         
                 
                   
                   
                          
                    for($i=1;$i<=$page_no;$i++){
                           if($i==$page){
                            $active="active";
                           }
                           else{
                            $active="";
                           }
                         
                      
                       echo  "<li class= $active><a href='index.php?page=$i'>$i</a></li>";

                    }
                    if($page!=($page_no)){
                      echo  "<li><a href='index.php?page=$next'>Next</a></li>";
                     }
                      

                   
                  }
                  
            
               
                  
                  
                  ?>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>

