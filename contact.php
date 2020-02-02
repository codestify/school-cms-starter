<?php  
  require_once('function/functions.php'); 
  getHeader(); 
  //for message insert
  $name = $email = $subject = $massage = ""; 
  $name_error =  $email_error = $subject_error =  $message_error = "";
  if(!empty($_POST)){
    //name validation
    if(empty($_POST['name'])){
      $name_error = "Name is required";
    }else{
      $name = input_filter($_POST['name']);
      if(!preg_match("/^[A-Za-z. ]*$/", $name)){
        $name_error = "Only letter , white space and dot are allowed";
      }
    }
    //email validation
    if(empty($_POST['email'])){
      $email_error = "Email is required";
    }else{
      $email = input_filter($_POST['email']);
      if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)){
        $email_error = "Invalid email format";
      }
    }
    //subject validation
    if(empty($_POST['subject'])){
      $subject_error = "Subject is required";
    }else{
      $subject =input_filter($_POST['subject']);
      if(!preg_match("/^[A-Za-z. ]*$/", $subject)){
        $subject_error = "Only letter , white space and dot are allowed";
      }
    }
    //message validation
    if(empty($_POST['subject'])){
      $message_error = "Massage is required";
    }else{
      $massage = input_filter($_POST['massage']);
      if(!preg_match("/^[A-Za-z. ]*$/", $massage)){
        $message_error = "Only letter , white space and dot are allowed";
      }
    }

    if(!empty($name && $email && $subject && $massage)){
      $select = "INSERT INTO comments(comment_name, comment_email, comment_subject, massage)
      VALUES('$name', ' $email', '$subject', '$massage')";
      if(!$name_error && !$email_error && !$subject_error && !$message_error){
         $query = mysqli_query($dbconnect, $select);
        if($query){
          $msg = '<span id="massages" class="text-danger">Your massage has been sent successfully!</span>';
        }else{
           $msg = '<span id="massages" class="text-danger">Massage sent faild!</span>';
        }
      }else{
        $msg = '<span id="massages" class="text-danger">Invalid data!</span>';
      }

    }else{
      $msg = '<span id="massages" class="text-danger">All input field must not be empty!</span>';
    }
  }
  //data filtering function
    function input_filter($data){
      $data = trim($data);
      $data = htmlentities($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
<?php 
  $select = "SELECT * FROM banners WHERE banner_cat_id='5' ";
  $query = mysqli_query($dbconnect, $select);
  $row = mysqli_fetch_array($query);
 ?>
<section class="academic-banner" style="background-image: url(admin/uploads/<?= $row['banner_image']; ?>);">
  <div class="about-opacity">
     <div class="container">
         <h2><?= $row['banner_title']; ?></h2>
         <p><?= $row['banner_subtitle']; ?></p>
     </div> 
  </div>
</section>
<!-- / banner -->
<?php
  getBreadcrumb();
?>
<!--about us page-->        
<section>
  <div class="container">
      <div class="col-sm-3">
          <div class="widget-education">
              <ul>
                  <li><a href="#">about us</a></li>
                  <li><a href="#">Ascent Group</a></li>
                  <li><a href="#">History</a></li>
                  <li><a href="#">Aims and Vision</a></li>
                  <li><a href="#">Our Campuses</a></li>
                  <li><a href="#">Educational Philosophy</a></li>
                  <li><a href="#">Employment</a></li>
                  <li><a href="#">Scholastica Alumni Association</a></li>
                  <li><a href="#">News and Updates</a></li>
              </ul>
          </div>
      </div>
      <!-- contact page content -->
      <div class="col-sm-9">
        <article>
          <h1>Contact Us</h1> 
          <p>For any questions or comments please write to us directly:  </p>
          <span id="massages" class="text-danger"><?php if(isset($msg)){echo $msg;} ?></span>
        </article>
          <div class="contact-us">
             <form action="" method="post" id="contact">
                <div class="col-sm-6 pl0">
                  <div class="form-group">
                      <input type="text" id="name" name="name" placeholder="Full Name" />
                      <span class="error"><?php if(isset($name_error)) {echo $name_error;} ?></span>
                  </div><!--form group-->
                  <div class="form-group">
                      <input type="email" id="email" name="email" placeholder="Email" />  
                      <span class="error"><?php if(isset($email_error)){echo $email_error;} ?></span>        
                  </div><!--form group-->
                  <div class="form-group">
                      <input type="text" id="subject" name="subject" placeholder="Subject" />
                      <span class="error"><?php if(isset($subject_error)){echo $subject_error;} ?></span> 
                  </div><!--form group-->
                </div>
                <div class="col-sm-6 pr0">
                     <textarea id="massage" name="massage"  rows="7" placeholder="Type Message"></textarea>
                     <span class="error"><?php if(isset($message_error)){echo $message_error;} ?></span> 
                    <!-- submit button -->
                    <input type="submit" id="submit" name="sent" value="Sent Message">  
                </div>
             </form>
          </div>
      </div>
      <!-- / contact page content -->
  </div>
</section>
<!-- footer   -->
<footer>
 <div class="container">
   <div class="col-sm-3">
      <?php 
        $select = "SELECT * FROM footer_info WHERE finfo_cat_id='1' ";
        $query = mysqli_query($dbconnect, $select);
        $row = mysqli_fetch_array($query);
      ?>
       <div class="footer-details">
           <h2><?= $row['finfo_title']; ?></h2>
           <ul>
               <li><?= html_entity_decode($row['finfo_address_one']); ?></li>
               <li><?= html_entity_decode($row['finfo_address_two']); ?></li>
               <li><?= html_entity_decode($row['finfo_address_three']); ?></li>
                <li>
                <?php 
                  $social = "SELECT * FROM social";
                  $squery = mysqli_query($dbconnect, $social);
                  while($srow = mysqli_fetch_array($squery)):
                ?>
                  <b><a href="<?= $srow['social_link']; ?>"><i class="fa fa-<?= $srow['social_fa_class']; ?>"></i></a></b>
                <?php endwhile; ?>
                </li>
           </ul>
       </div>
   </div><!--col-sm-3 end-->
   <!-- campus address  -->
    <?php 
        $select = "SELECT * FROM footer_info WHERE finfo_cat_id='2' LIMIT 0,2; ";
        $query = mysqli_query($dbconnect, $select);
        while($crow = mysqli_fetch_array($query)) :
      ?>
   <div class="col-sm-3">
       <div class="footer-details">
           <h2><?= $crow['finfo_title']; ?></h2>
           <ul>
               <li><?= html_entity_decode($crow['finfo_address_one']); ?></li>
               <li><?= html_entity_decode($crow['finfo_address_two']); ?></li>
               <li><?= html_entity_decode($crow['finfo_address_three']); ?></li>
           </ul>
       </div>
   </div><!--col-sm-3 end-->
  <?php endwhile; ?>
<!-- /campus address  -->
   <div class="col-sm-3">
       <div class="footer-details">
        <?php 
          $select = "SELECT * FROM footer_info WHERE finfo_cat_id='3' ";
          $query = mysqli_query($dbconnect, $select);
          $row = mysqli_fetch_array($query);
        ?>
       <!-- associated -->
       <h2><?= $row['finfo_title']; ?></h2>
       <ul>
           <li style="padding-bottom: 0px;"><a href=""><img class="img-responsive" src="/storage/gallery/<?= $row['finfo_image']; ?>" alt=""></a></li>
           <li style="padding-bottom: 0px;"><?= html_entity_decode($row['finfo_address_one']); ?></li>
       </ul>
         <!-- member of   -->
        <?php 
          $select = "SELECT * FROM footer_info WHERE finfo_cat_id='4' ";
          $query = mysqli_query($dbconnect, $select);
          $row = mysqli_fetch_array($query); ?>
           <h2><?= $row['finfo_title']; ?></h2>
           <ul>
               <li style="padding-bottom: 0px;"><?= html_entity_decode($row['finfo_address_one']); ?></li>
           </ul>
       </div>
   </div><!--col-sm-3 end-->
 </div>  
 <div class="back_to_top"><img src="img/target.png" alt="target"></div>
</footer> 
<!-- /footer -->
<!-- Social Nav -->
<ul class="social-nav model-0">
  <?php 
    $select = "SELECT * FROM social";
    $query = mysqli_query($dbconnect, $select);
    while($row = mysqli_fetch_array($query)):
  ?>
  <li><a href="<?= $row['social_link']; ?>" class="twitter"><i class="fa fa-<?= $row['social_fa_class']; ?>"></i></a>
  </li>
<?php endwhile; ?>
</ul>   
<!-- /Social Nav-->
  <!-- Add your site or application content here -->
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/contact-validation.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.enllax.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
   <script>
        $(document).ready(function(){
          $("#massages").show();
          setTimeout(function() {
           $("#massages").hide(); 
          }, 5000);
        });
    </script>
</body>
</html>
