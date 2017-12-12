<?php
 //variabel
 $host   = "localhost";
 $user   = "root";
 $pass   = "";
 $dbname = "db_melmedica";
    
 //digunakan untuk koneksi ke database
 $koneksi = mysql_connect($host,$user,$pass);
 mysql_select_db($dbname) or die ("Tidak ada database");
?>