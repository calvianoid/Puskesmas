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
                            <a href="<?php echo base_url('stokobat/list_stok_obat')?>">
                                <i class="fa fa-database"></i>Stok Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pendaftaran/list_pendaftaran')?>">
                                <i class="fa fa-bed"></i>Data Pendaftaran</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('resep/list_resep')?>">
                                <i class="fa fa-bed"></i>Data Resep Obat</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>