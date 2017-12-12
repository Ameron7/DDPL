<?php
include "../../config.php";
if(!empty($_POST['name'] or $_POST['email'] or $_POST['telpon'])) {
    //proses update
    mysql_query("UPDATE user SET nama_lengkap='$_POST[name]', email='$_POST[email]', 
                telpon='$_POST[telpon]' 
                WHERE id='$_POST[id]'") or die(mysql_error()) ;
    
    header('Location:../../dashboard.php?m=user');
}
else {
    header('Location:../../dashboard.php?m=user');
}
?>