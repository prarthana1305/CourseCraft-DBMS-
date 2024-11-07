<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

// Database connection
$servername = "localhost"; // Update with your database server
$username_db = "root"; // Update with your database username
$password_db = ""; // Update with your database password
$dbname = "course_management"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students data
$sql = "SELECT userid, username, course FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Enrolled</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #444648, #21cbf3);
            margin: 0;
            padding: 0;
        }

        /* Consistent Header Styling */
        header {
            background-color: #343a40;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        h1 {
            margin: 0;
            font-size: 2em;
            color: #ffffff;
        }

        nav {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        nav span {
            color: white;
            margin: 5px 0;
        }

        /* Centered h2 Styling */
        main h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 1.8em;
            color: #343a40;
        }

        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #3a539b;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <nav>
        <span>User ID: <?php echo htmlspecialchars($userid); ?></span>
        <span>Name: <?php echo htmlspecialchars($username); ?></span>
    </nav>
</header>

<main>
    <h2>Students Enrolled in Courses</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output each row of data
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['userid']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No students enrolled</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
