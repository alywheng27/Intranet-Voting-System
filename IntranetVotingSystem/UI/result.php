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
            <h1 class="m-0 text-dark">Total Results</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Total Results</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <?php include 'IntranetVotingSystem/UI/UIDynamics/Result/result.php'; ?>
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="IntranetVotingSystem/Skin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="IntranetVotingSystem/Skin/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE App -->
<script src="IntranetVotingSystem/Skin/dist/js/adminlte.min.js"></script>

</body>
</html>
