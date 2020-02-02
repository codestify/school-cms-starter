<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    //set value
    $id = $_GET['post_id'];
   //for value set
    $select = "SELECT * FROM posts WHERE post_cat_id='1' ";
    $query = mysqli_query($dbconnect, $select);
    $vrow = mysqli_fetch_array($query);

    //for update
    if(!empty($_POST)){
      $title = input_filter($_POST['title']);
      $sub_title = input_filter($_POST['sub_title']);
      $details = input_filter($_POST['details']);
      $btn_txt = input_filter($_POST['btn_txt']);
      $btn_url = input_filter($_POST['btn_url']);

      if(!empty($title AND $details)){
        $select = "UPDATE posts SET post_title='$title', post_subtitle='$sub_title', post_details='$details', post_btn_txt='$btn_txt', post_btn_url='$btn_url' WHERE post_id='$id' ";
        $query = mysqli_query($dbconnect, $select);
        if($query){
          //move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
           $msg = '<span id="message">Update Successfuly</span>';
          header('Location:welcome-messages.php'); //redirect
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
    <form class="form-horizontal" action="" method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                Edit Welcoem Message
                <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg; } ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-th"></i> Welcome Message</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title" id="title" value="<?= $vrow['post_title']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Subtitle</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="sub_title" id="title" value="<?= $vrow['post_subtitle']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="details" rows="8"><?= $vrow['post_details']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="btn_text" class="col-sm-3 control-label">Button Text</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btn_txt" id="btn_text" value="<?= $vrow['post_btn_txt']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="btn_url" class="col-sm-3 control-label">Button URL</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btn_url" id="btn_url" value="<?= $vrow['post_btn_url']; ?>">
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="welcome" class="btn btn-sm btn-primary">Udate Welcome Massage</button>
      </div>
    </div>
    </form>
</div><!--col-md-12 end-->
<?php
   getAdminFooter();
?>