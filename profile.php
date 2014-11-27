<?php
$greeting = '';

if(isset($_SESSION['LOGIN_STATUS'] )&& $_SESSION['LOGIN_STATUS']) {
    $logged_in = $_SESSION['LOGIN_STATUS'];
    $greeting = 'Welcome ' . $_SESSION['fname'];
    $uid = $_SESSION['uid'];
} else {
    $logged_in = FALSE;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <div class="row">
        <div class="col-md-12" id="header">
            The Emerald <?php 
                        if($logged_in) {
                            echo '<a id ="logout" onclick="logout()" class="btn btn-primary">Logout</a>';
                        }   
                    ?>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12" id="edit_container">
            <div class="slide_container">
                <span>Control Image Brightness</span> <input class="span2"
                data-slider-max="50" data-slider-min="-50"
                data-slider-orientation="horizontal" data-slider-selection=
                "after" data-slider-step="1" data-slider-tooltip="hide"
                data-slider-value="0" id="img_slide" style="width: 250px" type=
                "text" value=""> <span class="badge" id="slide_view"></span>
                <a class="btn btn-primary" onclick="saveBright()">Save Edited
                Image</a>
            </div>

            <div id="can_wrap">
                <canvas id="image_pop"></canvas>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <?php   
                                if($logged_in) {
                                    echo '<a href="upload_an_image.php" id="image_button" class="btn btn-primary">Upload an image</a>';
                                    if(isset($uid)) {
                                        include("includes/image_getter.php"); 
                                    }
                                }
                            ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading" id="greeting">
                    <?php echo $greeting ?>
                </div>

                <div class="panel-body" id="profile">
                    <div id="profile_image_div">
                        <?php 
                                                        if (isset($_SESSION['profile_image'])) {
                                                            $profile_src = substr($_SESSION['profile_image'], 3);
                                                            echo '<img id="profile_img" src="'.$profile_src.'" />';
                                                        } 
                                                    ?>
                    </div>

                    <form action="includes/profile_image_upload.php" enctype=
                    "multipart/form-data" method="post">
                        <p><label>Upload or change your profile image:</label>
                        <input class="btn btn-primary" name="profileimage"
                        size="40" type="file"></p>

                        <div>
                            <input class="btn btn-success" id="image_submit"
                            type="submit" value="Upload">
                        </div>
                    </form>

                    <div></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>