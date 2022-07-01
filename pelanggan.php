<?php
    session_start();
    if(empty($_SESSION['username'])){
    header("location:login.php");  
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
    <!-- /.content-header -->
    <div class="d-flex justify-content-center">
      <img src="dist/img/ochii-logo.jpg"></img>
    </div></br>
  </div>
</html>

<?php
include "footer.php";
?>