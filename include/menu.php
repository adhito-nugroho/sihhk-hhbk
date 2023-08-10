<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <?php
          if ($_SESSION['level']=='admin') {
            include "include/menu_admin.php";
          } elseif ($_SESSION['level']=='penyuluh') {
            include "include/menu_penyuluh.php";
          } elseif ($_SESSION['level']=='operator') {
            include "include/menu_operator.php";
          } else {
            include "include/menu_umum.php";
          }

          
          ?>
        
     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 