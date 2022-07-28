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
        $kode_item = $_POST['kode_item'];
        $tanggal_makeup = $_POST['tanggal_makeup'];
        $status = $_POST['status'];
        $harga = $_POST['harga'];
        $harga_item = $_POST['harga_item'];
        //Query for data updation
        $query = mysqli_query($db, "UPDATE pesanan set kode_makeup='$kode_makeup', kode_item='$kode_item', tanggal_makeup='$tanggal_makeup', status='$status', harga='$harga', harga_item='$harga_item' where ID='$eid'");

        if ($query) {
            echo "<script>alert('Data telah berhasil diubah.');</script>";
            echo "<script type='text/javascript'> document.location ='pesanan.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }

        $harga = mysqli_query($db, "select harga from makeup where kode_makeup='$kode_makeup'");
    }
    
    ?>
<?php
$page = 'pesanan';
include "header.php";
include "navigation.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Pesanan | Ochii Make Up Artist</title>
</head>

<body>

    <form method="POST">
        <?php
        $eid = $_GET['editid'];
        $ret = mysqli_query($db, "select * from pesanan where ID='$eid'");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <?php
            $eid = $_GET['editid'];
            $kode_makeup = $row["kode_makeup"];
            $ret2 = mysqli_query($db, "select harga from makeup where kode_makeup='$kode_makeup'");
            while ($row2 = mysqli_fetch_array($ret2)) {
            ?>
                <?php
                $eid = $_GET['editid'];
                $kode_item = $row["kode_item"];
                $ret3 = mysqli_query($db, "select harga_item from item_tambahan where kode_item='$kode_item'");
                while ($row3 = mysqli_fetch_array($ret3)) {
                ?>
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="m-0">Edit Data Pesanan</h1>
                                    </div><!-- /.col -->
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Edit Data Pesanan</li>
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
                                                <h3 class="card-title">Edit Data Pesanan</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ID Pesanan</label>
                                                        <input type="text" name="id_pelanggan" class="form-control" value="<?php echo $row["id"]; ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ID Pelanggan</label>
                                                        <input type="text" name="id_user" class="form-control" value="<?php echo $row["id_user"]; ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Make Up</label>
                                                        <input type="text" name="kode_makeup" class="form-control" value="<?php echo $row["kode_makeup"]; ?>">
                                                    </div>
                                                    <div class="form-group" hidden>
                                                        <label>Harga Make Up</label>
                                                        <input type="text" name="harga" class="form-control" value="<?php echo $row2["harga"]; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Item</label>
                                                        <input type="text" name="kode_item" class="form-control" value="<?php echo $row["kode_item"]; ?>">
                                                    </div>
                                                    <div class="form-group" hidden>
                                                        <label>Harga Item Tambahan</label>
                                                        <input type="text" name="harga_item" class="form-control" value="<?php echo $row3["harga_item"]; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Make Up</label>
                                                        <textarea name="tanggal_makeup" class="form-control"><?php echo $row["tanggal_makeup"]; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="custom-select" name="status" id="status">
                                                            <option value="<?php echo $row["status"]; ?>"><?php echo $row["status"]; ?></option>
                                                            <option value="Proses Make Up">Konfirmasi Pesanan</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                                    <button type="submit" class="btn btn-success" name="submit">Konfirmasi</button>
                                                    <a href="pesanan.php" class="btn btn-secondary ml-2">Cancel</a>
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
            <?php
            }
            ?>
        <?php
        }
        ?>