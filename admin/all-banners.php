<?php
	require_once('functions/admin-functions.php');
  needLogIn();
  if($_SESSION['role'] <=2){
	getAdminHeader();
  getAdminSidebar();
  getBreadcrum();
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                  All Banners
             </div>
             <div class="col-md-3 text-right">
                <a href="" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-plus-circle"></i> Add Banner</a>  
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">      
          <table class="table table-responsive table-striped table-hover table_cus">
              <thead class="table_head">
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Image</th>
                    <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM banners";
                  $sqlQuery = mysqli_query($dbconnect, $query);
                  while($row = mysqli_fetch_array($sqlQuery)) : ?>
                  <tr>
                      <td><?= $row['banner_title']; ?></td>
                      <td><?= $row['banner_subtitle']; ?></td>
                      <td>
                        <img src="uploads/<?= $row['banner_image']; ?>" width="200" height="100" alt="">
                      </td>
                      <td>
                          <a href="edit-banner.php?id=<?= $row['banner_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                      </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
          </table>
      </div>
      <div class="panel-footer">
        <div class="col-md-4">
            <a href="#" class="btn btn-sm btn-warning">EXCEL</a>
            <a href="#" class="btn btn-sm btn-primary">PDF</a>
            <a href="#" class="btn btn-sm btn-danger">SVG</a>
            <a href="#" class="btn btn-sm btn-success">PRINT</a>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-right">
            <nav aria-label="Page navigation">
              <ul class="pagination pagina_cus">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
        <div class="clearfix"></div>

      </div>
    </div>
</div><!--col-md-12 end-->

<script>
    function confirmation() {
      return confirm('Are you sure you want to do this?');
    }
</script>
<?php
	 getAdminFooter();
  }else{ //if not session <=1
    echo "Access Denied!";
  }
?>          