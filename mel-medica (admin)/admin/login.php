<!DOCTYPE html>
<head>
   <title>Login Admin</title>
   <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
 <?php
  //ini digunakan untuk mengecek apakah session login username ada
  session_start();
  if (!empty($_SESSION['username'])) {
   //jika ada redirect ke halaman index 
   header('location:dashboard.php');
  } 
 ?>
  <div class="login"> <!-- Login -->
    <h1>Login ke akun Anda</h1>
 
    <form class="form" action="cek_login.php" method="post" action="">
  <?php 
   //kode php ini kita gunakan untuk menampilkan pesan eror
   if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
     echo '<h3 class="error">Username dan Password belum diisi!</h3>';
    } else if ($_GET['error'] == 2) {
     echo '<h3 class="error">Username belum diisi!</h3>';
    } else if ($_GET['error'] == 3) {
     echo '<h3 class="error">Password belum diisi!</h3>';
    } else if ($_GET['error'] == 4) {
     echo '<h3 class="error">Username dan Password tidak terdaftar!</h3>';
    }
   }
  ?>
      <p class="field">
        <input type="text" name="username" placeholder="Username" required/>
      </p>
 
      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
      </p>
 
      <p class="submit"><input class="btn" type="submit" name="commit" value="Login"></p>
    </form>
  </div> <!--/ Login-->
</body>
</html>
