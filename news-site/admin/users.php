<?php include "header.php";


if(!isset($_SESSION)){

  header('"location:http://localhost:8080/news-site/admin"');
}

if($_SESSION['role']==0){
    header("location:http://localhost:8080/news-site/admin/post.php");
}


$limit=2;



?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                         
                        <?php
                        if(isset($_GET['page'])){
                          $page=$_GET['page'];

                        }
                        else{
                          $page=1;
                        }

                        
                        $offset=($page-1)*$limit;

                        include "config.php";
                        $sql= "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset,$limit";
                        $result=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result)>0){

                        while($rows=mysqli_fetch_assoc($result)){


                        ?>
                         

                          <tr>
                              <td class='id'><?php echo $rows['user_id']; ?></td>
                              <td><?php echo $rows['first_name'].' '.$rows['last_name']; ?></td>
                              <td><?php echo $rows['username']; ?></td>
                              <td><?php 
                              if($rows['role']==1){
                                echo "ADMIN";
                              }
                              else{
                                echo "USER";
                              }
                               ?></td>
                              <td class='edit'><a href='update-user.php? id=<?php echo $rows["user_id"];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php? id=<?php echo $rows["user_id"];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                       <?php 
                         } }
                       ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>

                  <?php
                  
                  $sql_P='SELECT *  FROM user';
                  $result_P=mysqli_query($conn,$sql_P);
                  if(mysqli_num_rows($result_P)>0){
                   $page_no=ceil((mysqli_num_rows($result_P))/$limit);


                   $prev=$page-1;
                   $next=$page+1;

                   if($page!=1){
                    echo  "<li><a href='users.php?page=$prev'>Prev</a></li>";
                   }
                         
                 
                   
                   
                          
                    for($i=1;$i<=$page_no;$i++){
                           if($i==$page){
                            $active="active";
                           }
                           else{
                            $active="";
                           }
                         
                      
                       echo  "<li class= $active><a href='users.php?page=$i'>$i</a></li>";

                    }
                    if($page!=($page_no)){
                      echo  "<li><a href='users.php?page=$next'>Next</a></li>";
                     }
                      

                   
                  }
                  
            
               
                  
                  
                  ?>

                      
                      
                  </ul>
              </div>
          </div>
      </div>
  </div>

