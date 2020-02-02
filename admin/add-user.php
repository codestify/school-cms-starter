<?php require_once('functions/admin-functions.php');
    needLogIn();
    if($_SESSION['role'] <= 2) { 
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    //insert logic
    if(isset($_POST['insert'])){
      $Name = $_POST['name'];
      $Email = $_POST['email'];
      $Phone = $_POST['phone'];
      $Username = $_POST['username'];
      $Password = md5($_POST['password']); 
      $Role = $_POST['role'];
      $img = $_FILES['img'];
      $imgName = "User-".time()."-".rand(1000, 10000000).".".pathinfo($img['name'],PATHINFO_EXTENSION);
      //img name.path
      if(!empty($Name && $Email && $Username && $Password && $Role)){
        $insert = "INSERT INTO tbl_user(name, phone, email, username, password, role_id, image) 
        VALUES('$Name','$Phone','$Email','$Username','$Password','$Role','$imgName')";
        $insertQuery = mysqli_query($dbconnect, $insert);
        if($insertQuery){
          move_uploaded_file($img['tmp_name'], 'uploads/'.$imgName);
          $msg = '<span id="message">Insertion Successfuly</span>';
          header("Location:all-user.php"); //redirect
        }else{
          $msg = '<span id="message">Insertion Failed!</span>';
        }
      }else{
        $msg = '<span id="message">Pleas enter your name, email, username, password and role id!</span>';
      }
    }
?>
<div class="col-md-12">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                User Registration 
                <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg;} ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="phone" value="+880">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="username">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Re-Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="repass" disabled> 
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">User Role</label>
            <div class="col-sm-4">
              <select class="form-control select_cus" name="role">
                  <option value="" selected>Select User Role</option>
                  <?php 
                    $query = "SELECT * FROM tbl_user_role";
                    $sqlQuery = mysqli_query($dbconnect, $query);
                    while($row = mysqli_fetch_array($sqlQuery)) : ?>
                      <option value="<?= $row['role_id']; ?>"><?= $row['role_name']; ?></option>
                    <?php endwhile; ?>
              </select> 
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">User Photo</label>
            <div class="col-sm-8">
              <input type="file" name="img">
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="insert" class="btn btn-sm btn-primary">REGISTRATION</button>
      </div>
    </div>
    </form>
</div><!--col-md-12 end-->
<?php
	 getAdminFooter();
  }else{//if not role <=1
    echo "Access Denied!";
  }
?>