<?php

    session_start();
    include('./includes/dbcon.php');

    if(!isset($_SESSION['username'])){
        echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    }

    include('./controllers/homeCon.php');

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../dist/img/AdminLTELogo.png"/>

  <title>MyRECORDS | Home</title>

  <?php include('./includes/styles.php'); ?>
  
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include('./includes/header.php'); ?>

        <!-- Main Sidebar Container -->
        <?php include('./includes/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Priests</span>
                                <span class="info-box-number">
                                    <?php echo $stats[0]['priests']; ?>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Congregations</span>
                                <span class="info-box-number"><?php echo $stats[0]['congs']; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-church"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Missions</span>
                                <span class="info-box-number"><?php echo $stats[0]['missions']; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-project-diagram"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Projects</span>
                                <span class="info-box-number"><?php echo $stats[0]['proj']; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-6">
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Letters</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date&nbsp;Received</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($letters as $r) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $r['from']; ?></td>
                                                    <td><?php echo $r['title']; ?></td>
                                                    <td>
                                                        <a target="_blank" class="text-primary" href="./<?php echo $r['fname']; ?>">
                                                            <i class="fa fa-file-download"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <!-- <a href="./new-item.php" class="btn btn-sm btn-outline-info float-left">
                                    <i class="fas fa-plus mr-2"></i> View New
                                </a> -->
                                <a href="./letters.php" class="btn btn-sm btn-outline-secondary float-right">
                                    <i class="fas fa-list-ul mr-2"></i> View All
                                </a>
                            </div>
                            <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Upcoming Conferences</h3>

                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($confs as $r) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $r['name']; ?></td>
                                                    <td><?php echo $r['location']; ?></td>
                                                    <td><?php echo $r['date']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <!-- <a href="./new-item.php" class="btn btn-sm btn-outline-info float-left">
                                    <i class="fas fa-plus mr-2"></i> View New
                                </a> -->
                                <a href="./xconferences.php" class="btn btn-sm btn-outline-secondary float-right">
                                    <i class="fas fa-list-ul mr-2"></i> View All
                                </a>
                            </div>
                            <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include('./includes/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include('./includes/javascripts.php'); ?>
    
</body>
</html>
