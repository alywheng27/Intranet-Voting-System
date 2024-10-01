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
            Ballot
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Request List</a></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

        </div>
          
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
  // Ratings
  $(document).ready(function() {
    $.ajax({
      url: '?ratingList=true',
      success: function(data){
        if(data != ''){
        
          var data = data.split(",");
          
          var rate5 = Array();
          var rate4 = Array();
          var rate3 = Array();
          var rate2 = Array();
          var rate1 = Array();
          
          var count = 0
          for (let index = 0; index < 5; index++) {
            rate5[count] = data[index];
            document.getElementById(`rate${index}`).innerHTML = data[index];
            count++;
          }

          var count = 0
          for (let index = 5; index < 10; index++) {
            rate4[count] = data[index];
            document.getElementById(`rate${index}`).innerHTML = data[index];
            count++;
          }

          var count = 0
          for (let index = 10; index < 15; index++) {
            rate3[count] = data[index];
            document.getElementById(`rate${index}`).innerHTML = data[index];
            count++;
          }

          var count = 0
          for (let index = 15; index < 20; index++) {
            rate2[count] = data[index];
            document.getElementById(`rate${index}`).innerHTML = data[index];
            count++;
          }

          var count = 0
          for (let index = 20; index < 25; index++) {
            rate1[count] = data[index];
            document.getElementById(`rate${index}`).innerHTML = data[index];
            count++;
          }

          var areaChartData = {
            labels  : ['Job Knowledge', 'Work Quality', 'Availability of Personnel', 'Attitude and Cooperation', 'Dependability/Efficiency'],
            datasets: [
              {
                label               : '5 Stars',
                backgroundColor     : '#ab46d2',
                borderColor         : '#ab46d2',
                pointRadius          : false,
                pointColor          : '#c1c7d1',
                pointStrokeColor    : 'rgba(205,180,219,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(205,180,219,1)',
                data                : rate5
              },
              {
                label               : '4 Stars',
                backgroundColor     : '#ff6fb5',
                borderColor         : '#ff6fb5',
                pointRadius         : false,
                pointColor          : 'rgba(255,200,221, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : rate4
              },
              {
                label               : '3 Stars',
                backgroundColor     : '#92d9f7',
                borderColor         : '#92d9f7',
                pointRadius         : false,
                pointColor          : 'rgba(250,170,199, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(250,170,199,1)',
                data                : rate3
              },
              {
                label               : '2 Stars',
                backgroundColor     : '#55d8c1',
                borderColor         : '#55d8c1',
                pointRadius         : false,
                pointColor          : 'rgba(190,226,255, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(190,226,255,1)',
                data                : rate2
              },
              {
                label               : '1 Star',
                backgroundColor     : '#fcf69c',
                borderColor         : '#fcf69c',
                pointRadius         : false,
                pointColor          : 'rgba(162,210,255, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(162,210,255,1)',
                data                : rate1
              },
            ]
          }

          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          // var temp0 = areaChartData.datasets[0]
          // var temp1 = areaChartData.datasets[1]
          // barChartData.datasets[0] = temp0
          // barChartData.datasets[1] = temp1

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            plugins: {
              labels: [],
            },
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })

        }
      }
    });
  })
</script>

</body>
</html>
