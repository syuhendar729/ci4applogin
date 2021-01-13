<!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-fire">
                        </i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        MyWebsite
                    </div>
                </a>

                <?php if (in_groups('admin')): ?>
                <!-- Divider -->
                <div class="sidebar-heading">
                    User management
                </div>
                <hr class="sidebar-divider">
                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse Menu -->
                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('admin');?>">
                            <i class="fas fa-users fa-chart-area">
                            </i>
                            <span>
                                User List
                            </span>
                        </a>
                    </li>
                <?php endif;?>

                <!-- Divider -->
                <hr class="sidebar-divider">
                    <!-- Heading -->
                    <!-- Nav Item - Pages Collapse Menu -->
                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>">
                            <i class="fas fa-user fa-chart-area">
                            </i>
                            <span>
                                My profile
                            </span>
                        </a>
                    </li>
                    <!-- Nav Item - Tables -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>">
                            <i class="fas fa-user-edit fa-table">
                            </i>
                            <span>
                                Edit profile
                            </span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('logout');?>">
                                <i class="fas fa-sign-out-alt">
                                </i>
                                <span>
                                    Logout
                                </span>
                            </a>
                        </li>
                    </hr>
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle">
                            </button>
                        </div>
                    </hr>
                </hr>
            </ul>
            <!-- End of Sidebar -->
