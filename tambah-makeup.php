<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
?>
<?php
require_once "config.php";

$kode_makeup = $jenis_makeup = $keterangan = $harga = "";
$kode_makeup_err = $jenis_makeup_err = $keterangan_err = $harga_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_kode_makeup = trim($_POST["kode_makeup"]);
    if (empty($input_kode_makeup)) {
        $kode_makeup_err = "Masukan kode make up.";
    } else {
        $kode_makeup = $input_kode_makeup;
    }

    $input_jenis_makeup = trim($_POST["jenis_makeup"]);
    if (empty($input_jenis_makeup)) {
        $jenis_makeup_err = "Masukan jenis make up.";
    } else {
        $jenis_makeup = $input_jenis_makeup;
    }

    $input_keterangan = trim($_POST["keterangan"]);
    if (empty($input_keterangan)) {
        $keterangan_err = "Masukan keterangan.";
    } else {
        $keterangan = $input_keterangan;
    }

    $input_harga = trim($_POST["harga"]);
    if (empty($input_harga)) {
        $harga_err = "Masukan harga.";
    } elseif (!ctype_digit($input_harga)) {
        $harga_err = "Mohon masukkan harga yang benar.";
    } else {
        $harga = $input_harga;
    }

    if (empty($kode_makeup_err) && empty($jenis_makeup_err) && empty($keterangan_err) && empty($harga_err)) {

        $sql = "INSERT INTO makeup (kode_makeup, jenis_makeup, keterangan, harga) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($db, $sql)) {

            mysqli_stmt_bind_param($stmt, "ssss", $param_kode_makeup, $param_jenis_makeup, $param_keterangan, $param_harga);

            $param_kode_makeup = $kode_makeup;
            $param_jenis_makeup = $jenis_makeup;
            $param_keterangan = $keterangan;
            $param_harga = $harga;

            if (mysqli_stmt_execute($stmt)) {
                header("location: makeup.php");
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
$page = 'makeup';
include "header.php";
include "navigation.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Make Up | Ochii Make Up Artist</title>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Jenis Make Up</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Jenis Make Up</li>
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
                            <h3 class="card-title">Tambah Jenis Make Up Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label>Kode Make Up</label>
                                    <input type="text" name="kode_makeup" class="form-control <?php echo (!empty($kode_makeup_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kode_makeup; ?>">
                                    <span class="invalid-feedback"><?php echo $kode_makeup_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Make Up</label>
                                    <input type="text" name="jenis_makeup" class="form-control <?php echo (!empty($jenis_makeup_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $jenis_makeup; ?>">
                                    <span class="invalid-feedback"><?php echo $jenis_makeup_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control <?php echo (!empty($keterangan_err)) ? 'is-invalid' : ''; ?>"><?php echo $keterangan; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $keterangan_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control <?php echo (!empty($harga_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $harga; ?>">
                                    <span class="invalid-feedback"><?php echo $harga_err; ?></span>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="makeup.php" class="btn btn-secondary ml-2">Cancel</a>
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