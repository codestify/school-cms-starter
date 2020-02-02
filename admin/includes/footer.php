	 		</div><!--admin-part end-->
         </div><!--row end-->
    </div><!--container-fluid end-->
    <div class="container-fluid footer_full">
    	<div class="container footer">
        	<div class="row">
            </div><!--row end-->
        </div><!--container end-->
    </div><!--container-fluid end-->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script>
      //$( function() {
      $("#datepicker").datepicker();

        $(document).ready(function(){
          $("#massages").show();
          setTimeout(function() {
           $("#massages").hide(); 
          }, 5000);
        });
    </script>
  </body>
</html>