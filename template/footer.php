<footer class="main-footer">
    Rune
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../rune/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../rune/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../rune/plugins/sweetalert2.all.min.js"></script>
<script src="../rune/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../rune/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../rune/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../rune/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../rune/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../rune/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../rune/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../rune/plugins/jszip/jszip.min.js"></script>
<script src="../rune/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../rune/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../rune/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../rune/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../rune/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script src="../rune/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>

$(function () {

  bsCustomFileInput.init();

});

</script>

</body>
</html>
