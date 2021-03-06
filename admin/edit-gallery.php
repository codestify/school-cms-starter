<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    getAdminHeader();
    getAdminSidebar(); 
    getBreadcrum();
    //set value
    $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
      //for value set
    $select = "SELECT * FROM gallery WHERE pslide_id='$id'";
    $query = mysqli_query($dbconnect, $select);
    $gallery = mysqli_fetch_array($query);
    //for update
    if(!empty($_POST)){
      $title = input_filter($_POST['title']);
      $details = input_filter($_POST['details']);
      $image = $_FILES['gallery_image'];
      $imageName = "gallery-".time()."-".rand(1000,100000).".".pathinfo($image['name'], PATHINFO_EXTENSION);

        if(!empty($title && $details && $image)){
        $select = "UPDATE gallery SET pslide_title='$title', pslide_details='$details', pslide_image='$imageName' WHERE pslide_id='$id' ";
        $query = mysqli_query($dbconnect, $select);
        if($query){
            $existing_gallery_image = storage('gallery/') . $gallery['pslide_image'];
            if (file_exists($existing_gallery_image)) unlink($existing_gallery_image);

            move_uploaded_file($image['tmp_name'], storage('gallery/') . $imageName);
           $msg = '<span id="message">Gallery Item Update Successfuly</span>';
          header('Location:gallery.php'); //redirect
        }else{
          $msg = '<span id="message">Gallery Item Update Failed!</span>';
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
               Edit Upcomming Event
                <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg; } ?></span>
             </div>
             <div class="col-md-3 text-right">
                <a href="all-user.php" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-th"></i> Upcomming Event</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="title" value="<?= $gallery['pslide_title']; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label for="desc" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="details"><?= $gallery['pslide_details']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Image</label>
            <div class="col-sm-8">
              <img height="100" src="/storage/gallery/<?= $gallery['pslide_image']; ?>" alt="image">
              <input type="file" name="gallery_image" value="/storage/gallery/<?= $gallery['pslide_image']; ?>" style="margin-top: 10px;" />
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="gallery" class="btn btn-sm btn-primary">Udate Gallery Item</button>
      </div>
    </div>
    </form>
</div><!--col-md-12 end-->
<?php
   getAdminFooter();
?>