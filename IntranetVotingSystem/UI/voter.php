<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <!-- Head -->
  <?php 
    include 'IntranetVotingSystem/UI/UIParts/head.php'
   ?>
  <!-- /.Head -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <?php include 'IntranetVotingSystem/UI/UIParts/navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'IntranetVotingSystem/UI/UIParts/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Voter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Voter</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Voter</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Remarks</th>
                  <th>Date and Time</th>
                </tr>
                </thead>
                <tbody>
                  <?php //include 'IntranetVotingSystem/UI/UIDynamics/logs.php'; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Remarks</th>
                  <th>Date and Time</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include 'IntranetVotingSystem/UI/UIParts/footer.php' ?>
</div>
<!-- ./wrapper -->

<?php include 'IntranetVotingSystem/UI/UIParts/modal.php' ?>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="IntranetVotingSystem/Skin/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="IntranetVotingSystem/Skin/plugins/datatables/jquery.dataTables.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- DataTables  & Plugins -->
<script src="IntranetVotingSystem/Skin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jszip/jszip.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Howler -->
<script src="IntranetVotingSystem/Skin/plugins/howler/howler.core.js"></script>



<!-- AdminLTE App -->
<script src="IntranetVotingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "buttons": ["copy", "csv", "excel",
      {
        title: 'Activity Log of eRequest Document',
        text: 'PDF',
        extend: 'pdfHtml5',
        message: '',
        orientation: 'portrait',
        exportOptions: {
          columns: ':visible'
        },
        customize: function (doc) {
          doc.pagePargins = [10, 10, 10, 10];
          doc.defaultStyle.paddingLeft = '10%';
          doc.defaultStyle.fontSize = 11;
          doc.styles.tableHeader.fontSize = 11;
          doc.styles.title.fontSize = 14;
          doc.content[0].text = doc.content[0].text.trim();
          //doc.content[1].table.width = ['30%'];
          doc.content[1].table.widths = ['75%', '25%'];
          doc['footer']= (function (page, pages) {
            return {
              columns: [
                'Copyright © 2022 eRequest Document',
                {
                  alignment: 'right',
                  text: ['Page ', {text: page.toString() }, ' of ', {text: pages.toString()}]
                }
                
              ],
              margin: [43, 0]
            }
          });
          
          var objLayout = {};
          objLayout['hLineWidth'] = function (i) { return .5; };
          objLayout['vLineWidth'] = function (i) { return .5; };
          objLayout['hLineColor'] = function (i) { return '#aaa'; };
          objLayout['vLineColor'] = function (i) { return '#aaa'; };
          objLayout['paddingLeft'] = function (i) { return 5; };
          objLayout['paddingRight'] = function (i) { return 5; };
          doc.content[1].layout = objLayout;
      }
      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

</body>
</html>
