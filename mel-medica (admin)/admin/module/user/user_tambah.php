<?php
include "../../config.php";
if(!empty($_POST['name'] or $_POST['username'] or $_POST['password'])) { 
    //proses simpan
    mysql_query("INSERT INTO user (nama_lengkap, username, password, role_id, email, telpon) VALUES ('$_POST[name]', '$_POST[username]', '$_POST[password]', '$_POST[role]', '$_POST[email]', '$_POST[telpon]')")  or die(mysql_error());
    
    header('Location:../../dashboard.php?m=user');
}
else {
    header('Location:../../dashboard.php?m=user');
}
?>