<!-- admin/report.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Patient Report</title>

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

                    <!-- Display patient details, prescription details, and vitals details here -->
                    <h1 class="h3 mb-4 text-gray-800">Patient Report</h1>

                    <!-- Patient Details -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Patient Details</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <?php if ($patient) : ?>
                                <table class="table table-bordered" width="100%" cellspacing="0">
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
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>No patient details available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Prescription Details</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <?php if ($prescription) : ?>
                                <table class="table table-bordered" width="100%" cellspacing="0">
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
                                            <!-- <th>Date</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                            <!-- <td><?php echo $prescription->date; ?></td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>No prescription available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Vitals Details -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Vitals Details</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <?php if ($vitals) : ?>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Vitals ID</th>
                                            <th>Patient ID</th>
                                            <th>Doctor ID</th>
                                            <th>BP</th>
                                            <th>PR</th>
                                            <th>RR</th>
                                            <th>Spo2</th>
                                            <th>Ht</th>
                                            <th>Wt</th>
                                            <th>Bmi</th>
                                            <th>Vitals Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vitals as $vital) : ?>
                                            <tr>
                                                <td><?php echo $vital->vitalsID; ?></td>
                                                <td><?php echo $vital->patientID; ?></td>
                                                <td><?php echo $vital->doctorID; ?></td>
                                                <td><?php echo $vital->BP; ?></td>
                                                <td><?php echo $vital->PR; ?></td>
                                                <td><?php echo $vital->RR; ?></td>
                                                <td><?php echo $vital->Spo2; ?></td>
                                                <td><?php echo $vital->Ht; ?></td>
                                                <td><?php echo $vital->Wt; ?></td>
                                                <td><?php echo $vital->Bmi; ?></td>
                                                <!-- <td><?php echo $vital->vitalsTime; ?></td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>No vitals available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <script>

    function downloadPDF() {
      
        window.location.href = "<?php echo base_url('admin/downloadPDF/' . $patient->patientID); ?>";
    }
</script>


<div class="text-right">
    <button onclick="downloadPDF()" class="btn btn-primary">Download PDF</button>
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