<?php
include "../../config.php";
    //proses hspus
    mysql_query("DELETE FROM produk WHERE prod_id='$_GET[id]'") or die(mysql_error());
    header('Location:../../dashboard.php?m=produk');
?>