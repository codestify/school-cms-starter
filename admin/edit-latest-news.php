<?php
require_once('functions/admin-functions.php');
needLogIn();
getAdminHeader();
getAdminSidebar();
getBreadcrum();
//set value
$id = $_REQUEST['news_id'];
//for value set
$select = "SELECT * FROM news WHERE news_id='$id' ";
$query = mysqli_query($dbconnect, $select);
$lnews = mysqli_fetch_array($query);

//    dd($lnews['news_slider_image']);
//for update
if (!empty($_POST)) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $sub_title = filter_var($_POST['sub_title'], FILTER_SANITIZE_STRING);
    $summary = filter_var($_POST['summary'], FILTER_SANITIZE_STRING);
    $details = $_POST['details'];
    $btn_txt = filter_var($_POST['btn_txt'], FILTER_SANITIZE_STRING);
    $btn_url = filter_var($_POST['btn_url'], FILTER_SANITIZE_STRING);


    $update_news_sql = "UPDATE news SET news_title='$title', news_subtitle='$sub_title', news_summary='$summary', news_details='$details', news_btn_text='$btn_txt', news_btn_url='$btn_url'";


    $slider_image = $_FILES['news_slider_image'];
    $banner_image = $_FILES['news_banner_image'];
    $main_image = $_FILES['news_image'];
    $news_storage_path = '/uploads/news';

    if (is_uploaded_file($slider_image['tmp_name'])) {
        $existing_slider_image = storage('admin/news/') . $lnews['news_slider_image'];
        if (file_exists($existing_slider_image)) unlink($existing_slider_image);

        $slider_image_name = "latest-news-" . time() . "-" . rand(1000, 1000000) . "." . pathinfo($slider_image['name'], PATHINFO_EXTENSION);

        move_uploaded_file($slider_image['tmp_name'], storage('admin/news/') . $slider_image_name);
        $update_news_sql .= ", news_slider_image='$slider_image_name'";
    }


    if (is_uploaded_file($banner_image['tmp_name'])) {
        $existing_banner_image = storage('admin/news/') . $lnews['news_banner_image'];
        if (file_exists($existing_banner_image)) unlink($existing_banner_image);

        $banner_image_name = "latest-news-" . time() . "-" . rand(1000, 1000000) . "." . pathinfo($banner_image['name'], PATHINFO_EXTENSION);

        move_uploaded_file($banner_image['tmp_name'], storage('admin/news/')  . $banner_image_name);
        $update_news_sql .= ", news_banner_image='$banner_image_name'";

    }

    if (is_uploaded_file($main_image['tmp_name'])) {
        $image = storage('admin/news/') . $lnews['news_image'];
        if (file_exists($image)) unlink($image);

        $main_image_name = "latest-news-" . time() . "-" . rand(1000, 1000000) . "." . pathinfo($main_image['name'], PATHINFO_EXTENSION);

        move_uploaded_file($main_image['tmp_name'], storage('admin/news/') . $main_image_name);
        $update_news_sql .= ", news_image='$main_image_name'";
    }

    $update_news_sql .= " WHERE news_id='$id'";

    $query = mysqli_query($dbconnect, $update_news_sql);
    if ($query) {
        $msg = '<span id="message">Latest News Update Successfuly</span>';
        header('Location:latest-news.php'); //redirect
    } else {
        dd(printf("Error: %s\n", mysqli_error($dbconnect)));
    }

}
//data filtering function
function input_filter($data)
{
    $data = trim($data);
    $data = htmlentities($data, ENT_QUOTES);
    $data = htmlspecialchars($data);
    return $data;
}

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
                        Edit Latest News
                        <span id="massages" class="text-danger"><?php if (isset($msg)) {
                                echo $msg;
                            } ?></span>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="all-user.php" class="btn btn-sm btn btn-primary" disabled><i class="fa fa-th"></i>
                            Latest News</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="title"
                                   value="<?= $lnews['news_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Subtitle</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="sub_title" id="title"
                                   value="<?= $lnews['news_subtitle']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Summary</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="summary" id="title"
                                   value="<?= $lnews['news_summary']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc" class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="details"
                                      rows="8"><?= htmlspecialchars_decode($lnews['news_details']); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="btn_text" class="col-sm-3 control-label">Button Text</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="btn_txt" id="btn_text"
                                   value="<?= $lnews['news_btn_text']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="btn_url" class="col-sm-3 control-label">Button URL</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="btn_url" id="btn_url"
                                   value="<?= $lnews['news_btn_url']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Slider Image</label>
                        <div class="col-sm-8">
                            <img height="100" src="<?= '/storage/admin/news/' . $lnews['news_slider_image']; ?>"
                                 alt="image">
                            <input type="file" name="news_slider_image"
                                   value="<?= '/storage/admin/news/' . $lnews['news_slider_image']; ?>"
                                   style="margin-top: 10px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Banner Image</label>
                        <div class="col-sm-8">
                            <img height="200" src="<?= '/storage/admin/news/' . $lnews['news_banner_image']; ?>"
                                 alt="image">
                            <input type="file" name="news_banner_image"
                                   value="<?= '/storage/admin/news/' . $lnews['news_banner_image']; ?>"
                                   style="margin-top: 10px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Main Image</label>
                        <div class="col-sm-8">
                            <img height="400" src="<?= '/storage/admin/news/' . $lnews['news_image']; ?>" alt="image">
                            <input type="file" name="news_image"
                                   value="<?= '/storage/admin/news/' . $lnews['news_image']; ?>"
                                   style="margin-top: 10px;"/>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button type="submit" name="lnews" class="btn btn-sm btn-primary">Udate Welcome Massage</button>
                </div>
            </div>
        </form>
    </div><!--col-md-12 end-->
<?php
getAdminFooter();
?>