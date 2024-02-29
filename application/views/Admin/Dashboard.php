<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobile Medical Unit Management Dashboard">
    <meta name="author" content="Your Name">

    <title>MMU Management Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map {
            height: 300px;
            width: 550;
            margin-bottom: -20px;
            /* Set the desired height for your map */
        }
    </style>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        $this->load->view('admin/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mobile Medical Unit Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Patients Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Patients</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">1200</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Camps Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Camps</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Staff Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Medical Staff
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Vehicles Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Vehicles</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- MMU Locations Map -->
                        <div class="col-lg-8 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">MMU Locations Map</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Options:</div>
                                            <a class="dropdown-item" href="#">View All</a>
                                            <a class="dropdown-item" href="#">Add Location</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Map Container -->
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>


                        <!-- BMI Chart -->
                        <div class="col-lg-4" >
                            <div class="card shadow mb-4" >
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">BMI Chart</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Options:</div>
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Export Data</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="bmiChart" width="400" height="325" margin-bottom="-20px"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Recent Reports -->
                        <div class="col-lg-6 mb-4">

                            <!-- Recent Reports Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Reports</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Medical Emergency <span class="float-right">New</span></h4>
                                    <p>A new medical emergency report has been submitted.</p>
                                    <h4 class="small font-weight-bold">Vaccination Camp <span class="float-right">Processed</span></h4>
                                    <p>The recent vaccination camp report has been processed.</p>
                                    <h4 class="small font-weight-bold">Vehicle Maintenance <span class="float-right">Pending</span></h4>
                                    <p>Vehicle maintenance report is pending approval.</p>
                                    <h4 class="small font-weight-bold">Medical Staff Update <span class="float-right">Complete</span></h4>
                                    <p>Medical staff information update is complete.</p>
                                </div>
                            </div>
                        </div>

                        <!-- MMU Alerts -->
                        <div class="col-lg-6 mb-4">

                            <!-- MMU Alerts Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">MMU Alerts</h6>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Alert!</strong> Low medical supplies in MMU-001.
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Alert!</strong> Vehicle maintenance overdue for MMU-002.
                                    </div>
                                    <div class="alert alert-info" role="alert">
                                        <strong>Info!</strong> New camp scheduled for next week.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('admin/footer'); ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Other scripts -->
    <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/demo/chart-pie-demo.js'); ?>"></script>

    <!-- Your BMI chart script -->
    <!-- Your BMI chart script -->
    <script>
        // Sample data for BMI chart
        var bmiData = [18.0, 22.5, 26.8, 32.0, 35.5];
        var categories = ["Underweight <", "Normal", "Overweight", "Obese", "Extremely Obese"];

        // Function to display BMI chart
        function displayBMIChart() {
            var ctx = document.getElementById('bmiChart').getContext('2d');
            var bmiChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'BMI',
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#E91E63'],
                        data: bmiData
                    }]
                },
                options: {
                    scales: {
                        x: {
                            ticks: {
                                beginAtZero: true
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Call the function to display the BMI chart
        displayBMIChart();
    </script>

    <!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Your custom script to initialize the map -->
<script>
  // Initialize the map
  var map = L.map('map').setView([18.5204, 73.8567], 13); // Set the initial center to Pune, India

  // Add a tile layer with OpenStreetMap data
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);
</script>



</body>

</html>