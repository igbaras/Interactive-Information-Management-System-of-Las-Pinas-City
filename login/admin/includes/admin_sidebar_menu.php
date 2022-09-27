<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
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
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
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

                        <li class="nav-item ">
                            <a href="./posts.php?source=add_post" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="./posts.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Posts</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item <?= ($activePage == 'gallery.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="gallery.php?source=add_image" class="nav-link <?= ($activePage == 'gallery.php?source=add_image') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add picture</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gallery.php" class="nav-link <?= ($activePage == 'gallery.php?source=view_all_images') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View all pictures</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                        <i class="nav-icon fas fa-vr-cardboard"></i>
                        <p>Virtual Tour</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Virtual
                                tour </a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>View all
                                virtual tour </a></li>
                    </ul>
                </li>

                <li class="nav-header">OTHER CONFIGURATIONS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Dev Tools</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i>Item1</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>Item2</a></li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Users</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>My Profile</a>
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