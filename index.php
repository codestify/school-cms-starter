<?php  
require_once('function/functions.php'); 
getHeader();
?>
<!-- slider -->
<section class="slider-main">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php 
            $sr = 1;
            $select = "SELECT * FROM sliders";
            $query = mysqli_query($dbconnect, $select);
            while($row = mysqli_fetch_array($query)) { 
              $id = $row['slide_id']; ?>
              <li data-target="#carousel-example-generic" data-slide-to="<?= $sr++; ?>" class="<?php if($row['slide_id'] == $id){echo 'active';} ?>"></li>
            <?php }
           ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php
            $query = "SELECT * FROM sliders";
            $sqlQuery = mysqli_query($dbconnect, $query);
            while($row = mysqli_fetch_array($sqlQuery)) : ?>
              <div class="item <?php if($row['active_slider']==1){echo "active";} ?>">
                  <img data-animation="animated pulse" src="/storage/slider/<?= $row['slide_image']; ?>" alt="">
                  <div class="carousel-caption text-center">
                    <h3 data-animation="animated bounceInLeft"><?= $row['slide_title']; ?></h3>
                    <p data-animation="animated bounceInRight"><?= $row['slide_description']; ?></p>
                    <a data-animation="animated flipInX" href="#">Read More</a>
                  </div>
              </div>
          <?php endwhile; ?>
        </div>
        <!-- Controls -->
        <a class="left left-control" href="#" role="button" data-slide="prev">
        <img src="img/left-slider.png" class="img-responsive" alt="">
        </a>
        <a class="right right-control" href="#" role="button" data-slide="next">
        <img src="img/right-slider.png" class="img-responsive" alt="">
        </a>
    </div>
</section>   
<!-- / slider   -->
<!-- welcome message -->
<section class="welcome">
    <div class="container">
        <div class="col-sm-12 text-center">
            <div class="welcome-item">
                <?php 
                  $select = "SELECT * FROM posts WHERE post_cat_id='1' ";
                  $query = mysqli_query($dbconnect, $select);
                  $row = mysqli_fetch_array($query);
                 ?>
                 <h5><?php echo $row['post_title']; ?></h5>
                 <h4 class="title-school"><span><?php echo $row['post_subtitle']; ?></span></h4>
                 <p class="title-school"><?php echo html_entity_decode($row['post_details']); ?></p>
                 <a class="btn-create" href="<?= $row['post_btn_url']; ?>"><?= $row['post_btn_txt']; ?></a>
            </div>
        </div>
    </div>
</section>                              
<!-- / welcome message -->
<!-- latest news-->
<section>
  <div class="container">
      <div class="col-sm-12 text-center">
          <div class="controler">
               <div class="img-responsive pre"><img src="img/arrow-right.png" alt=""></div>
               <div class="title-school"> latest news </div>
               <div class="img-responsive next"> <img src="img/arrow-left.png" alt=""></div>
               <div class="clearfix"></div>
          </div>
      </div>
      <div class="clearfix"></div>
      <div class="succes-slider">
          <?php 
              $select = "SELECT * FROM news WHERE news_cat_id='1' ";
              $query = mysqli_query($dbconnect, $select);
              while($news = mysqli_fetch_array($query)) : ?>
          <div class="col-sm-4">
              <div class="success-item">
                  <div class="image-box">
                    <img class="img-responsive" src="/storage/admin/news/<?= $news['news_slider_image'];?>" alt="Image-1">
                      <h2><?= $news['news_title'];?></h2>
                  </div>
                  <div class="text-desc">
                      <h3><?= $news['news_title'];?></h3>
                      <p><?= $news['news_summary'];?></p>
                     <a href="/news-single.php?title=<?php echo urldecode($news['news_title']) ?>" class="btn"><?= $news['news_btn_text'];?></a>
                  </div>
              </div>
          </div><!--col-sm-4-main end-->
          <?php endwhile; ?>
      </div><!--succes-slider-->
  </div> <!--container end-->
