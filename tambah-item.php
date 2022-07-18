<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
?>
<?php
require_once "config.php";

$kode_item = $nama_item = $harga_item = "";
$kode_item_err = $nama_item_err = $harga_item_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_kode_item = trim($_POST["kode_item"]);
    if (empty($input_kode_item)) {
        $kode_item_err = "Masukan kode item.";
    } else {
        $kode_item = $input_kode_item;
    }

    $input_nama_item = trim($_POST["nama_item"]);
    if (empty($input_nama_item)) {
        $nama_item_err = "Masukan nama item.";
    } else {
        $nama_item = $input_nama_item;
    }

    $input_harga_item = trim($_POST["harga_item"]);
    if (empty($input_harga_item)) {
        $harga_item_err = "Masukan harga item.";
    } elseif (!ctype_digit($input_harga_item)) {
        $harga_item_err = "Mohon masukkan harga item yang benar.";
    } else {
        $harga_item = $input_harga_item;
    }

    if (empty($kode_item_err) && empty($nama_item_err) && empty($harga_item_err)) {

        $sql = "INSERT INTO item_tambahan (kode_item, nama_item, harga_item) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($db, $sql)) {

            mysqli_stmt_bind_param($stmt, "sss", $param_kode_item, $param_nama_item, $param_harga_item);

            $param_kode_item = $kode_item;
            $param_nama_item = $nama_item;
            $param_harga_item = $harga_item;

            if (mysqli_stmt_execute($stmt)) {
                header("location: item_tambahan.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($db);
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
    <title>Tambah Data Item Tambahan | Ochii Make Up Artist</title>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Item Tambahan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Item Tambahan</li>
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
                            <h3 class="card-title">Tambah Data Item Tambahan Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label>Kode Item</label>
                                    <input type="text" name="kode_item" class="form-control <?php echo (!empty($kode_item_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kode_item; ?>">
                                    <span class="invalid-feedback"><?php echo $kode_item_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Nama Item</label>
                                    <input type="text" name="nama_item" class="form-control <?php echo (!empty($nama_item_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nama_item; ?>">
                                    <span class="invalid-feedback"><?php echo $nama_item_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Harga Item</label>
                                    <input type="text" name="harga_item" class="form-control <?php echo (!empty($harga_item_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $harga_item; ?>">
                                    <span class="invalid-feedback"><?php echo $harga_item_err; ?></span>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="item_tambahan.php" class="btn btn-secondary ml-2">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>

</html>

<?php
include "footer.php";
?>