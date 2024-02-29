<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration Form</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
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
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: calc(100% - 24px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type="date"] {
            -webkit-appearance: textfield;
            appearance: textfield;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
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

        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Choose File';
            display: inline-block;
            background: #4e73df;
            color: white;
            padding: 8px 12px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            border-radius: 5px;
            font-weight: 700;
        }

        .custom-file-input:hover::before {
            background: #2e59d9;
        }

        .custom-file-input:active::before {
            background: #2e59d9;
        }

        .custom-file-input input[type="file"] {
            visibility: hidden;
        }

        .custom-file-label {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
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
                                        <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
                                    </div>
                                    <div class="card-body">
                                        <!-- Registration form -->
                                        <form action="<?php echo base_url('admin/registerPatient'); ?>" method="post" enctype="multipart/form-data">

                                            <div class="container">
                                                <div class="row">
                                                    <!-- First Column -->
                                                    <div class="col-md-4">
                                                        
                                                        <!-- Image upload field -->
                                                        <div class="form-group">
                                                            <label for="imgURL">Image:</label>
                                                            <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="imgURL" name="imgURL" onchange="updateFileName()">

                                                                <label class="custom-file-label" id="imgLabel" for="imgURL">Choose file</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input type="text" class="form-control form-control-user" name="name" value="<?php echo set_value('name'); ?>" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" class="form-control form-control-user" name="email" value="<?php echo set_value('email'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password:</label>
                                                            <input type="password" class="form-control form-control-user" name="password" value="<?php echo set_value('password'); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address:</label>
                                                            <input type="text" class="form-control form-control-user" name="address" value="<?php echo set_value('address'); ?>">
                                                        </div>
                                                    </div>
                                                    <!-- Second Column -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <input type="text" class="form-control form-control-user" name="phone" value="<?php echo set_value('phone'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sex">Sex:</label>
                                                            <select class="form-control form-control-user" name="sex">
                                                                <option value="male" <?php echo set_select('sex', 'male'); ?>>Male</option>
                                                                <option value="female" <?php echo set_select('sex', 'female'); ?>>Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="birthdate">Birthdate:</label>
                                                            <input type="date" class="form-control form-control-user" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bloodgroup">Blood Group:</label>
                                                            <input type="text" class="form-control form-control-user" name="bloodgroup" value="<?php echo set_value('bloodgroup'); ?>">
                                                        </div>
                                                    </div>
                                                    <!-- Third Column -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="doctor">Doctor:</label>
                                                            <input type="text" class="form-control form-control-user" name="doctor" value="<?php echo set_value('doctor'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="village">Village:</label>
                                                            <input type="text" class="form-control form-control-user" name="village" value="<?php echo set_value('village'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adharNo">Adhar Number:</label>
                                                            <input type="text" class="form-control form-control-user" name="adharNo" value="<?php echo set_value('adharNo'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="abhaNo">Abha Number:</label>
                                                            <input type="text" class="form-control form-control-user" name="abhaNo" value="<?php echo set_value('abhaNo'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="insuranceCompany">Insurance Company:</label>
                                                            <input type="text" class="form-control form-control-user" name="insuranceCompany" value="<?php echo set_value('insuranceCompany'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br><input type="submit" value="Register Patient">
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
            <script>
        // Update file input label with selected file name
        function updateFileName() {
            var input = document.getElementById('imgURL');
            var label = document.getElementById('imgLabel');
            var fileName = input.files[0].name;
            label.innerHTML = fileName;
        }
    </script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>