<!-- application/views/admin/doctor_list.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Doctor List</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <style>
        /* Your additional styles here */
    </style>
</head>

<body class="bg-gradient-primary">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('admin/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php $this->load->view('admin/topbar'); ?>

                <!-- Page Content -->
                <div class="container-fluid">

                    <!-- Your Doctor List Table Goes Here -->
                    <h1>Doctor List</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Doctor ID</th>
                                    <th>Image URL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Profile</th>
                                    <th>MMU ID</th>
                                    <th>Password</th>
                                    <th>User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $doctor): ?>
                                    <tr>
                                        <td><?php echo $doctor->doctorID; ?></td>
                                        <td><?php echo $doctor->imgURL; ?></td>
                                        <td><?php echo $doctor->name; ?></td>
                                        <td><?php echo $doctor->email; ?></td>
                                        <td><?php echo $doctor->address; ?></td>
                                        <td><?php echo $doctor->phone; ?></td>
                                        <td><?php echo $doctor->department; ?></td>
                                        <td><?php echo $doctor->profile; ?></td>
                                        <td><?php echo $doctor->mmuID; ?></td>
                                        <td><?php echo $doctor->password; ?></td>
                                        <td><?php echo $doctor->userID; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->load->view('admin/footer'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js');?>"></script>

</body>

</html>
