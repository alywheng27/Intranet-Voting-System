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

  <?php // include 'IntranetVotingSystem/UI/UIParts/sidebar.php' ?>

  <!-- <div class="content-wrapper"> -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            Ballot
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <form role="form" id="ballotQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?ballotFunction=true" method="post">
          <?php include 'IntranetVotingSystem/UI/UIDynamics/Ballot/ballot.php'; ?>
          <div style="display: flex; justify-content: center;">
            <button type="submit" class="btn btn-success px-5 mb-4">Submit Ballot</button>
          </div>
        </form>
      </div>
    </div>
  <!-- </div> -->

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <?php include 'IntranetVotingSystem/UI/UIParts/footer.php' ?>
</div>

<?php include 'IntranetVotingSystem/UI/UIParts/modal.php' ?>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="IntranetVotingSystem/Skin/plugins/chart.js/Chart.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/chartjs-plugin-labels.js"></script>
<!-- jquery-validation -->
<script src="IntranetVotingSystem/Skin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jquery-validation/additional-methods.min.js"></script>
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


<!-- AdminLTE App -->
<script src="IntranetVotingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  //Initialize Select2 Elements
  $('.select2Office').select2()

  <?php include 'IntranetVotingSystem/UI/UIDynamics/Ballot/dependency.php'; ?>

  $.ajax({
    type: "get",
    url: "?officeList=true",
    success: function(data){
      if(data != ""){
        var data = data.split("|");
        document.getElementById("office").innerHTML = data;
      }
    }
  });
</script>

<script>

</script>

</body>
</html>
