<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vitals Registration</title>

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

        input[type="text"] ,
        select {
            width: 100%;
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

        .bmi-category {
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }

        .underweight {
            color: rgb(0, 150, 255);
        }

        .normal {
            color: rgb(79, 121, 66);
        }

        .overweight {
            color: rgb(242, 140, 40);
        }

        .obese {
            color: rgb(170, 74, 68);
        }

        .extremely-obese {
            color: rgb(136, 8, 8);
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
                                        <h1 class="h4 text-gray-900 mb-4">Vitals Registration</h1>
                                    </div>
                                    <div class="card-body">
                                        <!-- Vitals registration form -->
                                        <?php echo form_open('admin/registerVitals'); ?>
                                        <div class="container">
                                            <div class="row">
                                                <!-- First Column -->
                                                <div class="col-md-4">
                                                    <label for="patientID">Patient ID:</label>
                                                    <input type="text" class="form-control form-control-user" name="patientID" value="<?php echo set_value('patientID'); ?>" required>

                                                    <label for="doctorID">Doctor ID:</label>
                                                    <input type="text" class="form-control form-control-user"  name="doctorID" value="<?php echo set_value('doctorID'); ?>" required>

                                                    <label for="BP">Blood Pressure (BP):</label>
                                                    <input type="text" class="form-control form-control-user"  name="BP" value="<?php echo set_value('BP'); ?>">
                                                </div>
                                                <!-- Second Column -->
                                                <div class="col-md-4">
                                                    <label for="PR">Pulse Rate (PR):</label>
                                                    <input type="text" class="form-control form-control-user"  name="PR" value="<?php echo set_value('PR'); ?>">

                                                    <label for="RR">Respiratory Rate (RR):</label>
                                                    <input type="text" class="form-control form-control-user"  name="RR" value="<?php echo set_value('RR'); ?>">

                                                    <label for="Spo2">Blood Oxygen (SpO2):</label>
                                                    <input type="text" class="form-control form-control-user"  name="Spo2" value="<?php echo set_value('Spo2'); ?>">
                                                </div>
                                                <!-- Third Column -->
                                                <div class="col-md-4">
                                                    <label for="Ht">Height (Ht in cm):</label>
                                                    <input type="text" class="form-control form-control-user"  name="Ht" id="height" value="<?php echo set_value('Ht'); ?>">

                                                    <label for="Wt">Weight (Wt in kg):</label>
                                                    <input type="text" class="form-control form-control-user"  name="Wt" id="weight" value="<?php echo set_value('Wt'); ?>">

                                                    <label for="Bmi">Body Mass Index (BMI):</label>
                                                    <input type="text"  class="form-control form-control-user"  name="Bmi" id="bmi" value="<?php echo set_value('Bmi'); ?>" readonly>
                                                    <label for="BmiCategory" style="display: inline-block; margin-left: 10px;">BMI Category:</label>
                                                    <div class="bmi-category" id="bmiCategory" style="display: inline-block; margin-left: 5px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><input type="submit" value="Register Vitals">
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

            <script>
                // Function to calculate BMI
                function calculateBMI() {
                    var height = parseFloat(document.getElementById('height').value);
                    var weight = parseFloat(document.getElementById('weight').value);

                    if (!isNaN(height) && !isNaN(weight)) {
                        var bmi = (weight / Math.pow((height / 100), 2)).toFixed(2);
                        document.getElementById('bmi').value = bmi;

                        // Display BMI category based on BMI value
                        displayBMICategory(bmi);
                    } else {
                        document.getElementById('bmi').value = "";
                        document.getElementById('bmiCategory').innerHTML = "";
                    }
                }

                // Function to display BMI category based on BMI value
                function displayBMICategory(bmi) {
                    var categoryElement = document.getElementById('bmiCategory');

                    if (bmi < 18.5) {
                        categoryElement.innerHTML = "Underweight";
                        categoryElement.className = "bmi-category underweight";
                    } else if (bmi >= 18.5 && bmi <= 24.9) {
                        categoryElement.innerHTML = "Normal";
                        categoryElement.className = "bmi-category normal";
                    } else if (bmi >= 25.0 && bmi <= 29.9) {
                        categoryElement.innerHTML = "Overweight";
                        categoryElement.className = "bmi-category overweight";
                    } else if (bmi >= 30.0 && bmi <= 34.9) {
                        categoryElement.innerHTML = "Obese";
                        categoryElement.className = "bmi-category obese";
                    } else {
                        categoryElement.innerHTML = "Extremely Obese";
                        categoryElement.className = "bmi-category extremely-obese";
                    }
                }

                // Attach the calculateBMI function to input change events for height and weight
                document.getElementById('height').addEventListener('input', calculateBMI);
                document.getElementById('weight').addEventListener('input', calculateBMI);
            </script>
        </body>

        </html>
