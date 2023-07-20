<script src="assets/assets_admin/assets/plugins/Jquery/dist/jquery.min.js"></script>
<script src="assets/assets_admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/assets_admin/assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="assets/assets_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Scrollbar JS-->
<script src="assets/assets_admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/assets_admin/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="assets/assets_admin/assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="assets/assets_admin/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- Sparkline charts -->
<script src="assets/assets_admin/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- Counter js  -->
<script src="assets/assets_admin/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/assets_admin/assets/plugins/countdown/js/jquery.counterup.js"></script>

<!-- Echart js -->
<script src="assets_admin/assets/plugins/charts/echarts/js/echarts-all.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<!-- custom js -->
<script type="text/javascript" src="assets/assets_admin/assets/js/main.min.js"></script>
<script type="text/javascript" src="assets/assets_admin/assets/pages/dashboard.js"></script>
<script type="text/javascript" src="assets/assets_admin/assets/pages/elements.js"></script>
<script src="assets/assets_admin/assets/js/menu.min.js"></script>
<script>
  var $window = $(window);
  var nav = $('.fixed-button');
  $window.scroll(function() {
    if ($window.scrollTop() >= 200) {
      nav.addClass('active');
    } else {
      nav.removeClass('active');
    }
  });
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable({
      "lengthChange": false
    });
  });
</script>
</body>

</html>