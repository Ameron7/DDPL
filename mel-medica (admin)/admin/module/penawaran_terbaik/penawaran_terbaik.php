<?php
include('config.php');
    if(isset($_GET['tipe'])) {
        if($_GET['tipe']=='edit') {
            $sql=mysql_query("SELECT * FROM promo 
                LEFT JOIN produk on promo.prod_id=produk.prod_id
                LEFT JOIN category on produk.ctg_id = category.ctg_id
                LEFT JOIN logo on produk.logo_id = logo.logo_id
                WHERE promo_id='$_GET[id]'
                ORDER BY prod_name ASC") or die(mysql_error());
            $de=mysql_fetch_array($sql);
            echo "<h3>Edit Produk Penawaran Terbaik</h3>
                <form method='post' action='module/penawaran_terbaik/penawaran_terbaik_edit.php'>
                <input type='hidden' name='id' value='$de[promo_id]'/>
                <label>Nama Produk</label>
                    
                 <select name='promo' >";
                $sql=mysql_query("SELECT * FROM produk ORDER BY prod_name ASC") or die(mysql_error());
                 while($row = mysql_fetch_array($sql)) {
                    echo "<option value='" .$row[prod_id]. "'"; 
                     if ($row['prod_id']==$de['prod_id']) 
                         echo "selected = 'selected'"; 
                     echo ">".$row['prod_name']."</option>";
                 } echo "</select></br>
                 
                    
                <label>&nbsp;</label>
                <input type='submit' value='Update' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
                
            </form>";
                    
        }
    } else {
?>
            <h3>Manajemen Produk Penawaran Terbaik</h3>
            <table border="1" width="100%" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Produk Penawaran Terbaik</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Logo</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php
        
                    $sql=mysql_query("SELECT * FROM promo 
                    LEFT JOIN produk on promo.prod_id=produk.prod_id
                    LEFT JOIN category on produk.ctg_id=category.ctg_id
                    LEFT JOIN Logo on produk.logo_id=logo.logo_id") or die(mysql_error());
                    $no=1;
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
                            <a href='?m=penawaran_terbaik&tipe=edit&id=$p[promo_id]'>Edit</a></tr>";
                        $no++;
                    }
                ?>
            </table>
<?php
}
?>