<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    getAdminHeader();
    getAdminSidebar(); 
    getBreadcrum(); 
    //set value
    $id = $_REQUEST['curriculam_id']; 
      //for value set
    $select = "SELECT * FROM posts WHERE post_id='$id' ";  
    $query = mysqli_query($dbconnect, $select);
    $post = mysqli_fetch_array($query);
    //for update
    if(!empty($_POST)){
      $title = input_filter($_POST['title']);
      $details = input_filter($_POST['details']);
    
      if(!empty($title && $details )){
        $select = "UPDATE posts SET post_title='$title', post_details='$details' WHERE post_id='$id' ";
        $query = mysqli_query($dbconnect, $select); 
        if($query){
           $msg = '<span id="message">Curiculam Article Update Successfuly</span>'; 
           header('Location: curriculam-content.php'); //redirect
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
               Edit Curriculam Articel
               <span id="massages" class="text-danger"> <?php if(isset($msg)){echo $msg; } ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-th"></i> Curriculam Articel</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title" value="<?= $post['post_title']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="details" rows="8"><?= $post['post_details']; ?></textarea>
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" class="btn btn-sm btn-primary">Update Curriculam Articel</button>
      </div>
    </div>
    </form>
</div><!--col-md-12 end-->
<?php
   getAdminFooter();
?>