<?php
include "../../config.php";
if(!empty($_POST['title'] or $_POST['desc'] or $_POST['image'])) {
    //proses update
    header('Location:../../dashboard.php?m=banner');
    $fileName = $_FILES['image']['name'];
    $target_dir = "../../img/banner/";
    include "../../upload.php";
    $sql = "UPDATE slider SET slid_title='$_POST[title]', 
                slid_desc='$_POST[desc]'";
    
    if (!empty($fileName)){
            $sqlimage = ", slid_image='$fileName' ";
    } else $sqlimage = "";
    
    mysql_query($sql.$sqlimage."WHERE slid_id='$_POST[id]'") or die(mysql_error()) ;
    
}
else {
    header('Location:../../dashboard.php?m=banner');
}
?>