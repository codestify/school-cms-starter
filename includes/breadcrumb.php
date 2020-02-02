<!-- breadcum  -->
<section style="padding-top: 15px;">
 <div class="container">
     <div class="col-sm-12">
         <div class="indicator">
         <ul>
             <li><a href="index.php">Home</a></li>
             <li><a href="#">/</a></li>
             <?php 
             		$link = explode('/',$_SERVER['PHP_SELF']);
             		$page = $link[1];
              ?>
             <li>
	             	<a href="<?php if($page == 'academics.php'){echo $page;} ?>">
	             		<?php 
	             				if($page == 'academics.php'){
	             					echo "Academics";
	             				}elseif($page == 'admission.php'){
												echo "Admission";
	             				}elseif($page == 'curriculam.php'){
												echo "Curriculam";
	             				}elseif($page == 'about.php'){
												echo "About";
	             				}elseif($page == 'contact.php'){
												echo "Contact";
	             				}elseif($page == 'news-single.php'){
	             				    echo "news";
                                }
	             		 ?>
	             </a>
           </li>
         </ul>
     </div>
     </div>
 </div>
</section>
<!-- breadcum       -->