<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    if($_SESSION['role'] <= 2) {
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();

    //insert logic
    if(!empty($_POST)){
      $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
      $subtitle = filter_var($_POST['subtitle'], FILTER_SANITIZE_STRING);
      $summary = filter_var($_POST['summary'], FILTER_SANITIZE_STRING);
      $details = $_POST['details'];

      $btn_txt = filter_var($_POST['btn_txt'],FILTER_SANITIZE_STRING);
      $btn_url = filter_var($_POST['btn_url'], FILTER_SANITIZE_STRING);

      $slider_image = $_FILES['slider-image'];
      $banner_image = $_FILES['banner-image'];
      $main_image = $_FILES['main-image'];

      $slider_image_name = "latest-news-".time()."-".rand(1000, 1000000).".".pathinfo($slider_image['name'],PATHINFO_EXTENSION);
      $banner_image_name = "latest-news-".time()."-".rand(1000, 1000000).".".pathinfo($banner_image['name'],PATHINFO_EXTENSION);
      $main_image_name = "latest-news-".time()."-".rand(1000, 1000000).".".pathinfo($main_image['name'],PATHINFO_EXTENSION);
      $date = $_POST['lnews_date'];
      //img name.path
      if(!empty($title && $details && $summary && $slider_image && $banner_image)){
        $insert = "INSERT INTO news(news_title,news_subtitle,news_summary,news_details,news_btn_text,news_btn_url,news_image,news_slider_image, news_banner_image,news_date,news_cat_id)VALUES(' $title','$subtitle', '$summary','$details','$btn_txt','$btn_url','$main_image_name','$slider_image_name','$banner_image_name','$date','1')";

        $insertQuery = mysqli_query($dbconnect, $insert);
        if($insertQuery){
          move_uploaded_file($banner_image['tmp_name'], storage('admin/news').'/'. $banner_image_name);
          move_uploaded_file($slider_image['tmp_name'], storage('admin/news').'/'. $slider_image_name);
          move_uploaded_file($main_image['tmp_name'], storage('admin/news').'/'. $main_image_name);

          $msg = '<span id="message">Insertion Successfuly</span>';
          header('Location:latest-news.php'); //redirect 
        }else{
          $msg = '<span id="message">Insertion Failed!</span>';
        }
      }else{
        $msg = '<span id="message">Pleas enter your name, email, username, password and role id!</span>';
      }
    }
    //data filtering function

?>
<div class="col-md-12">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                Add Slider
               <span id="massages" class="text-danger"> <?php if(isset($msg)){echo $msg;} ?></span>
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
              <label for="" class="col-sm-3 control-label">Summary</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" name="summary">
              </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
                <textarea name="details" id="" class="form-control" cols="30" rows="10" style="resize: none"></textarea>
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
            <label for="" class="col-sm-3 control-label">Slider Image</label>
            <div class="col-sm-8">
              <input type="file" name="slider-image" />
            </div>
          </div>
          <div class="form-group">
              <label for="" class="col-sm-3 control-label">Banner Image</label>
              <div class="col-sm-8">
                  <input type="file" name="banner-image" />
              </div>
          </div>
          <div class="form-group">
              <label for="" class="col-sm-3 control-label">Main Image</label>
              <div class="col-sm-8">
                  <input type="file" name="main-image" />
              </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Date</label>
            <div class="col-sm-8">
              <input type="date" name="lnews_date" id="datepicker" />
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="lnews" class="btn btn btn-primary">Add Latest News</button>
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