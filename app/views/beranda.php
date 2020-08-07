<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?=constant("namaAPP")?>">
  <meta name="author" content="hamroy">
  <meta name="keyword" content="aplikasi cuti, Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?=base_url()?>icon/l-ecuti.png">

  <title><?=constant("namaAPP")?></title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url()?>dist2/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url()?>dist2/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url()?>dist2/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url()?>dist2/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <!-- Custom styles -->
  <link href="<?=base_url()?>dist2/css/style.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>dist/css/datepicker.css">
  <style>
         .datepicker {
              z-index: 1600 !important; /* has to be larger than 1050 */
            }
    </style>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="<?=base_url('C_beranda')?>" class="logo">E <span class="lite">Cuti</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="profile-ava">
                                <img alt="" width="27px" height="30px" src="<?=base_url($_SESSION['profil'])?>" />
                            </span>
                            <span class="username"><?=$_SESSION['nm_user']?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="<?=base_url('C_beranda/profil')?>"><i class="icon_profile"></i> Profil</a>
              </li>
              <li>
                <a href="<?=base_url('C_beranda/gantiSandi')?>"><i class="icon_key_alt"></i> Ganti Password</a>
              </li>
              <li>
                <a onclick="return confirm('Anda yakin')" href="<?=base_url('C_login/logout')?>"><i class="icon_out"></i> Keluar</a>
              </li>

            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <?php
    $akses=$this->session->userdata('lvl_akses');
    if ($akses==1) {
        require 'layout2/menuSlide.php';
    }else{
        require 'layout2/menuSlide2.php';
    }
    ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content" style="color: black">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> <?=$judul?></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?=base_url('C_beranda')?>">Beranda</a></li>
              <li><i class="fa fa-laptop"></i><?=$judul?></li>
            </ol>
          </div>
        </div>

        <div class="row">

        

        <div class="col-md-12">
        <?php
        $message = $this->session->flashdata('pesan');
        echo $message == '' ? '' : '<div class="alert alert-success" ><button type="button" class="close" data-dismiss="alert">&times;</button><p class="h4"><b>' . $message . '</b></p></div>';
        ?>
              <?php 
              // KONTEN
              if (empty($isi)) {
              require 'isi2.php';
              }else{
              $this->load->view($isi);
              }
              ?>
           
        </div>

        <!-- Modal Popup untuk Edit--> 
        <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        </div>
     
        <!-- project team & activity end -->

      </section>

      <div class="text-center">
        <div class="credits">
          <div><?=namaAPP?> © 2019 - <?=date('Y')?></div>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->


  <!-- javascripts -->
  
  <!-- javascripts -->
  <script src="<?=base_url()?>dist2/js/jquery.js"></script>
  <!-- bootstrap -->
  <script src="<?=base_url()?>dist2/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?=base_url()?>dist2/js/jquery.scrollTo.min.js"></script>
  <script src="<?=base_url()?>dist2/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="<?=base_url()?>dist2/js/scripts.js"></script>
  <!-- datepicker -->
  <script src="<?=base_url()?>dist2/js/bootstrap-datepicker.js"></script>
  
  <!-- Javascript untuk popup modal Edit--> 
  <script type="text/javascript">
     $(document).ready(function () {
     $(".open_modal").click(function(e) {
        var m = $(this).attr("id");
        var url = $(this).attr("data-url");
        console.log(url);
         $.ajax({
               url: url,
               type: "GET",
               data : {modal_id: m,},
               success: function (ajaxData){
                 $("#ModalEdit").html(ajaxData);
                 $("#ModalEdit").modal('show',{backdrop: 'true'});
               }
             });
          });
        });
  </script>

   <script>
        $(function(){
            $("#tanggal,#tanggal1, #tanggal2 ,#tanggal3,#tanggal4").datepicker({
            format:'dd/mm/yyyy'
            });

            $("#_tgl1,#_tgl2").datepicker({
            format:'yyyy/mm/dd'
            });
        });
    </script>

</body>

</html>
