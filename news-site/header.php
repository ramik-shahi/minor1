<style> 

.active {
    background: #ff0000; /* Color for active category */
    font-weight: bold; /* Bold text for active category */
}</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<!-- HEADER -->
<div id="header-admin" style=" background-image: linear-gradient(to top, #a33d38, #9c3c43, #943e4c, #894053, #7e4258, #73445e, #674562, #5b4763, #4b4965, #3c4a62, #304a5c, #2a4954);">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="index.php"><img class="logo" src="images/NR.png"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1" style="margin-left: 873px; margin-top:35px;">
                        
                     <button class="btn" style="padding: 0px 13px;">  <a href="admin/index.php" class="admin-logout" style="color:black;">logIN</a></button> 
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar" style="background:#A33D38;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <ul class='menu'>
                <?php
                include "admin/config.php";
                 $sql="SELECT * FROM category WHERE post>0";
                 $result=mysqli_query($conn,$sql);

                 if(mysqli_num_rows($result)>0){

                  while($rows=mysqli_fetch_assoc($result)){
                    $categoryId = $rows['category_id'];
                        $categoryName = $rows['category_name'];
                    $activeClass = '';
                    if(isset($_GET['id']) && $_GET['id'] == $categoryId) {
                        $activeClass = 'active';
                    }
                ?>
          
                
                    <li class="<?php echo $activeClass; ?>"><a href='category.php?id=<?php echo $rows['category_id'] ?>'><?php echo $rows['category_name'];?></a></li>
                   
                    <?php }}?>
                        </ul>

                     
 

  
          </div>
        </div>

        <div class="search-box-container" style="background:#6187ac; margin-left: 817px; " >
        <!-- <h4>Search</h4> -->
        <form   style="padding: 0px;background:#6187ac;" class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- /Menu Bar -->
