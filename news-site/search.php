<?php include 'header.php'; ?>
    <div id="main-content" style="background-image: url('admin/upload/hand-drawn-old-newspaper-background_23-2149626707.jpg');">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                <?php
                    include "admin\config.php";
                    $search=$_GET['search'];
                    
                    $sql= "SELECT * FROM post LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author=user.user_id Where post.title LIKE '%{$search}%'";
                   $result=mysqli_query($conn,$sql);

                   

                    ?>
                  <h2 class="page-heading">Search : <?php if(mysqli_num_rows($result)>0) {echo $search;} else{ echo "NOT FOUND";} ?></h2>

                  <?php if(mysqli_num_rows($result)>0){

while($rows=mysqli_fetch_assoc($result)){ ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                            <a class="post-img" href='single.php?id=<?php echo $rows['post_id'] ?>'><img src="admin/upload/<?php echo $rows['post_img'];?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $rows['post_id'] ?>'><?php echo $rows['title']?></a></h3>
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
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $rows['post_id'] ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}
                    
                    ?>
                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
