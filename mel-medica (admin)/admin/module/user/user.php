<?php
include('config.php');
    if(isset($_GET['tipe'])) {
        if($_GET['tipe']=='tambah') {
            echo "<h3>Tambah Akun</h3>
                <form method='post' action='module/user/user_tambah.php'>
                    <label>Nama</label>
                        <input type='text' name='name' size='60' required/><br/>
                    <label>Username</label>
                        <input type='text' name='username' size='30' required/><br/>
                    <label>Password</label>
                        <input type='password' name='password' size='30' required/><br/>
                    <input type='hidden' name='role' value='1'/>
                    <label>Email</label>
                        <input type='email' name='email' size='30'/><br/>
                    <label>No. Telpon</label>
                        <input type='text' name='telpon' size='30'/><br/>
                    <label>&nbsp;</label>
                        <input type='submit' value='simpan' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
                </form>";
        } elseif($_GET['tipe']=='edit') {
            $sql=mysql_query("SELECT * FROM user WHERE id='$_GET[id]'") or die(mysql_error());
            $de=mysql_fetch_array($sql);
            
            echo "<h3>Edit Data Member</h3>
                <form method='post' action='module/user/user_edit.php'>
                <input type='hidden' name='id' value='$de[id]'/>
                <label>Nama Lengkap</label>
                    <input type='text' name='name' size='60' value='$de[nama_lengkap]'required/><br/>
                <input type='hidden' name='username' size='30'  value='$de[username]' required/>
                <input type='hidden' name='password' size='30' value='$de[password]' required/>
                <input type='hidden' name='role' value='$de[role_id]'/>
                <label>Email</label>
                    <input type='email' name='email' size='30' value='$de[email]'/><br/>
                <label>No. Telpon</label>
                    <input type='text' name='telpon' size='30' value='$de[telpon]'/><br/>
                <label>&nbsp;</label>
                    <input type='submit' value='Update' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
            </form>";
        }
    } else {
?>
            <h3>Member</h3>
            <a href="?m=user&tipe=tambah">Tambah Akun</a>
            <table border="1" width="100%" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    // jumlah data yang akan ditampilkan per halaman
                    $dataPerPage = 10;
                    // apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
                    // sedangkan apabila belum, nomor halamannya 1.
                    if(isset($_GET['page']))
                    {
                        $noPage = $_GET['page'];
                    } 
                    else $noPage = 1; {
                    }
                    // perhitungan offset
                    $offset = ($noPage - 1) * $dataPerPage;
                   
                    $sql=mysql_query("SELECT * FROM user 
                    LEFT JOIN role on user.role_id=role.role_id LIMIT $offset, $dataPerPage 
                    ") or die(mysql_error());
                    $no=(($dataPerPage)*($noPage-1)+1);
                    while($p=mysql_fetch_array($sql)) {
                        echo "<tr>
                        <td align='center' width='50px'>$no</td>
                        <td>$p[nama_lengkap]</td>
                        <td>$p[username]</td>
                        <td>$p[role_name]</td>
                        <td>$p[email]</td>
                        <td>$p[telpon]</td>
                        <td align='center' width='140px'>
                            <a href='?m=user&tipe=edit&id=$p[id]'>Edit</a></tr>";
                        $no++;
                    }
                ?>
            </table>
<?php
        include "module/page.php";
}
?>