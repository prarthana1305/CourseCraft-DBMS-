<?php
session_start(); 
if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #444648, #21cbf3);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header styling */
        header {
            background-color: #343a40;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Header title styling */
        h1 {
            margin: 0;
            font-size: 2em;
            color: #ffffff;
        }

        /* Navigation styling */
        nav {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        nav span {
            color: white;
            margin: 5px 0;
        }

        /* Main content styling */
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            flex-grow: 1;
        }

        
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #343a40;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #343a40;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2e4a8c;
        }

        /* Footer styling */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            width: 100%;
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
        <form action="feedback.php" method="post">
            <h2>Submit Feedback</h2>

            <label for="studentid">Student ID</label>
            <input type="text" id="studentid" name="studentid" required>

            <label for="course">Course</label>
            <input type="text" id="course" name="course" required>

            <label for="feedback">Feedback</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <input type="submit" value="Submit Feedback">
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Courses Page. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
$servername = "localhost"; 
$username_db = "root"; 
$password_db = ""; 
$dbname = "course_management"; 


$conn = new mysqli($servername, $username_db, $password_db, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentid = $_POST['studentid'];
    $course = $_POST['course'];
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO feedback (studentid, course, feedback, instructorid) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $studentid, $course, $feedback, $userid);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
