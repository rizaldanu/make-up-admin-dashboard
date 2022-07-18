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
    $kode_item = $_POST['kode_item'];
    $nama_item = $_POST['nama_item'];
    $harga_item = $_POST['harga_item'];

    //Query for data updation
    $query = mysqli_query($db, "UPDATE item_tambahan set kode_item='$kode_item', nama_item='$nama_item', harga_item='$harga_item' where id='$eid'");

    if ($query) {
        echo "<script>alert('Data telah berhasil diubah.');</script>";
        echo "<script type='text/javascript'> document.location ='item_tambahan.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<?php
$page = 'item_tambahan';
include "header.php";
include "navigation.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Item Tambahan | Ochii Make Up Artist</title>
</head>

<body>

    <form method="POST">
        <?php
        $eid = $_GET['editid'];
        $ret = mysqli_query($db, "select * from item_tambahan where id='$eid'");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Edit Item Tambahan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Item Tambahan</li>
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
                                        <h3 class="card-title">Edit Item Tambahan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kode Item</label>
                                                <input type="text" name="kode_item" class="form-control" value="<?php echo $row["kode_item"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Item</label>
                                                <input type="text" name="nama_item" class="form-control" value="<?php echo $row["nama_item"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Item</label>
                                                <input type="text" name="harga_item" class="form-control" value="<?php echo $row["harga_item"]; ?>">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                            <a href="item_tambahan.php" class="btn btn-secondary ml-2">Cancel</a>
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