<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php");
}
?>
<?php
$page = 'item_tambahan';
include "header.php";
include "navigation.php";
include "config.php";

$result = $db->query("SELECT * FROM item_tambahan");
$items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Item Tambahan | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Item Tambahan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Item Tambahan</li>
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
              <h3 class="card-title">Data Item Tambahan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a class="btn btn-success btn-sm mb-2" href="tambah-item.php">
                <i class="nav-icon fas fa-plus"></i>
                Tambah Baru
              </a>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Harga Item</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $item) : ?>
                    <tr>
                      <td><?= $item['kode_item']; ?></td>
                      <td><?= $item['nama_item']; ?></td>
                      <td><?= $item['harga_item']; ?></td>
                      <td><a class="btn btn-primary btn-sm" href="edit-item-tambahan.php?editid=<?php echo $item['id']; ?>">Edit</a><span> </span><a class="btn btn-danger btn-sm" href="hapus-item-tambahan.php?id=<?php echo $item['id']; ?>">Hapus</a></td>
                    </tr>
                  <?php endforeach; ?>
                  <!-- <?php
                        $result = mysqli_query($db, "SELECT * FROM item_tambahan");
                        if ($result) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                              <td scope="row">' . $row["kode_item"] . '</td>
                              <td>' . $row["nama_item"] . '</td>
                              <td> ' . $row["harga_item"] . '</td>
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