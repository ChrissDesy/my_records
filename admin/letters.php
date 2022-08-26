<?php

    session_start();
    include('./includes/dbcon.php');
    include('./controllers/lettersCon.php');

    if(!isset($_SESSION['username'])){
        echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    }

    //get employees
    $sql = "SELECT * FROM letters";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    // echo $result;

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

  <title>MyRECORDS | Letters</title>

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
                            <h1 class="m-0 text-dark">Letters</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Letters</a></li>
                            <li class="breadcrumb-item active">All Letters</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6"><h3 class="card-title">List of Letters</h3></div>
                                <div class="col-md-6 text-right">
                                    <button data-target="#add" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Title</th>
                                            <th>From</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $r) {
                                            ?>
                                            <tr>
                                                <td><?php echo $r['id']; ?></td>
                                                <td><?php echo $r['title']; ?></td>
                                                <td><?php echo $r['from']; ?></td>
                                                <td><?php echo $r['date']; ?></td>
                                                <td>
                                                    <a target="_blank" class="text-primary" href="./<?php echo $r['fname']; ?>">
                                                        <i class="fa fa-file-download"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="text-warning mr-3" data-target="#edit" data-toggle="modal" data-myid="<?php echo $r['id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </span>
                                                    <span class="text-danger" data-target="#delete" data-toggle="modal" data-myid="<?php echo $r['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include('./includes/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    From
                                    <input type="text" name="from" required placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    Date
                                    <input type="date" name="date" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    Title
                                    <input type="text" name="title" required placeholder="Title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    File
                                    <input type="file" name="file" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="text-center">
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-primary" type="submit" name="addRec" class="form-control">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="row">
                            <div hidden>
                                <input type="text" name="id" id="eId">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    From
                                    <input type="text" name="from" id="eFrom" required placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    Date
                                    <input type="date" name="date" id="eDate" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    Title
                                    <input type="text" name="title" id="eTitle" required placeholder="Title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="text-center">
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-primary" type="submit" name="editRec" class="form-control">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div align="center">
                            <h3>Confirm Delete Record.?</h3>
                            <input type="text" class="form-control" id="myId2" name="id" style="display:none;">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-sm btn-danger" type="submit" name="deleteRec" class="form-control">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

    <!-- REQUIRED SCRIPTS -->
    <?php include('./includes/javascripts.php'); ?>

    <script>
        let data;

        $(function () {
            $("#example1").DataTable();

            data = <?php echo json_encode($result); ?>;

            // console.log(data);
        });

        $("#edit").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('myid');

            // console.log(obj);
			$('#eId').val(Id);
            let info;
            data.forEach(r => {
                if(r.id == Id){
                    info = r;
                }
            });

            $('#eTitle').val(info.title);
            $('#eDate').val(info.date);
            $('#eFrom').val(info.from);

        });

        $("#delete").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('myid');

            // console.log(obj);
			$('#myId2').val(Id);
        });
    </script>
    
</body>
</html>
