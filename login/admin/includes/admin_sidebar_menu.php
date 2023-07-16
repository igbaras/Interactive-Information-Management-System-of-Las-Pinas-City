<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="settings.php?source=my_profile&uidd=<?php echo $_SESSION['user_id']; ?>" class="brand-link">
        <!-- <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span>Role: </span>
        <span class="brand-text font-weight-strong"><?php echo $_SESSION['user_role']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="<?php echo $_SESSION['user_image']; ?>" class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a href="settings.php?source=my_profile&uidd=<?php echo $_SESSION['user_id']; ?>" class="d-block"><?php echo $_SESSION['user_firstname'] . " " . $_SESSION['user_lastname']; ?></a>
            </div>
        </div>

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

                    <a href="portal.php" class="nav-link <?= ($activePage == 'portal.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Site
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="https://business.facebook.com/latest/inbox/all?asset_id=109053242246987" target="_blank" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Home</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./categories.php" class="nav-link <?= ($activePage == 'categories.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Manage Categories
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
                <li class="nav-item <?= ($activePage == 'lifestyles.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-heartbeat"></i>
                        <p>
                            Manage Lifestyles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item active">
                            <a href="./lifestyles.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Lifestyles</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="./lifestyles.php?source=lifestyle_com" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Lifestyle Comments</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item <?= ($activePage == 'gallery.php') ? 'menu-open' : ''; ?>">
                    <a href="./gallery.php" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery

                        </p>
                    </a>

                </li>
                <li class="nav-item <?= ($activePage == 'vt.php') ? 'menu-open' : ''; ?>">
                    <a href="./vt.php" class="nav-link">
                        <i class="nav-icon fas fa-vr-cardboard"></i>
                        <p>
                            Virtual Tour </p>
                    </a>

                </li>
                <li class="nav-item <?= ($activePage == 'ads.php') ? 'menu-open' : ''; ?>">
                    <a href="./ads.php" class="nav-link">
                        <i class="nav-icon fas fa-ad"></i>
                        <p>
                            Advertisements </p>
                    </a>

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
                            <a href="./settings.php?source=manage_users&uid=<?php echo $_SESSION['user_id']; ?>" class="nav-link"><i class="far fa-circle nav-icon"></i>Private Accounts</a>
                        </li>

                        <li class="nav-item">
                            <a href="./settings.php?source=public_user" class="nav-link"><i class="far fa-circle nav-icon"></i>Public Accounts</a>
                        </li>

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