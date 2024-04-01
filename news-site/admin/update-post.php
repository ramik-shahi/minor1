<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        

        <form action="save-updated.php" method="POST" enctype="multipart/form-data" autocomplete="off">

        <?php
        include "config.php";
        $id=$_GET['id'];
        $sql="SELECT * FROM post as p LEFT JOIN category as c on p.category=c.category_id WHERE post_id=$id";
        $result=mysqli_query($conn,$sql) or die('connection failed');
        while($rows=mysqli_fetch_assoc($result)){
        
        ?>


            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $rows['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $rows['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $rows['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    <?php  
                    $sql1='SELECT * FROM category';
                    $result1=mysqli_query($conn,$sql1);
                    while($row=mysqli_fetch_assoc($result1)){

                        if ($rows['category']==$row['category_id']){
                            $selected="SELECTED";

                        }
                        else{
                            $selected="";
                        }
                    
                    ?>
                    <option <?php echo $selected;?> value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>

                    <?php }?>
                   
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $rows['post_img'];?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $rows['post_img'];?>">
            </div>
            <?php }?>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
