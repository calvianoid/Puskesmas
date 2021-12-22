<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>TAMBAH DATA PENDAFTARAN</title>
    <link href="<?php echo base_url();?>assets/images//icon/logo_puskesmas_mini.png" type='image/x-icon' rel='shortcut icon'>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url();?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php $this->load->view('template/header_mobile1.php'); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php $this->load->view('template/menu_sidebar1.php');?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
        
        <!-- HEADER DESKTOP-->
        <?php $this->load->view('template/header_desktop.php');?>
        <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                     </div>
                     <head>
                    <center>
                    </head>
                        <h1>TAMBAH DATA PENDATARAN</h1></br>
                            <td colspan="1">
                            <form action = "<?php echo base_url('pendaftaran/proses_tambah_pendaftaran')?>" method="post" class="well form-horizontal">
                                <fieldset>
                                <div class="form-group">
                                        <label class="col-md-4 control-label">KODE PENDAFTARAN</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input list="data_pasien" id="kode_antrian" name="kode_antrian" placeholder="Kode Antrian" class="form-control" required="true" value="" type="text" onchange="return autofill();"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">TANGGAL PENDAFTARAN</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="tanggal_pendaftaran" name="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran" class="form-control" required="true" value="<?php echo date('Y-m-d'); ?>" type="date"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">NAMA PASIEN</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input readonly="" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" class="form-control" required="true" value="" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">POLI TUJUAN</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <select name="nama_poli" id="nama_poli" class="form-control">
                                                <option value="0"> Pilih Poli Tujuan </option>
                                                    <?php foreach($p->result() as $r){
                                                      echo "<option value='$r->nama_poli'>$r->nama_poli</option>";
                                                    };?>
                                            </select></div>    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KODE DOKTER</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <select name="nama_dokter" id="nama_dokter" class="form-control">
                                                <option value="0"> Pilih Dokter </option>
                                                    <?php foreach($d->result() as $r){
                                                      echo "<option value='$r->nama_dokter'>$r->nama_dokter</option>";
                                                    };?>
                                            </select></div>    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">NAMA USER</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="nama_user" name="nama_user" placeholder="Id User" class="form-control" required="true" value="<?php echo $this->session->userdata('nama_user')?>" readonly="" type="text"></div>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger btn-lg active" href="<?php echo base_url('pendaftaran/list_pendaftaran');?>">
                                    </i>Kembali</a>
                                    <input class="btn btn-primary btn-lg active" required="true" value="Simpan" type="submit">      
                                </fieldset>
                            </form>
                            </td>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                <p>Copyright © 2019 Puskesmas Pembantu Kedung Waringin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <datalist id="data_pasien">
    <?php
    foreach ($data_pasien->result() as $b)
    {
        echo "<option value='$b->id_pasien'>$b->nama_pasien</option>";
    }
    ?>
    </datalist>

    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url();?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>

</html>
<script>
    function autofill(){
        var id_pasien =document.getElementById('kode_antrian').value;
        $.ajax({
                       url:"<?php echo base_url();?>pendaftaran/cari",   
                       data:'&kode_antrian='+id_pasien,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                 
               document.getElementById('kode_antrian').value=val.id_pasien;
                           document.getElementById('nama_pasien').value=val.nama_pasien;  
                });
            }
        });
    }
</script>
<!-- end document-->