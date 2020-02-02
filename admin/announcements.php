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
                  Announcements
             </div>
             <div class="col-md-3 text-right">
                <a href="add_announcement.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Announcement</a>
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
              <thead class="table_head">
                <tr>
                    <th>Details</th>
                    <th class="hidden-xs">Date</th>
                    <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM news WHERE news_cat_id='2' ";
                  $sqlQuery = mysqli_query($dbconnect, $query);
                  while($row = mysqli_fetch_array($sqlQuery)) : ?>
                  <tr>
                      <td><?= substr($row['news_details'],0, 80); ?> ...</td>
                      <td><?= $row['news_date']; ?> ...</td>
                      <td>
                          <a href="edit-announcements.php?announce_id=<?= $row['news_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                          <a href="delete-announcement.php?announce_id=<?= $row['news_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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