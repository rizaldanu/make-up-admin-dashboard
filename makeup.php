<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php");
}
?>
<?php
$page = 'makeup';
include "header.php";
include "navigation.php";
include "config.php";

$result = $db->query("SELECT * FROM makeup");
$makeups = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Jenis Make Up | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Jenis Make Up</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Jenis Make Up</li>
          </ol>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Jenis Make Up</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a class="btn btn-success btn-sm mb-2" href="tambah-makeup.php">
                <i class="nav-icon fas fa-plus"></i>
                Tambah Baru
              </a>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kode Make Up</th>
                    <th>Jenis Make Up</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($makeups as $makeup) : ?>
                    <tr>
                      <td><?= $makeup['kode_makeup']; ?></td>
                      <td><?= $makeup['jenis_makeup']; ?></td>
                      <td><?= $makeup['keterangan']; ?></td>
                      <td><?= $makeup['harga']; ?></td>
                      <td><a class="btn btn-primary btn-sm" href="edit-makeup.php?editid=<?php echo $makeup['kode_makeup']; ?>">Edit</a><span> </span><a class="btn btn-danger btn-sm" href="hapus-makeup.php?id=<?php echo $makeup['id']; ?>">Hapus</a></td>
                    </tr>
                  <?php endforeach; ?>
                  <!-- <?php
                        $result = mysqli_query($db, "SELECT * FROM makeup");
                        if ($result) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                              <td scope="row">' . $row["kode_makeup"] . '</td>
                              <td>' . $row["jenis_makeup"] . '</td>
                              <td> ' . $row["keterangan"] . '</td>
                              <td> ' . $row["harga"] . '</td>
                              <td><a class="btn btn-primary btn-sm" href="edit.php">Edit</a><span> </span><a class="btn btn-danger btn-sm" href="hapus.php">Hapus</a></td>
                            </tr>';
                          }
                        } else {
                          echo "0 results";
                        }
                        ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

</html>

<?php
include "footer.php";
?>