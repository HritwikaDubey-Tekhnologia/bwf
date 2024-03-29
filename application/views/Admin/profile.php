<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <!-- Add additional CSS styles if needed -->

    <!-- Bootstrap CSS from the admin template -->
    <link href="<?= base_url('assets/admin_assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Font Awesome CSS from the admin template -->
    <link href="<?= base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('admin/sidebar'); ?>

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
                        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
                    </div>
                    

                    <!-- Content Row -->
                    <div class="row">
                        <!-- User Profile Content -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Welcome, <?= $user_data['name'] ?>!
                                    </h6>
                                </div>
                                <div class="card-body">
    <p>Email: <?= $user_data['email'] ?></p>

    <?php if (isset($user_data['user_type'])): ?>
        <?php if ($user_data['user_type'] === 'Patient'): ?>

            <p>Address: <?= $user_data['address'] ?? '' ?></p>

            <p>Profile Image: <img src="<?= base_url('uploads/' . $user_data['imgURL']) ?>" alt="Patient Image" style="max-width: 200px;"></p>

        <?php elseif ($user_data['user_type'] === 'Doctor'): ?>

            <p>Department: <?= $user_data['department'] ?? '' ?></p>
       
            <p>Profile Image: <img src="<?= base_url('uploads/' . $user_data['imgURL']) ?>" alt="Doctor Image" style="max-width: 200px;"></p>
      
        <?php elseif ($user_data['user_type'] === 'Driver'): ?>
       
        <?php elseif ($user_data['user_type'] === 'MMU'): ?>
        
        <?php elseif ($user_data['user_type'] === 'SuperAdmin'): ?>
         
        <?php endif; ?>
    <?php endif; ?>

    <p>User ID: <?= $user_data['userID'] ?></p>
    <p>User Type ID: <?= $user_data['userTypeID'] ?></p>
    <p>Password: <?= $user_data['password'] ?></p>
    <p>User Type: <?= $user_data['userType'] ?? '' ?></p>
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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
