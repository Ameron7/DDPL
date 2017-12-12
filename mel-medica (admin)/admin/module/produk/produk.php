<?php
include('config.php');
    if(isset($_GET['tipe'])) {
        if($_GET['tipe']=='tambah') {
            
            echo "<h3>Tambah Data produk</h3> 
                <form method='post' action='module/produk/produk_tambah.php' enctype='multipart/form-data'>
                <input type='hidden' name='id'/>
                <label>Nama Produk</label>
                    <input type='text' name='name' size='30' required/><br/>
                <label>Deskripsi</label>
                    <input type='text' name='desc' size='80' required/><br/>
                <label>Kategori</label>
                 <select name='category' >";
                $sql=mysql_query("SELECT * FROM category") or die(mysql_error());
                 while($row = mysql_fetch_array($sql)) {
                    echo "<option value='" .$row[ctg_id]. "'>".$row[ctg_name]."</option>";
                 } echo "</select></br>
                 
                <label>Harga</label>
                    <input type='number' name='cost' size='15' required/><br/>
                <label>Logo</label>
                <select name='logo' >";
                $sql=mysql_query("SELECT * FROM logo") or die(mysql_error());
                 while($row = mysql_fetch_array($sql)) {
                    echo "<option value='" .$row[logo_id]. "'>".$row[logo_name]."</option>";
                 } echo "</select></br>
                 
                <label>Gambar</label>
                    <input type='file' name='image' id='image'  data-max-size='2048' accept='image/*' required /><br/>
                <label>&nbsp;</label>
                
                <input type='submit' value='Simpan' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
            </form>";
        } elseif($_GET['tipe']=='edit') {
            $sql=mysql_query("SELECT * FROM produk 
                    INNER JOIN category on produk.ctg_id = category.ctg_id
                    INNER JOIN logo on produk.logo_id = logo.logo_id
                    WHERE prod_id='$_GET[id]'") or die(mysql_error());
            $de=mysql_fetch_array($sql);
            echo "<h3>Edit Data produk</h3>
                <form method='post' action='module/produk/produk_edit.php' enctype='multipart/form-data'>
                <input type='hidden' name='id' value='$de[prod_id]'/>
                <label>Nama Produk</label>
                    <input type='text' name='name' size='30' value='$de[prod_name]' required/><br/>
                <label>Deskripsi</label>
                    <input type='text' name='desc' size='80' value='$de[prod_desc]' required/><br/>
                <label>Kategori</label>
                
                
                 <select name='category' >";
                $sql=mysql_query("SELECT * FROM category") or die(mysql_error());
                 while($row = mysql_fetch_array($sql)) {
                    echo "<option value='" .$row[ctg_id]. "'"; 
                     if ($row['ctg_id']==$de['ctg_id']) 
                         echo "selected = 'selected'"; 
                     echo ">".$row['ctg_name']."</option>";
                 } echo "</select></br>
                 
                <label>Harga</label>
                    <input type='number' name='cost' size='15' value='$de[prod_cost]' required/><br/>
                <label>Logo</label>
                <select name='logo' >";
                $sql=mysql_query("SELECT * FROM logo") or die(mysql_error());
                 while($row = mysql_fetch_array($sql)) {
                    echo "<option value='" .$row[logo_id]. "'"; 
                     if ($row['logo_id']==$de['logo_id']) 
                         echo "selected = 'selected'"; 
                     echo ">".$row['logo_name']."</option>";
                 } echo "</select></br>
                 
                <label>Gambar</label>
                    <input type='file' name='image' id='image' data-max-size='2048' accept='image/*' ><br/>
                <label>&nbsp;</label>
                
                <input type='submit' value='Update' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
                
            </form>";
                    
        }
    } else {
?>
            <h3>Manajemen Produk</h3>
            <a href="?m=produk&tipe=tambah">Tambah Produk</a>
            <table border="1" width="100%" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Logo</th>
                    <th>Harga</th>
                    <th>Gambar</th>
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
                   
                    $sql=mysql_query("SELECT * FROM produk 
                    LEFT JOIN category on produk.ctg_id=category.ctg_id
                    LEFT JOIN Logo on produk.logo_id=logo.logo_id  
                    ORDER BY prod_name ASC LIMIT $offset, $dataPerPage") or die(mysql_error());
                    $no=(($dataPerPage)*($noPage-1)+1);
                    while($p=mysql_fetch_array($sql)) {
                        echo "<tr>
                        <td align='center' width='50px'>$no</td>
                        <td>$p[prod_name]</td>
                        <td>$p[prod_desc]</td>
                        <td align='center'>$p[ctg_name]</td>
                        <td align='center'width='100px' ><img width = '64px' src='../img/icon/$p[logo_image]' /></td>
                        <td align='center' width='100px'>Rp" . number_format("$p[prod_cost]", '0', ',', '.') . "</td>
                        <td align='center' width='100px'>
                        <img width = '100px' src='../img/produk/$p[prod_image]' />
                        </td>
                        <td align='center' width='140px'>
                            <a href='?m=produk&tipe=edit&id=$p[prod_id]'>Edit</a> | 
                            <a href='module/produk/produk_hapus.php?id=$p[prod_id]'
                                onClick='return confirm(\"Anda yakin ingin menghapus?\")'>Hapus</a>
                        </td>";
                        $no++;
                    }
                ?>
            </table>
<?php
        include "module/page.php";
}
?>