<?php
if(isset($_GET['m'])) {
    if($_GET['m']=='produk') {
        include "module/produk/produk.php";
    }
    elseif($_GET['m']=='user') {
        include "module/user/user.php";
    }
    elseif($_GET['m']=='banner') {
        include "module/banner/banner.php";
    }
    elseif($_GET['m']=='penawaran_terbaik') {
        include "module/penawaran_terbaik/penawaran_terbaik.php";
    }
    else {
        echo "<h3>Module tidak ditemukan!</h3>";
    }
          
} else { 
    
    include('config.php'); 
    $username = $_SESSION['username'];
    $q = mysql_query("select * from user where username='$username'");
    $de=mysql_fetch_array($q);
    echo "<h3>Selamat Datang Administrator</h3> <p>Anda Login sebagai: " . $de['nama_lengkap'] . "</p>";
}
?>