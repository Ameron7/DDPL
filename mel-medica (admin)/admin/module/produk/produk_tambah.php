<?php
include "../../config.php";
if(isset($_POST['submit'])) {
    //proses simpan
    $target_dir = "../../img/produk/";
    header('Location:../../dashboard.php?m=produk');
    $fileName = $_FILES['image']['name'];
    include "../../upload.php";
    mysql_query("INSERT INTO produk (ctg_id, prod_name, prod_desc, prod_cost, logo_id, prod_image) 
                VALUES ('$_POST[category]', '$_POST[name]', '$_POST[desc]', '$_POST[cost]', '$_POST[logo]', '$fileName')")  or die(mysql_error());
    
}
else {
    header('Location:../../dashboard.php?m=produk');
}
?>