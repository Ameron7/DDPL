<?php
        // mencari jumlah semua data dalam tabel guestbook
        $query   = "SELECT COUNT(*) AS jumData FROM ".$_GET['m'];
        $hasil  = mysql_query($query);
        $data     = mysql_fetch_array($hasil);
        $jumData = $data['jumData'];
        // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
        $jumPage = ceil($jumData/$dataPerPage);
        // menampilkan link previous
        echo "<div style='text-align:center'><br/>";
            if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?m=".$_GET['m']."&page=".($noPage-1)."'>&lt;&lt; Prev</a>";
            // memunculkan nomor halaman dan linknya
                $showPage=0;
            for($page = 1; $page <= $jumPage; $page++)
            {
                 if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
                 {   
                    if (($showPage == 1) && ($page != 2))  echo "..."; 
                    if (($showPage != ($jumPage-1)) && ($page == $jumPage))  echo "...";
                    if ($page == $noPage) echo " <b>".$page."</b> ";
                    else echo " <a href='".$_SERVER['PHP_SELF']."?m=".$_GET['m']."&page=".$page."'>".$page."</a> ";
                    $showPage = $page; 
                 }
            }
            // menampilkan link next
            if ($noPage < $jumPage) {
                echo "<a href='".$_SERVER['PHP_SELF']."?m=".$_GET['m']."&page=".($noPage+1)."'>Next &gt;&gt;</a>";
            }
        echo "</div>";
?>