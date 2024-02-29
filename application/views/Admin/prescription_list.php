<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prescription List</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
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

                    <!-- Your Prescription List Table Goes Here -->
                    <h1>Prescription List</h1>
                    <!-- Add any other content or filters as needed -->



                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Prescription ID</th>
                                    <th>Patient ID</th>
                                    <th>Doctor ID</th>
                                    <th>Symptom</th>
                                    <th>Advice</th>
                                    <th>State</th>
                                    <th>Medicine</th>
                                    <th>Note</th>
                                    <th>MMU ID</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($prescriptions as $prescription) : ?>
                                    <tr>
                                        <td><?php echo $prescription->prescriptionID; ?></td>
                                        <td><?php echo $prescription->patientID; ?></td>
                                        <td><?php echo $prescription->doctorID; ?></td>
                                        <td><?php echo $prescription->symptom; ?></td>
                                        <td><?php echo $prescription->advice; ?></td>
                                        <td><?php echo $prescription->state; ?></td>
                                        <td><?php echo $prescription->medicine; ?></td>
                                        <td><?php echo $prescription->note; ?></td>
                                        <td><?php echo $prescription->mmuID; ?></td>
                                        <td><?php echo $prescription->Date; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>


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