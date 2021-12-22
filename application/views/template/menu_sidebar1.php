<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo base_url('menu/utama1');?>">
                    <img src="<?php echo base_url();?>assets/images/icon/logo_puskesmas.png" alt="Puskesmas" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="<?php echo base_url('menu/utama1');?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-database"></i>Data Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('pasien/list_pasien');?>">Data Pasien</a>
                                </li>    
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('jadwal_praktek/list_jadwal_praktek')?>">
                                <i class="fa fa-calendar-check"></i>Jadwal Praktek Dokter</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pendaftaran/list_pendaftaran')?>">
                                <i class="fa fa-bed"></i>Data Pendaftaran</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>