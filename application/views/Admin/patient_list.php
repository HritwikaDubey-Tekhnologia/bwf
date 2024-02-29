<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Patient List</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Add this line to include Font Awesome stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <style>
    .btn1:hover i {
        color: #2E59D9 !important;
    }

    .btn2:hover i {
        color: #2E59D9 !important;
    }
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

                    <!-- Your Patient List Table Goes Here -->
                    <h1>Patient List</h1>

                    <form method="get" action="<?php echo base_url('admin/patientList'); ?>">
                        <div class="form-group">
                            <label for="search">Search Village:</label>
                            <input type="text" class="form-control" name="search" placeholder="Enter Village" value="<?php echo $this->input->get('search'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="searchSex">Search Sex:</label>
                            <select class="form-control" name="searchSex">
                                <option value="">All</option>
                                <option value="M" <?php echo ($this->input->get('searchSex') == 'M') ? 'selected' : ''; ?>>Male</option>
                                <option value="F" <?php echo ($this->input->get('searchSex') == 'F') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="searchDoctor">Search Doctor:</label>
                            <input type="text" class="form-control" name="searchDoctor" placeholder="Enter Doctor" value="<?php echo $this->input->get('searchDoctor'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="<?php echo base_url('admin/patientList'); ?>" class="btn btn-secondary">Refresh</a>
                    </form><br>

                    <!-- <p>User ID: <?= $user_data['userID'] ?></p>
    <p>User Type ID: <?= $user_data['userTypeID'] ?></p>
    <p>Password: <?= $user_data['password'] ?></p>
    <p>User Type: <?= $user_data['userType'] ?? '' ?></p> -->

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Image URL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Doctor</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Sex</th>
                                    <th>Birthdate</th>

                                    <th>Village</th>
                                    <th>Blood Group</th>
                                    <th>Adhar Number</th>
                                    <th>Abha Number</th>
                                    <th>Insurance Company</th>
                                    <th>User ID</th>
                                    <th>MMU ID</th>
                                    <th>Add Date</th>
                                    <th>Registration Time</th>
                                    <th>Hospital ID</th>
                                    <th>Password</th>
                                    <th>Prescription</th>
                                    <th>Report</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patients as $patient) : ?>
                                    <tr>
                                        <td><?php echo $patient->patientID; ?></td>
                                        <td><?php echo $patient->imgURL; ?></td>
                                        <td><?php echo $patient->name; ?></td>
                                        <td><?php echo $patient->email; ?></td>
                                        <td><?php echo $patient->doctor; ?></td>
                                        <td><?php echo $patient->address; ?></td>
                                        <td><?php echo $patient->phone; ?></td>
                                        <td><?php echo $patient->sex; ?></td>
                                        <td><?php echo $patient->birthdate; ?></td>
                                        <td><?php echo $patient->village; ?></td>
                                        <td><?php echo $patient->bloodgroup; ?></td>
                                        <td><?php echo $patient->adharNo; ?></td>
                                        <td><?php echo $patient->abhaNo; ?></td>
                                        <td><?php echo $patient->insuranceCompany; ?></td>
                                        <td><?php echo $patient->userID; ?></td>
                                        <td><?php echo $patient->mmuID; ?></td>
                                        <td><?php echo $patient->addDate; ?></td>
                                        <td><?php echo $patient->registrationTime; ?></td>
                                        <td><?php echo $patient->hospitalID; ?></td>
                                        <td><?php echo $patient->password; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('admin/registerPrescription'); ?>" class="btn1">
                                                <i class="fas fa-file-prescription" style="color: #858796;"></i> <!-- Assuming FontAwesome icon for prescription -->
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('admin/generateReport/' . $patient->patientID); ?>" class="btn2">
                                                <i class="fas fa-download" style="color: #858796;"></i> <!-- Apply color to the icon -->
                                            </a>
                                        </td>

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
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>