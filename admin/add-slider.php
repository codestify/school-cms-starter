<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    if($_SESSION['role'] <= 2) {
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    //insert logic
    if(!empty($_POST)){
      $title = $_POST['title'];
      $subtitle = $_POST['subtitle'];
      $details = $_POST['details'];
      $btn_txt = $_POST['btn_txt'];
      $btn_url = $_POST['btn_url'];
      $image = $_FILES['image'];
      $image_name = "Slider-".time()."-".rand(1000, 1000000).".".pathinfo($image['name'],PATHINFO_EXTENSION);

      //img name.path
      if(!empty($title && $details && $image)){
        $insert = "INSERT INTO sliders(slide_title, slide_subtitle, slide_description, slide_btn_text, slide_btn_url, slide_image) VALUES(' $title','$subtitle','$details','$btn_txt','$btn_url','$image_name')";
        $insertQuery = mysqli_query($dbconnect, $insert);
        if($insertQuery){
          move_uploaded_file($image['tmp_name'], 'uploads/'.$image_name);
          $msg = '<span id="message">Insertion Successfuly</span>';
          header('Location:all-sliders.php'); //redirect 
        }else{
          $msg = '<span id="message">Insertion Failed!</span>';
        }
      }else{
        $msg = '<span id="message">Pleas enter your name, email, username, password and role id!</span>';
      }
    }
    //data filtering function
    function input_filters($data){
      $data = trim($data);
      $data = htmlentities($data, ENT_QUOTES); 
      $data = htmlspecialchars($data);
      return $data;
    }
?>
<div class="col-md-12">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                Add Slider
                <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg;} ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Subtitle</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="subtitle">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="details">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Button Text</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btn_txt">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Button Url</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btn_url">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-8">
              <input type="file" name="image" />
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="slider" class="btn btn btn-primary">Add Slide</button>
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