<?php
if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "course_management";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT course, feedback FROM feedback WHERE userid = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL error: " . $conn->error);
}

$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Enrolled</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #444648, #21cbf3);
            margin: 0;
            padding: 0;
        }

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

        main h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 1.8em;
            color: #343a40;
        }

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
    <h2>Students Scoreboard</h2>
    <table>
        <thead>
            <tr>
                <th>Course</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['feedback']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students enrolled</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

</body>
</html>

<?php
$conn->close();
?>
