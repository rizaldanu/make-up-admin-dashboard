<?php
include "config.php";

$result = $db->query("SELECT * FROM makeup");
$makeups = $result->fetch_all(MYSQLI_ASSOC);

$resultItem = $db->query("SELECT * FROM item_tambahan");
$items = $resultItem->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="dist/img/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <script src="dist/js/nav.js"></script>
</head>



<head>
    <title>Price List Make Up dan Item Tambahan | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Price List Make Up dan Item Tambahan - Ochii Make Up Artist</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Price List Make Up</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Make Up</th>
                                    <th>Jenis Make Up</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($makeups as $makeup) : ?>
                                    <tr>
                                        <td><?= $makeup['kode_makeup']; ?></td>
                                        <td><?= $makeup['jenis_makeup']; ?></td>
                                        <td><?= $makeup['keterangan']; ?></td>
                                        <td><?= $makeup['harga']; ?></td>
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
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title ">Price List Item Tambahan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Item</th>
                            <th>Nama Item</th>
                            <th>Harga Item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td><?= $item['kode_item']; ?></td>
                                <td><?= $item['nama_item']; ?></td>
                                <td><?= $item['harga_item']; ?></td>
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
</section>
</div>

</html>