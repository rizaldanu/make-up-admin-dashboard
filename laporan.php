<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php");
}
?>
<?php
$page = 'laporan';
include "header.php";
include "navigation.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Laporan | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="d-flex justify-content-center">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>63</h3>

              <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Pesanan Batal</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</html>

<?php
include "footer.php";
?>