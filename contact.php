
<!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                background-color: #4CAF50;
                color: white;
                padding: 16px 32px;
                margin: 0;
            }
            .contactForm {
                width: 50%;
                margin: 2.5em auto;
                background: #fff;
            }
            input[type=text], select, textarea, input[type="email"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: 1px solid #4CAF50;
                border-radius: 4px;
                cursor: pointer;
                transition: 0.5s all;
            }

            input[type=submit]:hover {
                background: none;
                border: 1px solid #4CAF50;
                color: #4CAF50;

            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
            
            body { 
                font-family: Verdana, Tahoma, sans-serif;
                margin:0;
            }
            </style>
    </head>
    <body>
        <h1>Hubungi Kami</h1>
        <?php
            if(isset($_POST['kirim'])){
                $admin = 'rezkya181@gmail.com'; //ganti email dg email admin

                $nama	= htmlentities($_POST['nama']);
                $email	= htmlentities($_POST['email']);
                $subjek	= htmlentities($_POST['subjek']);
                $pesan	= htmlentities($_POST['pesan']);

                $pengirim	= 'From: '.$nama.' <'.$email.'>'. "\r\n";

                if(mail($admin, $subjek, $pesan, $pengirim)){
                    echo 'SUKSES! Pesan anda telah terkirim.';
                }else{
                    echo 'ERROR! Pesan anda gagal dikirim. Silahkan coba lagi.';
                }
            }
        ?>
        <div class="contactForm">
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama Anda"  required="Tidak boleh kosong!">

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" required="Tidak boleh kosong!">

                <label for="subjek">Subjek</label>
                <input type="text" name="subjek" placeholder="Subjek pesan Anda" >

                <label for="pesan">Pesan</label>
                <textarea name="pesan" placeholder="Tuliskan pesan Anda disini..."   required="Tidak boleh kosong!" style="height:200px"></textarea>

                <input type="submit" name="kirim" value="Kirim">
            </form>
        </div>

    </body>
</html>