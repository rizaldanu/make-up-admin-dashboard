<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php");
}
?>
<?php
$page = 'pelanggan';
include "header.php";
include "navigation.php";
include "config.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Pelanggan | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pelanggan</li>
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
              <h3 class="card-title">Data Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID Pengguna</th>
                    <th>Username</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Nomor Handphone</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = mysqli_query($db, "SELECT * FROM user");
                  if ($result) {
                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>
                              <td scope="row">' . $row["id"] . '</td>
                              <td>' . $row["username"] . '</td>
                              <td> ' . $row["first_name"] . '</td>
                              <td> ' . $row["last_name"] . '</td>
                              <td>' . $row["phone"] . '</td>
                              <td> ' . $row["alamat"] . '</td>
                              <td><a class="btn btn-primary btn-sm" href="edit.php">Edit</a><span> </span><a class="btn btn-danger btn-sm" href="hapus.php">Hapus</a></td>
                            </tr>';
                    }
                  } else {
                    echo "0 results";
                  }
                  ?>
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