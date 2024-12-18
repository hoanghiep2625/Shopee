</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
    $(function() {
        $("#datatable1").DataTable({
            "responsive": false,
            "autoWidth": false,
        });
    });
</script>
<script src="admin/includes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="admin/includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<!-- Bootstrap 4 -->
<script src="admin/includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/includes/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/includes/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/includes/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/includes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/includes/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/includes/plugins/moment/moment.min.js"></script>
<script src="admin/includes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/includes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/includes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/includes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/includes/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/includes/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script src="admin/includes/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
</body>

</html>