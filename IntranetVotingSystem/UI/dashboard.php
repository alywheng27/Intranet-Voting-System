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
              Dashboard
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="positionCount"></h3>

                  <p>Positions</p>
                </div>
                <div class="icon">
                  <i class="fas fa-location-arrow"></i>
                </div>
                <a href="?position=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 id="partyCount"></h3>

                  <p>Partites</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="?party=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="candidateCount"></h3>

                  <p>Candidates</p>
                </div>
                <div class="icon">
                  <i class="fas fa-search-plus"></i>
                </div>
                <a href="?candidate=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 id="voterCount"></h3>

                  <p>Voters</p>
                </div>
                <div class="icon">
                  <i class="fas fa-vote-yea"></i>
                </div>
                <a href="?voter=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Total Count</h3>
                </div>
                <div class="card-body">
                  <div class="">
                    <canvas id="barChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Voters</h3>
                </div>
                <div class="card-body">
                  <div class="">
                    <canvas id="pieChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
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
      success: function(data) {
        if (data != "") {
          var data = data.split("|");
          document.getElementById("office").innerHTML = data;
        }
      }
    });
  </script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: '?participant=true',
        success: function(data){
          if(data != ''){
            var data = data.split(",");

            var pieData = {
              labels: [
                  'Voter',
                  'Non-voter',
              ],
              datasets: [
                {
                  data: data,
                  backgroundColor : ['#809bce', '#95b8d1'],
                }
              ]
            }

            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData        = pieData;
            var pieOptions     = {
              maintainAspectRatio : false,
              responsive : true,
              plugins: {
                labels: [],
                labels: [
                  {
                    render: 'label',
                    position: 'outside'
                  },
                  {
                    render: 'percentage'
                  }
                ],
              },
            }

            new Chart(pieChartCanvas, {
              type: 'pie',
              data: pieData,
              options: pieOptions
            })
          }
        }
      });
    })
  </script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: '?tableTotalRowCount=true',
        success: function(data){
          if(data != ''){
            var data = data.split(",");

            document.getElementById("positionCount").innerHTML = data[0];
            document.getElementById("partyCount").innerHTML = data[1];
            document.getElementById("candidateCount").innerHTML = data[2];
            document.getElementById("voterCount").innerHTML = data[3];

            var areaChartData = {
            labels  : ['Positions', 'Parties', 'Candidates', 'Voters'],
            datasets: [
              {
                label               : 'Total Count',
                backgroundColor     : 'rgba(205,180,219,0.9)',
                borderColor         : 'rgba(205,180,219,0.8)',
                pointRadius          : false,
                pointColor          : '#c1c7d1',
                pointStrokeColor    : 'rgba(205,180,219,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(205,180,219,1)',
                data                : data
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
      })
    })
    
  </script>

</body>

</html>