<!-- views/admin/register_doctor.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Doctor Registration</title>

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
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .custom-file-input:hover {
            background-color: #f5f5f5;
        }

        .custom-file-input:active {
            background-color: #e8e8e8;
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
                                        <h1 class="h4 text-gray-900 mb-4">Doctor Registration Form</h1>
                                    </div>
                                    <div class="card-body">
                                        <!-- Registration form -->
                                        <form action="<?php echo base_url('admin/registerDoctor'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="container">
                                                <div class="row">
                                                    <!-- First Column -->
                                                    <div class="col-md-4">
                                                        <!-- Fields for the first column -->
                                                        <div class="form-group">
                                                            <label for="imgURL">Image Upload:</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="imgURL" name="imgURL" accept="image/*">
                                                                <label class="custom-file-label" for="imgURL">Choose file</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input type="text" class="form-control form-control-user" name="name" value="<?php echo set_value('name'); ?>" required>
                                                        </div>
                                                        <!-- Add more fields if needed -->
                                                    </div>

                                                    <!-- Second Column -->
                                                    <div class="col-md-4">
                                                        <!-- Fields for the second column -->
                                                        <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" class="form-control form-control-user" name="email" value="<?php echo set_value('email'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password:</label>
                                                            <input type="password" class="form-control form-control-user" name="password" value="<?php echo set_value('password'); ?>" required>
                                                        </div>
                                                        <!-- Add more fields if needed -->
                                                    </div>

                                                    <!-- Third Column -->
                                                    <div class="col-md-4">
                                                        <!-- Fields for the third column -->
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <input type="text" class="form-control form-control-user" name="phone" value="<?php echo set_value('phone'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="department">Department:</label>
                                                            <input type="text" class="form-control form-control-user" name="department" value="<?php echo set_value('department'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profile">Profile:</label>
                                                            <input type="text" class="form-control form-control-user" name="profile" value="<?php echo set_value('profile'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mmuID">MMU ID:</label>
                                                            <input type="text" class="form-control form-control-user" name="mmuID" value="<?php echo set_value('mmuID'); ?>">
                                                        </div>
                                                        <!-- Add more fields if needed -->
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br><input type="submit" value="Register Doctor">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/footer'); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js'); ?>"></script>
            <script>
                // Display the selected file name
                document.getElementById('imgURL').addEventListener('change', function (e) {
                    var fileName = e.target.files[0].name;
                    var nextSibling = e.target.nextElementSibling;
                    nextSibling.innerText = fileName;
                });
            </script>
        </body>

        </html>
