<!DOCTYPE html>
<html>
<head>
  <?php include 'IntranetVotingSystem/UI/UIParts/head.php' ?>
</head>
<body class="hold-transition login-page background-img" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('IntranetVotingSystem/Skin/dist/img/login-background.jpg');">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Intranet Voting System</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form role="form" id="quickForm" enctype="multipart/form-data" action="?loginFunction=true" method="post">
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" data-toggle="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-eye"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!------------------  LOGIN  ---------------------- -->

<!-- jQuery -->
<script src="IntranetVotingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<script src="IntranetVotingSystem/Skin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="IntranetVotingSystem/Skin/plugins/toastr/toastr.min.js"></script>

<!-- jquery-validation -->
<script src="IntranetVotingSystem/Skin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="IntranetVotingSystem/Skin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="IntranetVotingSystem/Skin/dist/js/demo.js"></script>



<!------------------  DASHBOARD  ---------------------- -->
<!-- REQUIRED SCRIPTS -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="IntranetVotingSystem/Skin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/raphael/raphael.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="IntranetVotingSystem/Skin/dist/js/pages/dashboard2.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="IntranetVotingSystem/Skin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- ChartJS -->
<script src="IntranetVotingSystem/Skin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="IntranetVotingSystem/Skin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="IntranetVotingSystem/Skin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="IntranetVotingSystem/Skin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="IntranetVotingSystem/Skin/plugins/moment/moment.min.js"></script>
<script src="IntranetVotingSystem/Skin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="IntranetVotingSystem/Skin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="IntranetVotingSystem/Skin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="IntranetVotingSystem/Skin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="IntranetVotingSystem/Skin/dist/js/pages/dashboard.js"></script>


<script type="text/javascript">
$(document).ready(function () {
  /*
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  */
  $('#quickForm').validate({
    rules: {
      username: {
        required: true,

      },
      password: {
        required: true,
        minlength: 3
      },
      terms: {
        required: true
      },
    },
    messages: {
      username: {
        required: "Please enter your username"

      },
      password: {
        required: "Please provide a password",
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: '?notification=true',
      success: function(data){
        if(data == 'IncompleteCredentials'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Incomplete Credentials.');
        }

        if(data == 'InvalidCredentials'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.error('Invalid Credentials.');
        }
      }
    });
  })
</script>

  <!-- Show Password plugin JavaScript-->
  <script src="IntranetVotingSystem/Skin/plugins/bootstrap-show-password.min.js"></script>

</body>
</html>
