<!-- application/views/admin/camp_details.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Camp Details</title>

    <!-- Include necessary stylesheets and scripts here -->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <!-- Add any additional styles here -->

</head>

<body>
    <div id="wrapper">
        <!-- Include your sidebar and topbar here -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">

                    <!-- Display camp details here -->
                    <h1 class="h3 mb-4 text-gray-800">Camp Details</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Camp Information</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <?php if ($campDetails) : ?>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Camp ID</th>
                                            <th>Camp Name</th>
                                            <th>Camp Type</th>
                                            <th>Camp Date</th>
                                            <th>Location</th>
                                            <th>Doctor ID</th>
                                            <th>MMU ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $campDetails->campID; ?></td>
                                            <td><?php echo $campDetails->campName; ?></td>
                                            <td><?php echo $campDetails->campType; ?></td>
                                            <td><?php echo $campDetails->campDate; ?></td>
                                            <td><?php echo $campDetails->location; ?></td>
                                            <td><?php echo $campDetails->doctorId; ?></td>
                                            <td><?php echo $campDetails->mmuId; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>No camp details available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Include necessary scripts here -->
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
