<?php
include('config.php');
    if(isset($_GET['tipe'])) {
        if($_GET['tipe']=='edit') {
            $sql=mysql_query("SELECT * FROM slider WHERE slid_id='$_GET[id]'") or die(mysql_error());
            $de=mysql_fetch_array($sql);
            
            echo "<h3>Edit Banner</h3>
                <form method='post' action='module/banner/banner_edit.php' enctype='multipart/form-data'>
                <input type='hidden' name='id' value='$de[slid_id]'/>
                <label>Judul</label>
                    <input type='text' name='title' size='20' value='$de[slid_title]' required/><br/>
                <label>Deskripsi</label>
                    <input type='text' name='desc' size='60' value='$de[slid_desc]' required/><br/>
                <label>Gambar</label>
                    <input type='file' name='image' id='image'  data-max-size='2048' accept='image/*'><br/>
                <label>&nbsp;</label>
                    <input type='submit' value='Update' name='submit'/><input type='button' value='Batal' onClick='history.back();'/>
            </form>";
        }
    } else {
?>
            <h3>Manajemen Banner</h3>
            <table border="1" width="100%" cellspacing="0">
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $sql=mysql_query("SELECT * FROM slider") or die(mysql_error());
                    $no=1;
                    while($p=mysql_fetch_array($sql)) {
                        echo "<tr>
                        <td align='center' width='50px'>$no</td>
                        <td width='100px'>$p[slid_title]</td>
                        <td>$p[slid_desc]</td>
                        <td align='center' width='400px'>
                        <img width = '400px' src='../img/banner/$p[slid_image]' />
                        </td>
                        <td align='center' width='140px'>
                            <a href='?m=banner&tipe=edit&id=$p[slid_id]'>Ganti</a>
                        </td>";
                        $no++;
                    }
                ?>
            </table>
<?php
}
?>