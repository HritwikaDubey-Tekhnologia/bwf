<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prescription Registration</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fc;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
        }

        .card-header {
            background-color: #4e73df;
            border-radius: 10px 10px 0 0;
            color: white;
            font-size: 24px;
            font-weight: 600;
            padding: 20px;
            text-align: center;
        }

        label {
            font-weight: 600;
            margin-top: 10px;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 24px); /* Adjusted width */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4e73df;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2e59d9;
        }

        input[type="date"] {
            -webkit-appearance: textfield; /* Chrome, Safari, Edge */
            appearance: textfield;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
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
                <!-- Outer Row -->
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Prescription Registration</h1>
                                    </div>
                                    <div class="card-body">
                                        <!-- Prescription registration form -->
                                        <?php echo form_open('admin/registerPrescription'); ?>
                                        <div class="container">
                                            <div class="row">
     

                                                <!-- First Column -->
                                                <div class="col-md-4">
                                                <label for="patientID">Patient:</label>
                                                <select class="form-control" name="patientID" required>
    <option value="">Select Patient</option>
    <?php foreach ($patients as $patient): ?>
        <option value="<?php echo $patient->patientID; ?>"><?php echo $patient->patientID . ' - ' . $patient->name; ?></option>
    <?php endforeach; ?>
</select>



                                                    <label for="doctorID">Doctor ID:</label>
                                                    <input type="text" class="form-control form-control-user"  name="doctorID" value="<?php echo set_value('doctorID'); ?>" required>

                                                    <label for="symptom">Symptom:</label>
                                                    <input type="text" class="form-control form-control-user"  name="symptom" value="<?php echo set_value('symptom'); ?>">
                                                </div>
                                                <!-- Second Column -->
                                                <div class="col-md-4">
                                                    <label for="advice">Advice:</label>
                                                    <input type="text" class="form-control form-control-user"  name="advice" value="<?php echo set_value('advice'); ?>">

                                                    <label for="state">History:</label>
<textarea class="form-control form-control-user" name="state"><?php echo set_value('state'); ?></textarea>

                                                    <label for="medicine">Medicine:</label>
                                                    <input type="text" class="form-control form-control-user"  name="medicine" value="<?php echo set_value('medicine'); ?>">
                                                </div>
                                                <!-- Third Column -->
                                                <div class="col-md-4">
    <label for="Date">Date:</label><br>
    <input type="datetime-local" class="form-control form-control-user" name="Date" value="<?php echo set_value('Date'); ?>">



                                                    <br>
                                                    <label for="note">Note:</label>
                                                    <textarea name="note" class="form-control form-control-user" ><?php echo set_value('note'); ?></textarea>

                                                    <label for="mmuID">MMU ID:</label>
                                                    <input type="text" class="form-control form-control-user"  name="mmuID" value="<?php echo set_value('mmuID'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><input type="submit" value="Register Prescription">
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/footer'); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js');?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js');?>"></script>
        </body>

        </html>
