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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];

    //Query for data updation
    $query = mysqli_query($db, "update user set first_name='$first_name', last_name='$last_name', phone='$phone', alamat='$alamat' where ID='$eid'");

    if ($query) {
        echo "<script>alert('Data telah berhasil diubah.');</script>";
        echo "<script type='text/javascript'> document.location ='pelanggan.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>

<?php
$page = 'pelanggan';
include "header.php";
include "navigation.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Pelanggan | Ochii Make Up Artist</title>
</head>

<body>

    <form method="POST">
        <?php
        $eid = $_GET['editid'];
        $ret = mysqli_query($db, "select * from user where ID='$eid'");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Edit Data Pelanggan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Data Pelanggan</li>
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
                                        <h3 class="card-title">Edit Data Pelanggan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" value="<?php echo $row["username"]; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Depan</label>
                                                <input type="text" name="first_name" class="form-control" value="<?php echo $row["first_name"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Belakang</label>
                                                <input type="text" name="last_name" class="form-control" value="<?php echo $row["last_name"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Handphone</label>
                                                <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control"><?php echo $row["alamat"]; ?></textarea>
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