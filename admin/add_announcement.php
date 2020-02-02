<?php
    require_once('functions/admin-functions.php');
    needLogIn();
    if($_SESSION['role'] <= 2) {
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    //insert logic
    if(!empty($_POST)){
      $details = input_filter($_POST['details']);
      $date = input_filter($_POST['annoucement_date']);
      //img name.path
      if(!empty($details && $date)){
        $insert = "INSERT INTO news(news_details, news_date, news_cat_id) VALUES('$details', '$date', '2')";
        $insertQuery = mysqli_query($dbconnect, $insert);
        if($insertQuery){
          $msg = '<span id="message">Insertion Successfuly</span>';
          header('Location:announcements.php'); //redirect 
        }else{
          $msg = '<span id="message">Insertion Failed!</span>';
        }
      }else{
        $msg = '<span id="message">Pleas enter details and Date</span>';
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
            <label for="" class="col-sm-3 control-label">Details</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="details">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 control-label">Date</label>
            <div class="col-sm-8">
              <input type="date" name="annoucement_date" id="datepicker" />
            </div>
          </div>
      </div>
      <div class="panel-footer text-center">
        <button type="submit" name="announcement" class="btn btn btn-primary">Add Announcement</button>
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