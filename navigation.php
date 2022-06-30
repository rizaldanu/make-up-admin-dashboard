<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/ochii-logo.png" alt="Ochii Make-Up" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ochii Make-Up</span>
    </a><br>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a <?php echo ($page == 'dashboard') ? "class='nav-link active'" : "class='nav-link'"; ?> href="index.php">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a <?php echo ($page == 'pesanan') ? "class='nav-link active'" : "class='nav-link'"; ?> href="pesanan.php">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Data Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a <?php echo ($page == 'pelanggan') ? "class='nav-link active'" : "class='nav-link'"; ?> href="pelanggan.php">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a <?php echo ($page == 'laporan') ? "class='nav-link active'" : "class='nav-link'"; ?> href="laporan.php">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a <?php echo ($page == 'makeup') ? "class='nav-link active'" : "class='nav-link'"; ?> href="makeup.php">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data Jenis Make-Up
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>