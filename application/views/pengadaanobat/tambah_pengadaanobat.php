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
    <title>TAMBAH DATA PENGADAAN OBAT</title>
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
        <?php $this->load->view('template/header_mobile2.php'); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php $this->load->view('template/menu_sidebar2.php');?>
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
                        <h1>TAMBAH DATA PENGADAAN OBAT</h1></br>
                            <td colspan="1">
                            <form action = "<?php echo base_url('pengadaanobat/simpan_pengadaanobat')?>" method="post" class="well form-horizontal">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KODE PENGADAAN</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input readonly="" id="kode_pengadaan" name="kode_pengadaan" placeholder="Kode Pengadaan" class="form-control" value="<?php echo $kode_pengadaan; ?>" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">NAMA SUPPLIER</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <select name="nama_supplier" id="nama_supplier" class="form-control">
                                                <option value="0">- Pilih Supplier -</option>
                                                    <?php foreach($sp->result() as $r){
                                                      echo "<option value='$r->nama_supplier'>$r->nama_supplier</option>";
                                                    };?>
                                            </select></div>    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KODE OBAT</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input list="data_obat" id="kode_obat" name="kode_obat" placeholder="Kode Obat" class="form-control" required="true" value="" type="text" onchange="return autofill();"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">HARGA OBAT</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="harga_obat" name="harga_obat" placeholder="Harga Obat" readonly="" class="form-control" required="true" value="" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">STOK OBAT</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="jumlah_obat" name="stok_obat" placeholder="Stok Obat" readonly="" class="form-control"  required="true" value="" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">JUMLAH BELI</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="txt2" name="jumlah_beli" placeholder="- Jumlah Beli -" class="form-control" required="true" value="" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">TOTAL HARGA</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="txt5" onkeyup="totalharga();" name="total_harga"  placeholder="- Total Harga -" class="form-control" required="true" readonly="" value="" type="text"></div>
                                        </div>
                                    </div><div class="form-group">
                                        <label class="col-md-4 control-label">TOTAL AKHIR OBAT</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="txt3" onkeyup="sum();" name="total_obat" placeholder="- Total Obat -" class="form-control" required="true" readonly="" value="" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">TANGGAL TRANSAKSI</label>
                                        <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi" class="form-control" required="true" value="<?php echo date('Y-m-d'); ?>" type="date"></div>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger btn-lg active" href="<?php echo base_url('pengadaanobat/list_pengadaanobat');?>">
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
    <datalist id="data_obat">
    <?php
    foreach ($o->result() as $b)
    {
        echo "<option value='$b->kode_obat'>$b->nama_obat</option>";
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
function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah_obat').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result =  parseInt(txtSecondNumberValue) + parseInt(txtFirstNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>
<script>
function totalharga() {
      var txtFirstNumberValue = document.getElementById('txt2').value;
      var txtSecondNumberValue = document.getElementById('harga_obat').value;
      var result =  parseInt(txtSecondNumberValue) * parseInt(txtFirstNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt5').value = result;
      }
}
</script>
<script>
    function autofill(){
        var kode_obat =document.getElementById('kode_obat').value;
        $.ajax({
                       url:"<?php echo base_url();?>pengadaanobat/cari",   
                       data:'&kode_obat='+kode_obat,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                 
               document.getElementById('kode_obat').value=val.kode_obat;
                           document.getElementById('harga_obat').value=val.harga_obat;
                           document.getElementById('jumlah_obat').value=val.jumlah_obat;  
                                
                     
                });
            }
                   });
                   
    }
</script>
<!-- end document-->