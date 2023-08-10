<li class="active treeview menu">
          <a href="#">
            <i class="fa fa-map"></i><span>Peta Sebaran AUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=peta"><i class="fa fa-circle-o"></i>Semua Kategori</a></li>
          <?php
            $sql = $koneksi->query("select * from tb_kategori");
            while ($data = $sql->fetch_assoc()){ 
          ?>  
            <li><a href="?page=peta&kategori=<?=$data['id_kategori']?>"><i class="fa fa-circle-o"></i><?=$data['kategori']?><img src="<?=('simbol/'.$data['simbol']);?>" width="20px"></a></li>
            <?php }?>       
          </ul>
</li>

<script>
 /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>