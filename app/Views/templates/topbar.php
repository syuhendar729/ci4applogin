                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                            <i class="fa fa-bars">
                            </i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block">
                            </div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?=user()->username;?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="<?=base_url();?>/img/<?=user()->user_image;?>">
                                    </img>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <a class="dropdown-item" href="<?=base_url();?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        My Profile
                                    </a>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->