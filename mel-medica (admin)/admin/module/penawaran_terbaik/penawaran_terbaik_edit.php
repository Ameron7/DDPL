<?php
include "../../config.php";
if(!empty($_POST['promo'])) {
    //proses update
    mysql_query("UPDATE promo SET prod_id='$_POST[promo]'
                WHERE promo_id='$_POST[id]'");
    
    header('Location:../../dashboard.php?m=penawaran_terbaik');
}
else {
    header('Location:../../dashboard.php?m=penawaran_terbaik');
}
?>