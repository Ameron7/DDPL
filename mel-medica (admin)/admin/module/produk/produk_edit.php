<?php
include "../../config.php";
if(isset($_POST['submit'])) {
    //proses update
    $target_dir = "../../img/produk/";
    header('Location:../../dashboard.php?m=produk');
    $fileName = $_FILES['image']['name'];
    include "../../upload.php";
    $sql = "UPDATE produk SET prod_name='$_POST[name]',
                prod_desc='$_POST[desc]', ctg_id='$_POST[category]',
                prod_cost='$_POST[cost]', logo_id='$_POST[logo]'";
    
    if (!empty($fileName)){
            $sqlimage = ", prod_image='$fileName' ";
    } else $sqlimage = "";
    
    mysql_query($sql.$sqlimage."WHERE prod_id='$_POST[id]'");
    
}
else {
    header('Location:../../dashboard.php?m=produk');
}
?>