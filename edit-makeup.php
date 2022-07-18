<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
?>
<?php
//Database Connection
include('config.php');
if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    //Getting Post Values
    $kode_makeup = $_POST['kode_makeup'];
    $jenis_makeup = $_POST['jenis_makeup'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];

    //Query for data updation
    $query = mysqli_query($db, "UPDATE makeup set kode_makeup='$kode_makeup', jenis_makeup='$jenis_makeup', keterangan='$keterangan', harga='$harga' where kode_makeup='$eid'");

    if ($query) {
        echo "<script>alert('Data telah berhasil diubah.');</script>";
        echo "<script type='text/javascript'> document.location ='makeup.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<?php
$page = 'makeup';
include "header.php";
include "navigation.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Make Up | Ochii Make Up Artist</title>
</head>

<body>

    <form method="POST">
        <?php
        $eid = $_GET['editid'];
        $ret = mysqli_query($db, "select * from makeup where kode_makeup='$eid'");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Edit Data Make Up</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Data Make Up</li>
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
                                        <h3 class="card-title">Edit Data Make Up</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kode Make Up</label>
                                                <input type="text" name="kode_makeup" class="form-control" value="<?php echo $row["kode_makeup"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Make Up</label>
                                                <input type="text" name="jenis_makeup" class="form-control" value="<?php echo $row["jenis_makeup"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" value="<?php echo $row["keterangan"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" name="harga" class="form-control" value="<?php echo $row["harga"]; ?>">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                            <a href="pelanggan.php" class="btn btn-secondary ml-2">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php
        } ?>
<?php
include "footer.php";
?>