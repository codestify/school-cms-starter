<?php
require_once('functions/admin-functions.php');
needLogIn();
getAdminHeader();
getAdminSidebar();
getBreadcrum();
//set value
$id = $_REQUEST['id'];
//update
if (!empty($_POST)) {
    $title = $_POST['title'];
    $address1 = $_POST['address_one'];
    $address2 = $_POST['address_two'];
    $address3 = $_POST['address_three'];
    $image = $_FILES['image'];
    $imageName = "footer-" . time() . "-" . rand(1000, 100000) . "." . pathinfo($image['name'], PATHINFO_EXTENSION);
    //img name.path
    if (!empty($title)) {
        $update = "UPDATE footer_info SET finfo_title='$title', finfo_address_one='$address1', finfo_address_two='$address2', finfo_address_three='$address3' WHERE finfo_id='$id' ";

        $update_img = "UPDATE footer_info SET finfo_title='$title', finfo_address_one='$address1', finfo_address_two='$address2', finfo_address_three='$address3', finfo_image='$imageName' WHERE finfo_id='$id' ";
        $select = "SELECT * FROM footer_info WHERE finfo_id='3'";

        if (!$select) {
            $updateQuery = mysqli_query($dbconnect, $update);
        } else {
            $updateQuery = mysqli_query($dbconnect, $update_img);
        }

        if ($updateQuery) {
            $existing_image = storage('general/') . $select['finfo_image'];
            if (file_exists($existing_image)) unlink($existing_image);
            move_uploaded_file($image['tmp_name'], storage('general/') . $imageName);
            $msg = '<span id="message">Update Successfuly</span>';
            header('Location:footer-info.php');
        } else {
            $msg = '<span id="message">Update Failed!</span>';
        }
    } else {
        $msg = '<span id="message">Input Field must not be empty!</span>';
    }
}
////data filtering function
//function input_filter($data)
//{
//    $data = trim($data);
//    $data = htmlentities($data, ENT_QUOTES);
//    $data = htmlspecialchars($data);
//    return $data;
//}

?>
    <style>
        .edit-photo {
            padding: 4px;
            border-radius: 3px;
            border: 1px solid $ ddd;
            cursor: pointer;
        }

        .edit-photo:hover {
            transform: scale(5);
        }
    </style>
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="col-md-9 heading_title">
                        Edit User Information
                        <span id="massages" class="text-danger"><?php if (isset($msg)) {
                                echo $msg;
                            } ?></span>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php
                    //for value set
                    $query = "SELECT * FROM footer_info WHERE finfo_id='$id' ";
                    $sqlQuery = mysqli_query($dbconnect, $query);
                    $row = mysqli_fetch_array($sqlQuery);
                    ?>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" value="<?= $row['finfo_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Address line one</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address_one"
                                   value="<?= $row['finfo_address_one']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Address line two</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address_two"
                                   value="<?= $row['finfo_address_two']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Address line three</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address_three"
                                   value="<?= $row['finfo_address_three']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-8">
                            <img height="100" src="/storage/general/<?= $row['finfo_image']; ?>" alt="image">
                            <input type="file" value="<?= $row['finfo_image']; ?>" name="image"
                                   style="margin-top: 10px;">
                            <p class="text-danger">Image only Associate School section</p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button type="submit" name="update" class="btn btn-sm btn-primary">UPDATE</button>
                </div>
            </div>
        </form>
    </div><!--col-md-12 end-->
<?php
getAdminFooter();
?>