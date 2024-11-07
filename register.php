<?php

$host = 'localhost'; // Database host
$dbname = 'course_management'; // Database name in phpMyAdmin
$username = 'root'; // Database username
$password = ''; // Database password

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate a random 4-digit user ID
$user_id = rand(1000, 9999);

// Initialize message variable for feedback
$message = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role']; // Capture the role from the dropdown

    // Prepare an SQL statement to insert the form data into the database
    $stmt = $conn->prepare("INSERT INTO register (userid, username, password, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $username, $password, $email, $role);

    // Execute the statement and set the message for feedback
    if ($stmt->execute()) {
        $message = "Registration successful! You can log in now.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #444648, #21cbf3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .form-container {
            width: 400px;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2196f3;
        }

        .form-container label {
            font-size: 16px;
            display: block;
            margin-top: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #1976d2;
        }

        /* Message styling */
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        .link a {
            color: #2196f3;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" value="<?php echo $user_id; ?>" readonly>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
                <option value="instructor">Instructor</option>
            </select>

            <input type="submit" value="Register">
        </form>

        <!-- Link to go to login page -->
        <div class="link">
            <p>Click here to Login <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
