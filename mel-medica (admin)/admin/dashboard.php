<?php
      //memanggil file cek_session.php
      include('cek_session.php');
?>
<!DOCTYPE html>
<head>   
    <title>Home Admin</title>
   <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%">
    <tr>
        <td colspan="2" bgcolor="#ebebeb"><h1>Halaman Admin</h1>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250px" bgcolor="#ebebeb">
            <div class="menu">
                <ul>
                    <li><a href="./dashboard.php">Home</a></li>
                    <li><a href="./dashboard.php?m=user">Member</a></li>
                    <li><a href="./dashboard.php?m=produk">Manajemen Produk</a></li>
                    <li><a href="./dashboard.php?m=banner">Manajemen Banner</a></li>
                    <li><a href="./dashboard.php?m=penawaran_terbaik">Manajemen Penawaran Terbaik</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </td>
        <td value="top" >
            <div class="content">
                <?php include "content.php"; ?>
            </div>  
        </td>
    </tr>
    </table>
</body>
</html>