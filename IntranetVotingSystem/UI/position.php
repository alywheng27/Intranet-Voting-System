<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include 'IntranetVotingSystem/UI/UIParts/head.php'
   ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include 'IntranetVotingSystem/UI/UIParts/navbar.php' ?>

  <?php include 'IntranetVotingSystem/UI/UIParts/sidebar.php' ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Position</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Position</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Position</h3>
            </div>
            
            <div class="card-body table-responsive">
              <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#position">Add Position</button>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Position</th>
                  <th>Order</th>
                  <th>Count</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php include 'IntranetVotingSystem/UI/UIDynamics/Position/position.php'; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Position</th>
                  <th>Order</th>
                  <th>Count</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              </div>
          </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <?php include 'IntranetVotingSystem/UI/UIParts/footer.php' ?>
</div>

<?php include 'IntranetVotingSystem/UI/UIParts/modal.php' ?>
<?php include 'IntranetVotingSystem/UI/UIDynamics/Position/modal.php'; ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  //Initialize Select2 Elements
  $('.select2Order').select2()
    
  //Initialize Select2 Elements
  $('.select2Count').select2()

  <?php include 'IntranetVotingSystem/UI/UIDynamics/Position/dependency.php'; ?>

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
        if(data == 'PositionAdded'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Position Added.');
        }

        if(data == 'PositionUpdated'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.info('Position Updated.');
        }

        if(data == 'PositionDeleted'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Position Deleted.');
        }

      }
    });
</script>

</body>
</html>
