<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="<?php echo base_url('menu/utama');?>">
                    <img src="<?php echo base_url();?>assets/images/icon/logo_puskesmas.png" alt="Puskesmas" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo base_url('menu/utama');?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('user/list_user');?>">
                                <i class="fa fa-address-book"></i>Kelola Pengguna</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Level Pengguna</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('obat/list_obat');?>">
                                <i class="fa fa-database"></i>Data Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('stokobat/list_stok_obat')?>">
                                <i class="fa fa-database"></i>Stok Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pengadaanobat/list_pengadaanobat')?>">
                                <i class="	fa fa-cart-plus"></i>Data Pengadaan Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('poli/list_poli')?>">
                                <i class="fa fa-database"></i>Data Poli</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dokter/list_dokter')?>">
                                <i class="fa fa-database"></i>Data Dokter</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('jadwal_praktek/list_jadwal_praktek')?>">
                                <i class="fa fa-calendar-check"></i>Jadwal Praktek Dokter</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('supplier/list_supplier')?>">
                                <i class="fa fa-database"></i>Data Supplier</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pendaftaran/list_pendaftaran')?>">
                                <i class="fa fa-bed"></i>Data Pendaftaran</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fa fa-cart-arrow-down"></i>Data Pembayaran Obat</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>