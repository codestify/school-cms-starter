<?php
	require_once('functions/admin-functions.php');
    getAdminHeader();
    getAdminSidebar();
    getBreadcrum();
    $search = $_POST['search'];
?>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                User Information
             </div>
             <div class="col-md-3 text-right">
                <!-- <a href="add-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add User</a> -->
            </div>
            <div class="clearfix"></div>
        </div>
      <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
                <thead class="table_head">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="hidden-xs">Username</th>
                        <th class="hidden-xs">User-Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    //$id = $_GET['searchid'];
                    $search = $_POST['search'];
                    $query = "SELECT * FROM tbl_user NATURAL JOIN tbl_user_role WHERE name LIKE '%$search%' OR email LIKE '$search' OR phone LIKE '$search' ";
                    $sqlQuery = mysqli_query($dbconnect, $query);
                    while($row = mysqli_fetch_array($sqlQuery)) : ?>
                    <tr>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td class="hidden-xs"><?= $row['username']; ?></td>
                        <td class="hidden-xs"><?= $row['role_name']; ?></td>
                        <td>
                          <a href="view-user.php?viewId=<?= $row['id']; ?>"><i class="fa fa-eye fa-lg"></i></a>
                          <a href="edit-user.php?editId=<?= $row['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                          <a href="delete-user.php?deleteId=<?= $row['id']; ?>" onclick="return confirmation()"><i class="fa fa-trash fa-lg"></i></a>
                         </td>
                    </tr>
                      <?php  endwhile; ?>

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
<!-- search -->
<div class="col-md-6 col-md-offset-3">
     <form action="">
        <div class="form-group">
        <label for="search">Search</label>
            <input type="search" name="search" class="form-control" id="search" placeholder="Search user by id or username or name or email or phone" /><br>
            <a href="#" class="btn btn-primary">Search</a>
        </div>
    </form>
</div>
<?php
	getAdminFooter();
?>          