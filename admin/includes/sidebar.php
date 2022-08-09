<?php

    $showDrop = ''; // change between assets, reports, users, settings

    $url = $_SERVER['PHP_SELF'];

    if(
        $url == '/my-records/admin/congregations.php' ||
        $url == '/my-records/admin/funders.php' ||
        $url == '/my-records/admin/missions.php' ||
        $url == '/my-records/admin/priests.php' ||
        $url == '/my-records/admin/projects.php' ||
        $url == '/my-records/admin/seminarians.php'
    ){
        $showDrop = 'records';
    }
    else if(
        $url == '/my-records/admin/new-user.php' ||
        $url == '/my-records/admin/edit-user.php' ||
        $url == '/my-records/admin/users-list.php'
    ){
        $showDrop = 'users';
    }
    else if(
        $url == '/my-records/admin/change-password.php'
    ){
        $showDrop = 'settings';
    }
    else{
        $showDrop = '';
    }

?>

<style>
    .nav-treeview > .nav-item > a.nav-link.active {
        border-right: 5px solid lightgreen !important;
    }
</style>

<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="Admin Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MyRECORDS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="../dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username'] ?? 'User'; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/index.php') echo 'active'; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if($showDrop == 'records') echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if($showDrop == 'records') echo 'active'; ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Records
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="congregations.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/congregations.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Congregations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="funders.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/funders.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Funders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="missions.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/missions.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Missions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="priests.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/priests.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Priests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="projects.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/projects.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="seminarians.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/seminarians.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seminarians</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if($showDrop == 'users') echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if($showDrop == 'users') echo 'active'; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="new-user.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/new-user.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="users-list.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/users-list.php') echo 'active'; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if($showDrop == 'settings') echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if($showDrop == 'settings') echo 'active'; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./change-password.php" class="nav-link <?php if($_SERVER['PHP_SELF'] == '/my-records/admin/change-password.php') echo 'active'; ?>"">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>