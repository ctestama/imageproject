<?php
session_start();
//This is a front end file that Colton is working on
?>
<form action="includes/image_upload.php" enctype="multipart/form-data" method="post">

<p>
Choose an image file:<br>
<input type="file" name="imagefile" size="40">
</p>
<div>
<input id="image_submit" type="submit" value="Send">
</div>
</form>
