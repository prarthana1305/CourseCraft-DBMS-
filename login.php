<?php
session_start(); // Start the session

// Database connection settings
$host = 'localhost';
$dbname = 'course_management'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $name = $_POST['username'];
    $role = $_POST['role']; // Get the selected role from dropdown

    // Prepare an SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO login (userid, username, role) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("SQL Error: " . $conn->error);
    }
    
    $stmt->bind_param("iss", $userid, $name, $role); // Bind the parameters
    $stmt->execute();

    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        $_SESSION['role'] = $role; // Store user role in session
        $_SESSION['userid'] = $userid; // Store user ID in session
        $_SESSION['username'] = $name; // Store username in session
        
        // Set session message for successful login
        $_SESSION['message'] = "Login successful!";
        
        // Redirect based on role
        if ($role == 'student') {
            header("Location: student_dashboard.php");
        } elseif ($role == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($role == 'instructor') {
            header("Location: instructor_dashboard.php");
        }
        exit(); // Stop further execution after redirect
    } else {
        $_SESSION['message'] = "Registration failed."; // Set error message
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #444648, #21cbf3);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
        .form-container {
            max-width: 400px;
            width: 100%; /* Responsive width */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #ffffff; /* White background for form */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h2 {
            text-align: center;
            color: #333; /* Dark text color */
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 10px;
            color: red; /* Change to green for success messages if needed */
            text-align: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="submit"], select {
            width: 100%; /* Full width */
            padding: 10px;
            margin: 5px 0 15px; /* Spacing between inputs */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007BFF; /* Bootstrap primary color */
            color: white; /* White text color */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        
        <!-- Display success or error message -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required>

            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
                <option value="instructor">Instructor</option>
            </select>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
