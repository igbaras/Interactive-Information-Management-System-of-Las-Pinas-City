<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">

        Role: <span class="brand-text font-weight-light"><?php echo $_SESSION['user_role']; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <?php $activePage = basename($_SERVER['PHP_SELF']); ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">

                    <a href="writer_portal.php" class="nav-link <?= ($activePage == 'writer_portal.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            View Site

                        </p>
                    </a>

                </li>

                <li class="nav-item <?= ($activePage == 'posts.php') ? 'menu-open' : ''; ?><?= ($activePage == 'news.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Manage Posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item active">
                            <a href="./posts.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Posts</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="./posts.php?source=post_com" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Post Comments</p>
                            </a>
                        </li>
                    </ul>

                </li>


                <li class="nav-header">OTHER CONFIGURATIONS</li>

                <li class="nav-item  <?= ($activePage == 'settings.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="./settings.php?source=my_profile&uidd=<?php echo $_SESSION['user_id']; ?>" class="nav-link"><i class="far fa-circle nav-icon"></i>My Profile</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="../user_logout.php" class="nav-link">
                        <i class=" nav-icon fa fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>