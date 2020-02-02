<?php require_once('functions/admin-functions.php');
    needLogIn();
    getAdminHeader(); 
    getAdminSidebar();
    getBreadcrum();
    //set value
    $id = $_REQUEST['editId'];
    //update
    if(isset($_POST['update'])){
      $Name = input_filter($_POST['name']);
      $Phone = input_filter($_POST['phone']);
      $Email = input_filter($_POST['email']);
      //$Username = input_filter($_POST['username']);
      $Password = md5($_POST['password']);
      $Role = input_filter($_POST['role']);
      $img = $_FILES['img'];
      $imgName = "User-".time()."-".rand(1000,10000000).".".pathinfo($img['name'],PATHINFO_EXTENSION);
      //img name.path
      if(!empty($Name && $Email && $Password &&  $Role)){
        $update = "UPDATE tbl_user SET name='$Name', phone='$Phone', email='$Email', password='$Password', role_id='$Role', image='$imgName' WHERE id='$id' ";
        $updateQuery = mysqli_query($dbconnect, $update);

        if($updateQuery){
          move_uploaded_file($img['tmp_name'], 'uploads/'.$imgName);
          $msg = '<span id="message">Update Successfuly</span>';
          header('Location:view-user.php?viewId='.$id); //redirect
        }else{
          $msg = '<span id="message">Update Failed!</span>';
        }
      }else{
        $msg = '<span id="message">Input Field must not be empty!</span>';
      }
    }
    //data filtering function
    function input_filter($data){
      $data = trim($data);
      $data = htmlentities($data, ENT_QUOTES);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
<style>
  .edit-photo{
      padding: 4px;
      border-radius: 3px;
      border: 1px solid $ddd;
      cursor: pointer;
  }
  .edit-photo:hover{
      transform: scale(5);
    }
</style>
<div class="col-md-12">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                Edit User Information
                <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg; } ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <?php 
            //for value set
            $query = "SELECT * FROM tbl_user WHERE id='$id' ";
            $sqlQuery = mysqli_query($dbconnect, $query);
            $row = mysqli_fetch_array($sqlQuery);
           ?>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="phone" value="<?= $row['phone']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" value="<?= $row['email']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="username" value="<?= $row['username']; ?>" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password"/>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">User Role</label>
            <div class="col-sm-4">
              <select class="form-control select_cus" name="role">
                <?php 
                  $roleQuery = "SELECT * FROM tbl_user_role";
                  $roleSqlQuery = mysqli_query($dbconnect, $roleQuery);
                  while($role = mysqli_fetch_array($roleSqlQuery)) : ?>
                  <option value="<?= $role['role_id']; ?>" <?php if($row['role_id'] == $role['role_id'] ){echo "selected" ;}?> > <?= $role['role_name']; ?> </option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-8">
              <?php 
                  $imageQuery = "SELECT * FROM tbl_user WHERE id='$id' ";
                  $imageSqlQuery = mysqli_query($dbconnect, $imageQuery);
                  $image = mysqli_fetch_array($imageSqlQuery);  ?>
              <img height="100" src="uploads/<?= $image['image']; ?>" alt="image">
              <input type="file" value="<?= $image['image']; ?>" name="img" style="margin-top: 10px;">
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="update" class="btn btn-sm btn-primary">UPDATE</button>
      </div>
    </div>
    </form>
</div><!--col-md-12 end-->
<?php getAdminFooter();?>