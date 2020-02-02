<?php
    require_once('functions/admin-functions.php'); 
    needLogIn();
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    //set value
    $id = $_REQUEST['sliderId'];
    if(!empty($_POST)){
      $title = input_filter($_POST['title']);
      $description =input_filter($_POST['description']);
      $btnText = input_filter($_POST['btnText']);
      $btnUrl = input_filter($_POST['btnUrl']);
      $image = $_FILES['slideImg'];
      $imageName = "slide-".time()."-".rand(1000,100000).".".pathinfo($image['name'], PATHINFO_EXTENSION);
      $slideActive = $_POST['active_slider'];

      if(!empty($title &&  $description && $image)){
        $select = "UPDATE sliders SET slide_title='$title', slide_description='$description', slide_btn_text='$btnText', slide_btn_url='$btnUrl', slide_image='$imageName', active_slider='$slideActive' WHERE slide_id='$id' ";
        $query = mysqli_query($dbconnect, $select);
        if($query){
          move_uploaded_file($image['tmp_name'], storage('slider/').$imageName);
           $msg = '<span id="message">Slider Update Successfuly</span>';
          header('Location:all-sliders.php'); //redirect
        }else{
          $msg = '<span id="message">Slider Update Failed!</span>';
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
                Edit Sliders
               <span id="massages" class="text-danger"> <?php if(isset($msg)){echo $msg; } ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-th"></i> All Slider</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <?php 
            //for value set
            $query = "SELECT * FROM sliders WHERE slide_id='$id' ";
            $sqlQuery = mysqli_query($dbconnect, $query);
            $row = mysqli_fetch_array($sqlQuery);
           ?>
          <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title" id="title" value="<?= $row['slide_title']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="description" id="desc" rows="8"><?= $row['slide_description']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="btn_text" class="col-sm-3 control-label">Slide Button Text</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btnText" id="btn_text" value="<?= $row['slide_btn_text']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="btn_url" class="col-sm-3 control-label">Button URL</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="btnUrl" id="btn_url" value="<?= $row['slide_btn_url']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-8">
              <img height="100" src="/storage/slider/<?= $row['slide_image']; ?>" alt="image">
              <input type="file" name="slideImg" value="/storage/slider/<?= $row['slide_image']; ?>" style="margin-top: 10px;" />
            </div>
          </div>
          <div class="form-group">
            <label for="active_slider" class="col-sm-3 control-label">Active Slider</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="active_slider" id="active_slider" value="<?= $row['active_slider']; ?>">
              <p class="text-danger" style="margin-top:5px;padding-left: 10px;">Caution: 1 means Active. Only one slide can active (1) and other all slider must zero(0) </p>
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="slider" class="btn btn-sm btn-primary">UPDATE Slider</button>
      </div>
    </div>
    </form>

</div><!--col-md-12 end-->
<?php
   getAdminFooter();
?>