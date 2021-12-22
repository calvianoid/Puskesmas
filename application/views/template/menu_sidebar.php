<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo base_url('menu/utama');?>">
                    <img src="<?php echo base_url();?>assets/images/icon/logo_puskesmas.png" alt="Puskesmas" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="<?php echo base_url('menu/utama');?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('user/list_user');?>">
                                <i class="fa fa-address-book"></i>Kelola Pengguna</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('user_level/list_user_level');?>">
                                <i class="fa fa-users"></i>Level Pengguna</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-database"></i>Data Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('pasien/list_pasien');?>">Data Pasien</a>
                                </li>    
                                <li>
                                    <a href="<?php echo base_url('obat/list_obat');?>">Data Obat</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('dokter/list_dokter')?>">Data Dokter</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('poli/list_poli')?>">Data Poli</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('supplier/list_supplier')?>">Data Supplier</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('jadwal_praktek/list_jadwal_praktek')?>">
                                <i class="fa fa-calendar-check"></i>Jadwal Praktek Dokter</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('stokobat/list_stok_obat')?>">
                                <i class="fa fa-database"></i>Stok Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('resep/list_resep')?>">
                                <i class="fa fa-calendar-check"></i>Data Resep Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pengadaanobat/list_pengadaanobat')?>">
                                <i class="	fa fa-cart-plus"></i>Data Pengadaan Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pendaftaran/list_pendaftaran')?>">
                                <i class="fa fa-bed"></i>Data Pendaftaran</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pembayaran/list_pembayaran')?>">
                                <i class="fa fa-cart-arrow-down"></i>Data Pembayaran Obat</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>