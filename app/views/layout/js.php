<!-- CoreUI and necessary plugins-->
    <script src="<?=base_url()?>dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="<?=base_url()?>dist/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <script src="<?=base_url()?>dist/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
    <script src="<?=base_url()?>dist/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?=base_url()?>dist/js/main.js"></script>


    <script src="<?=base_url()?>dist/js/bootstrap-datepicker.js"></script>

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