</section>
<!-- / latest news -->  
<section class="section-default">
    <div class="container">
        <div class="col-sm-6">
            <div class="news-event">
                <h2>Announcements 2015-2016</h2>
                <div class="news-slick"> 
                    <?php 
                        $select = "SELECT * FROM news WHERE news_cat_id='2' ";
                        $query = mysqli_query($dbconnect, $select);
                        while($announce = mysqli_fetch_array($query)) : ?>
                       <div class="news-item">
                         <a href="#">
                           <div class="news-clock">
                              <?php 
                                  $date = explode('-',$announce['news_date']);
                                  $month = $date[1];
                                  $dateObj = DateTime::createFromFormat('!m', $month);
                                  $monthName = $dateObj->format('F');
                                  $day = $date[2]; 
                              ?>
                               <h4><?php echo $monthName; ?></h4>
                               <h3><?php echo $day; ?></h3>
                           </div>
                           <div class="news-details">
                               <p><?= $announce['news_details'] ?></p>
                           </div>
                           <div class="clearfix"></div>
                         </a>
                       </div><!--news-item end-->
                    <?php endwhile; ?>
                 </div>
                  <a href="#" class="news-info"><span>read more</span><i class="fa fa-angle-right"></i></a>
            </div> <!--news-event end-->
        </div><!--col-sm-6 end-->

        <div class="col-sm-6">
            <div class="news-event">
                 <h2>Upcoming Events</h2> 
                  <div class="news-right">
                      <?php 
                          $select = "SELECT * FROM news WHERE news_cat_id='3' ";
                          $query = mysqli_query($dbconnect, $select);
                          while($event = mysqli_fetch_array($query)) : ?>
                          <div class="right-item">
                             <a href="#" style="display: flex; align-items: center">
                                  <div class="news-clockr">
                                      <img class="img-responsive" style="width: 100px; height: auto" src="/storage/admin/events/<?= $event['news_image']; ?>" alt="">
                                  </div>
                                  <div class="news-detailsr">
                                     <h5><?= $event['news_date']; ?></h5>
                                     <p><?= $event['news_details']; ?> ...</p>
                                  </div>
                                  <div class="clearfix"></div>
                              </a>
                          </div><!--news-item end-->
                      <?php endwhile; ?>
                  </div><!--news-right end-->   
                <a href="#" class="news-info"><span>read more</span><i class="fa fa-angle-right"></i></a>
            </div> <!--news-event end-->
         </div><!--col-sm-6 end-->
    </div>
</section>   
<!-- photo slider -->
<section>
    <div class="container">
        <div class="col-sm-12 text-center">
            <div class="footer-control">
                 <div class="img-responsive pre"><img src="img/arrow-right.png" alt=""></div>
                 <div class="title-school"> photos </div>
                 <div class="img-responsive next"> <img src="img/arrow-left.png" alt=""></div>
                 <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>  
        <div class="footer-slick">
        <?php 
              $select = "SELECT * FROM gallery";
              $query = mysqli_query($dbconnect, $select);
              while($pslider = mysqli_fetch_array($query)) : ?>
              <div class="col-sm-4"><!--col-sm-4 start-->
                  <div class="footer-item">
                      <div class="port-1 effect-2">
                          <div class="image-box">
                              <img src="/storage/gallery/<?= $pslider['pslide_image']; ?>" alt="Image-2">
                          </div>
                          <div class="text-desc">
                            <h3><?= $pslider['pslide_title']; ?></h3>
                              <p><?= $pslider['pslide_details']; ?></p>
                            <a href="#" class="btn"><?= $pslider['pslide_btn_text']; ?></a>
                          </div>
                      </div>
                  </div>
              </div><!--col-sm-4 end-->
          <?php endwhile; ?>
      </div><!--footer-slick-->
    </div>
</section> 
<!-- /photo slider -->

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
                   <li style="padding-bottom: 0px;"><a href=""><img class="img-responsive" src="/storage/general/<?= $row['finfo_image']; ?>" alt=""></a></li>
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
    <li>
        <a href="<?= $row['social_link']; ?>" class="twitter"><i class="fa fa-<?= $row['social_fa_class']; ?>"></i></a>
    </li>
<?php endwhile; ?>
</ul>   
<!-- /Social Nav-->
  <!-- Add your site or application content here -->
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.enllax.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
