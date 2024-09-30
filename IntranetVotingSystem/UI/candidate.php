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
            <h1 class="m-0 text-dark">Candidate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Candidate</li>
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
            <h3 class="card-title">Candidate</h3>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body table-responsive">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#candidate">Add Candidate</button>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Candidate</th>
                <th>Position</th>
                <th>Party</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php include 'IntranetVotingSystem/UI/UIDynamics/Candidate/candidate.php'; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Candidate</th>
                <th>Position</th>
                <th>Party</th>
                <th>Action</th>
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
<?php include 'IntranetVotingSystem/UI/UIDynamics/Candidate/modal.php'; ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="IntranetVotingSystem/Skin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="IntranetVotingSystem/Skin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="IntranetVotingSystem/Skin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="IntranetVotingSystem/Skin/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="IntranetVotingSystem/Skin/plugins/datatables/jquery.dataTables.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Howler -->
<script src="IntranetVotingSystem/Skin/plugins/howler/howler.core.js"></script>
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


<!-- AdminLTE App -->
<script src="IntranetVotingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>

<script>
  //Initialize Select2 Elements
  $('.select2Position').select2()
    
  //Initialize Select2 Elements
  $('.select2Party').select2()

  <?php include 'IntranetVotingSystem/UI/UIDynamics/Candidate/dependency.php'; ?>

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "buttons": [{
          extend: 'copyHtml5',
          exportOptions: {
              columns: ':not(:last-child)'
          }
        }, 
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
              columns: ':not(:last-child)'
          }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: ':not(:last-child)'
            }
        },
        // {
        //     extend: 'colvis',
        // },
      {
      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script type="text/javascript">
    $.ajax({
      type: "get",
      url: '?notification=true',
      success: function(data){
        if(data == 'CandidateAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Candidate Added.');
        }

        if(data == 'CandidateUpdated'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.info('Candidate Updated.');
        }

        if(data == 'CandidateDeleted'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Candidate Deleted.');
        }

      }
    });
</script>

</body>
</html>
