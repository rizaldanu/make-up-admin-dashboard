<?php
    session_start();
    if(empty($_SESSION['username'])){
    header("location:login.php");  
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
  <title>Data Jenis Make Up | Ochii Make Up Artist</title>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Jenis Make Up</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Jenis Make Up</li>
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