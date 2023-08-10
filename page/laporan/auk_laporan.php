<?php
include "../../include/koneksi.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_auk.xls");
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$kab = $_POST['kabupaten'];
$kec = $_POST['kecamatan'];
function bulannya($bulan)
            {
            Switch ($bulan){
                case "1" : $bulan="Januari";
                    Break;
                case "2" : $bulan="Februari";
                    Break;
                case "3" : $bulan="Maret";
                    Break;
                case "4" : $bulan="April";
                    Break;
                case "5" : $bulan="Mei";
                    Break;
                case "6" : $bulan="Juni";
                    Break;
                case "7" : $bulan="Juli";
                    Break;
                case "8" : $bulan="Agustus";
                    Break;
                case "9" : $bulan="September";
                    Break;
                case "10" : $bulan="Oktober";
                    Break;
                case "11" : $bulan="November";
                    Break;
                case "12" : $bulan="Desember";
                    Break;
                }
            return $bulan;
            }            
$bulannya = bulannya($bulan);
?>
        <h3>LAPORAN PRODUKSI ANEKA USAHA KEHUTANAN</h3>
        <h3>LINGKUP CABANG DINAS KEHUTANAN WILAYAH BOJONEGORO</h3>
        <h3>BULAN <?php echo strtoupper ($bulannya)?> <H3>
        <table border="1" cellpadding="3">
            <tr>
              <th rowspan="2">No</th>
              <th rowspan="2">Nama KTH</th>
              <th rowspan="2">Kabupaten</th>
              <th rowspan="2">Kecamatan</th>

              <?php
                $sql3 = $koneksi->query("select * from tb_kategori order by kategori asc"); 
                $panjang_kolom=0;
                
                
                while($data3= $sql3->fetch_assoc()){?>
                <?php 
                  $id_kategori = $data3['id_kategori'];
                  $sql = $koneksi->query("select * from tb_auk where id_kategori='$id_kategori'")
                ?>
                 <?php 
                  $rowcount=mysqli_num_rows($sql); 
                  $panjang_kolom = $panjang_kolom + $rowcount;
                 ?>
                 <th colspan="<?php echo $rowcount?>"><?php echo $data3['kategori']. " " ."(". $data3['satuan']. ")"; ?></th>
            <?php } ?>
            </tr>
          <tr>
          <?php
            $i = 0;
            $sql5 = $koneksi->query("select * from tb_kategori order by kategori asc");
            while($data5=$sql5->fetch_assoc()){
              $idnya = $data5['id_kategori'];
              $sql6 = $koneksi->query("select * from tb_auk where id_kategori='$idnya'");
              while($data6=$sql6->fetch_assoc()){?>
                <th><?php echo $data6['nama_auk'];?></th>
                <?php $i=$i+1;
                    $kode_auk[$i]= $data6['id_auk'];
                ?>

              <?php 
                }
              } 
              ?>
            
                <?php
                  if ($kab==""){
                  $sql10 = $koneksi->query("select distinct id_kth,nama_kth,kabupaten.nama as kabupaten, kecamatan.nama as kecamatan from tb_auk,tb_kth,kabupaten,kecamatan where tb_auk.id_kth=tb_kth.kode_kth and tb_kth.id_kab=kabupaten.id_kab and tb_kth.id_kec=kecamatan.id_kec");
                  }
                  else
                  {
                    if($kec==""){
                      $sql10 = $koneksi->query("SELECT DISTINCT
                      id_kth,
                      nama_kth,
                      kabupaten.nama AS kabupaten,
                      kecamatan.nama AS kecamatan 
                    FROM
                      tb_auk,
                      tb_kth,
                      kabupaten,
                      kecamatan 
                    WHERE
                      tb_auk.id_kth = tb_kth.kode_kth 
                      AND tb_kth.id_kab = kabupaten.id_kab 
                      AND tb_kth.id_kec = kecamatan.id_kec
                      and kabupaten.id_kab = '$kab'");
                    }
                    else
                    {
                      $sql10 = $koneksi->query("SELECT DISTINCT
                      id_kth,
                      nama_kth,
                      kabupaten.nama AS kabupaten,
                      kecamatan.nama AS kecamatan 
                    FROM
                      tb_auk,
                      tb_kth,
                      kabupaten,
                      kecamatan 
                    WHERE
                      tb_auk.id_kth = tb_kth.kode_kth 
                      AND tb_kth.id_kab = kabupaten.id_kab 
                      AND tb_kth.id_kec = kecamatan.id_kec
                      and kabupaten.id_kab = '$kab'
                      and kecamatan.id_kec = '$kec'");

                    }
                  }
                  $nomer = 0;
                  while($data10=$sql10->fetch_assoc()){?>
                  <tr>
                     <?php $nomer=$nomer+1; ?>
                     
                     <th><?php echo $nomer;?></th>
                     <th><?php echo $data10['nama_kth'];?></th> 
                     <th><?php echo $data10['kabupaten'];?></th>
                     <th><?php echo $data10['kecamatan'];?></th>
                     <?php
                        $produksi = 0;
                        $kode_kth=$data10['id_kth'];
                        for ($x=1; $x <= $panjang_kolom; $x++){
                          $kodenya = $kode_auk[$x];
                          $sql15 = $koneksi->query("select sum(minggu1+minggu2+minggu3+minggu4) as total from tb_auk,tb_produksi_auk where tb_auk.id_auk=tb_produksi_auk.id_auk and tahun='$tahun' and bulan='$bulan' and tb_auk.id_auk='$kodenya' and tb_auk.id_kth='$kode_kth'");    
                          $data15=$sql15->fetch_assoc();
                          if ($data15['total'] <> 0){
                            $produksi = $data15['total'];
                          }
                          else
                          {
                            $produksi = 0;
                          }  
                      ?>
                          <th><?php echo $produksi?></th>
                          
                       <?php
                        }
                     ?>
                  </tr>
                  <?php } ?>

                <tr>
                  <th colspan="4"> Total Bulan Ini </th>
                  <?php
                  if ($kab==""){
                      $sql20 = $koneksi->query("SELECT
                      tb_kategori.id_kategori as idnya, kategori,
                      sum( minggu1 + minggu2 + minggu3 + minggu4 ) AS total 
                    FROM
                      tb_auk,
                      tb_produksi_auk,
                      tb_kategori 
                    WHERE
                      tb_auk.id_auk = tb_produksi_auk.id_auk 
                      AND tb_auk.id_kategori = tb_kategori.id_kategori 
                      AND tahun = '$tahun' 
                      AND bulan = '$bulan' 
                    GROUP BY
                      tb_kategori.id_kategori order by kategori asc"); 
                  }
                  else
                  {
                    if ($kec==""){
                      $sql20 = $koneksi->query("SELECT
                      tb_kategori.id_kategori AS idnya,
                      kategori,
                      sum( minggu1 + minggu2 + minggu3 + minggu4 ) AS total 
                    FROM
                      tb_auk,
                      tb_produksi_auk,
                      tb_kategori,
                      tb_kth,
                      kabupaten,
                      kecamatan 
                    WHERE
                      tb_auk.id_kth = tb_kth.kode_kth 
                      AND tb_kth.id_kab = kabupaten.id_kab 
                      AND tb_kth.id_kec = kecamatan.id_kec 
                      AND tb_auk.id_auk = tb_produksi_auk.id_auk 
                      AND tb_auk.id_kategori = tb_kategori.id_kategori 
                      AND tahun = '2020' 
                      AND bulan = '9' 
                      AND kabupaten.id_kab = '$kab'  
                    GROUP BY
                      tb_kategori.id_kategori 
                    ORDER BY
                      kategori ASC");

                    }
                    else
                    {
                      $sql20 = $koneksi->query("SELECT
                      tb_kategori.id_kategori AS idnya,
                      kategori,
                      sum( minggu1 + minggu2 + minggu3 + minggu4 ) AS total 
                    FROM
                      tb_auk,
                      tb_produksi_auk,
                      tb_kategori,
                      tb_kth,
                      kabupaten,
                      kecamatan 
                    WHERE
                      tb_auk.id_kth = tb_kth.kode_kth 
                      AND tb_kth.id_kab = kabupaten.id_kab 
                      AND tb_kth.id_kec = kecamatan.id_kec 
                      AND tb_auk.id_auk = tb_produksi_auk.id_auk 
                      AND tb_auk.id_kategori = tb_kategori.id_kategori 
                      AND tahun = '2020' 
                      AND bulan = '9' 
                      AND kabupaten.id_kab = '$kab' 
                      AND kecamatan.id_kec = '$kec' 
                    GROUP BY
                      tb_kategori.id_kategori 
                    ORDER BY
                      kategori ASC");
                    }
                  }
                  
                  ?>
                  <?php
                    $a = 1;
                    $bulan_ini=array();
                    while($data20=$sql20->fetch_assoc()){?>
                    <?php
                       
                      $id_kategorinya = $data20['idnya'];
                      $sql30 = $koneksi->query("select * from tb_auk where id_kategori='$id_kategorinya'");
                      $rowcount2 = mysqli_num_rows($sql30);
                     
                      if ($data20['total'] <> 0){?>
                          
                        <th colspan="<?php echo $rowcount2?>"><?php echo $data20['total'];?></th>
                     <?php
                      }
                     else
                     {
                     ?>
                     <th colspan="<?php echo $rowcount2?>"><?php echo '0';?></th>   
                    <?php 
                    }
                      $bulan_ini[] = $data20['total'];
                      $a = $a+1;
                    }
                     
                     ?> 
                     
                </tr>
                
                <tr>
                   <th colspan="4"> Total s/d Bulan lalu </th>
                   <?php
                  $sql20 = $koneksi->query("SELECT
                  tb_kategori.id_kategori AS idnya,
                  kategori,
                  sum( minggu1 + minggu2 + minggu3 + minggu4 ) AS total 
                FROM
                  tb_auk
                  RIGHT JOIN tb_produksi_auk ON tb_auk.id_auk = tb_produksi_auk.id_auk
                  RIGHT JOIN tb_kategori ON tb_auk.id_kategori = tb_kategori.id_kategori 
                  AND tahun = '$tahun' 
                  AND bulan < '$bulan' 
                GROUP BY
                  tb_kategori.id_kategori 
                ORDER BY
                  kategori ASC");
                  ?>
                  <?php
                    $b = 1;
                    $bulan_lalu=array();
                    while($data20=$sql20->fetch_assoc()){?>
                    <?php 
                      
                      $id_kategorinya = $data20['idnya'];
                      $sql40 = $koneksi->query("select * from tb_auk where id_kategori='$id_kategorinya'");
                      $rowcount3 = mysqli_num_rows($sql40); 
                     if ($data20['total'] <> 0){?>
                        <th colspan="<?php echo $rowcount3?>"><?php echo $data20['total'];?></th>
                     <?php
                      }
                     else
                     {
                     ?>
                     <th colspan="<?php echo $rowcount3?>"><?php echo'0';?></th>   
                    <?php 
                    }
                    $bulan_lalu[$b] = $data20['total'];
                    $b=$b+1;
                     ?>
                      
                    <?php } ?>
                </tr>
                
                <tr>
                <th colspan="4"> Total s/d Bulan Ini </th>
                   <?php
                  $sql20 = $koneksi->query("SELECT
                  tb_kategori.id_kategori AS idnya,
                  kategori,
                  sum( minggu1 + minggu2 + minggu3 + minggu4 ) AS total 
                FROM
                  tb_auk
                  RIGHT JOIN tb_produksi_auk ON tb_auk.id_auk = tb_produksi_auk.id_auk
                  RIGHT JOIN tb_kategori ON tb_auk.id_kategori = tb_kategori.id_kategori 
                  AND tahun = '$tahun' 
                  AND bulan <= '$bulan' 
                GROUP BY
                  tb_kategori.id_kategori 
                ORDER BY
                  kategori ASC");
                  ?>
                  <?php
                    $j = 0;
                    $grand_total = 0;
                    while($data20=$sql20->fetch_assoc()){?>
                    <?php 
                      $grand_total = $bulan_ini[$j]+$bulan_lalu[$j];
                      $id_kategorinya = $data20['idnya'];
                      $sql40 = $koneksi->query("select * from tb_auk where id_kategori='$id_kategorinya'");
                      $rowcount3 = mysqli_num_rows($sql40); 
                     if ($data20['total'] <> 0){?>
                        <th colspan="<?php echo $rowcount3?>"><?php echo $grand_total;?></th>
                     <?php
                      }
                     else
                     {
                     ?>
                     <th colspan="<?php echo $rowcount3?>"><?php echo'0';?></th>   
                    <?php 
                    }
                      $j=$j+1;
                      echo $j;
                     ?>
                      
                    <?php } 
                    
                    ?>
                
                </tr>


          </tbody>
        </table>