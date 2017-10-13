   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url() ?>assets/images/user.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="bg-leftmenu">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" width="250" height="250" alt="Client" />
                </div>
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php echo ismenuactive("home", $menu_active); ?>">
                        <a href="<?php echo base_url();?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="<?php echo ismenuactive("penjualan", $menu_active); ?>">
                        <a href="pages/typography.html">
                            <i class="material-icons">shopping_cart</i>
                            <span>Penjualan</span>
                        </a>
                    </li>
                    <li class="<?php echo ismenuactive("pembelian", $menu_active); ?>">
                        <a href="<?php echo base_url()?>Pembelian">
                            <i class="material-icons">shopping_basket</i>
                            <span>Pembelian</span>
                        </a>
                    </li>

                    <li class="<?php echo ismenuactive("retur", $menu_active); ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Retur</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url()?>Retur/returpenjualan">Retur Penjualan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>Retur/returpembelian">Retur Pembelian</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php echo ismenuactive("laporan", $menu_active); ?>">
                        <a href="<?php echo base_url()?>Laporan">
                            <i class="material-icons">library_books</i>
                            <span>Laporan</span>
                        </a>
                    </li>

                    <li class="<?php echo ismenuactive("master", $menu_active); ?>">
                        <a href="<?php echo base_url()?>Master">
                            <i class="material-icons">collections_bookmark</i>
                            <span>Master Data</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);"> Vicky Indiarto - Bekasi</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->       
    </section>