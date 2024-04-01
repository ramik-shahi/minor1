<?php include 'header.php'; ?>
    <div id="main-content" style="background-image: url('admin/upload/hand-drawn-old-newspaper-background_23-2149626707.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->

                    <div class="post-container">
                    <?php
                    include "admin\config.php";
                    $id=$_GET['id'];
                    
                    $sql= "SELECT * FROM post LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author=user.user_id WHERE post_id=$id" ;
                   $result=mysqli_query($conn,$sql);

                   if(mysqli_num_rows($result)>0){

                    while($rows=mysqli_fetch_assoc($result)){

                    ?>

                   
                        <div class="post-content single-post">
                            <h3>L<?php echo $rows['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $rows['category_name']?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $rows['username']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $rows['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src=admin/upload/<?php echo $rows['post_img']; ?> alt=""/>
                            <p class="description">
                            <?php echo $rows['description']?>
                            </p>
                        </div>
                        <?php }}?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
