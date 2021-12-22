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
                            <a href="<?php echo base_url('stokobat/list_stok_obat')?>">
                                <i class="fa fa-database"></i>Stok Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('resep/list_resep')?>">
                                <i class="fa fa-calendar-check"></i>Data Resep Obat</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('pendaftaran/list_pendaftaran')?>">
                                <i class="fa fa-bed"></i>Data Pendaftaran</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>