<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    // Prepare a delete statement
    $sql = "UPDATE pesanan set status='Proses Make Up' WHERE id = ?";

    if ($stmt = mysqli_prepare($db, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_POST["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records deleted successfully. Redirect to landing page
            header("location: pesanan.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($db);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
    <title>Konfirmasi Pesanan | Ochii Make Up Artist</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="mt-5 mb-3">Konfirmasi Pesanan</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-success">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Anda yakin ingin konfirmasi pesanan ini?</p>
                            <p>
                        </div>
                        <input type="submit" value="Yakin" class="btn btn-success">
                        <a href="pesanan.php" class="btn btn-danger">Tidak</a>
                        </p>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<?php
include "footer.php";
?>

</html>