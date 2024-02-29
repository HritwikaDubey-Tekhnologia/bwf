<!-- application/views/user_profile.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <!-- Include your project's custom CSS if available -->
    <link rel="stylesheet" href="path/to/your/custom.css">
</head>

<body>
    <div class="container mt-4">
        <h2>User Profile</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>
                <?php if (!empty($user_info)) : ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Name:</strong> <?php echo $user_info['name']; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> <?php echo $user_info['email']; ?>
                        </li>
                        <!-- Add more user information as needed -->
                    </ul>
                <?php else : ?>
                    <p>No user information found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and any other scripts if needed -->
    <script src="path/to/bootstrap.min.js"></script>
    <!-- Include your project's custom scripts if available -->
    <script src="path/to/your/custom.js"></script>
</body>

</html>
