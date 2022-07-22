<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php");
}
if (isset($_POST['records-limit'])) {
  $_SESSION['records-limit'] = $_POST['records-limit'];
}
include "config.php";
$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 8;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
$orders = $db->query("SELECT * FROM pesanan LIMIT $paginationStart, $limit")->fetch_all(MYSQLI_ASSOC);
// Get total records
$sql = $db->query("SELECT count(id) AS id FROM pesanan")->fetch_all(MYSQLI_ASSOC);
$allRecrods = $sql[0]['id'];

// Calculate total pages
$totoalPages = ceil($allRecrods / $limit);
// Prev + Next
$prev = $page - 1;
$next = $page + 1;

//count pesanan selesai
$pesanan_selesai = $db->query("SELECT count(*) AS id FROM pesanan WHERE status='Selesai'")->fetch_all(MYSQLI_ASSOC);
$rows_selesai = $pesanan_selesai[0]['id'];

//count pesanan batal
$pesanan_batal = $db->query("SELECT count(*) AS id FROM pesanan WHERE status='Batal'")->fetch_all(MYSQLI_ASSOC);
$rows_batal = $pesanan_batal[0]['id'];

//count pesanan proses
$pesanan_proses = $db->query("SELECT count(*) AS id FROM pesanan WHERE status='Proses Make Up'")->fetch_all(MYSQLI_ASSOC);
$rows_proses = $pesanan_proses[0]['id'];
?>


<?php
$page = 'laporan';
include "header.php";
include "navigation.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Laporan | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Laporan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $rows_proses; ?></h3>

              <p>Pesanan Aktif atau Proses Make Up</p>
            </div>
            <div class="icon">
              <i class="fas fa-cart-arrow-down"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fas fa-spinner"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $rows_selesai; ?></h3>

              <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fas fa-check-circle"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $rows_batal; ?></h3>

              <p>Pesanan Batal</p>
            </div>
            <div class="icon">
              <i class="fas fa-ban"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fas fa-times-circle"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $allRecrods; ?></h3>

              <p>Total Pesanan</p>
            </div>
            <div class="icon">
              <i class="fas fa-calculator"></i>
            </div>
            <a href="#" class="small-box-footer">
              <i class="fas fa-globe"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Laporan</h3>
        </div>
        <!-- <div class="d-flex flex-row-reverse bd-highlight mb-3">
              <form action="pesanan.php" method="post">
                <select name="records-limit" id="records-limit" class="custom-select">
                  <option disabled selected>Records Limit</option>
                  <?php foreach ([5, 7, 10, 12] as $limit) : ?>
                    <option <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?> value="<?= $limit; ?>">
                      <?= $limit; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </form>
            </div> -->
        <!-- Datatable -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID Pesanan</th>
                <th scope="col">ID Pelanggan</th>
                <th scope="col">Kode Makeup</th>
                <th scope="col">Kode Item</th>
                <th scope="col">Tanggal Pesan</th>
                <th scope="col">Tanggal Makeup</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order) : ?>
                <tr>
                  <td scope="row">#<?php echo $order['id']; ?></td>
                  <td scope="row"><?php echo $order['id_user']; ?></td>
                  <td scope="row"><?php echo $order['kode_makeup']; ?></td>
                  <td scope="row"><?php echo $order['kode_item']; ?></td>
                  <td scope="row"><?php echo $order['tanggal_pesan']; ?></td>
                  <td scope="row"><?php echo $order['tanggal_makeup']; ?></td>
                  <td scope="row"><?php echo $order['status']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- Pagination -->
          <div class="card-body">
            <nav aria-label="Page navigation example mt-5">
              <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($page <= 1) {
                                        echo 'disabled';
                                      } ?>">
                  <a class="page-link" href="<?php if ($page <= 1) {
                                                echo '#';
                                              } else {
                                                echo "?page=" . $prev;
                                              } ?>">Halaman</a>
                </li>
                <?php for ($i = 1; $i <= $totoalPages; $i++) : ?>
                  <li class="page-item <?php if ($page == $i) {
                                          echo 'active';
                                        } ?>">
                    <a class="page-link" href="laporan.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                  </li>
                <?php endfor; ?>
                <!-- <li class="page-item <?php if ($page >= $totoalPages) {
                                            echo 'disabled';
                                          } ?>">
                      <a class="page-link" href="<?php if ($page >= $totoalPages) {
                                                    echo '#';
                                                  } else {
                                                    echo "?page=" . $next;
                                                  } ?>">Next</a>
                    </li> -->
              </ul>
              <ul class="pagination justify-content-center">
                <a class="btn btn-primary btn-sm mb-2" onclick="window.print()">
                  <i class="nav-icon fas fa-print"></i>
                  Cetak Laporan
                </a>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
</div>
</section>
<!-- jQuery + Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#records-limit').change(function() {
      $('form').submit();
    })
  });
</script>
</div>

</html>

<?php
include "footer.php";
?>