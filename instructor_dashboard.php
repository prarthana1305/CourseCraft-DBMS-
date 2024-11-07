<?php
session_start(); 
if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
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
    <title>Courses Page</title>
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
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
            flex-grow: 1;
        }

        /* Enhanced Course section styling */
        .course-link {
            text-decoration: none;
            color: inherit;
        }

        .course-section {
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #ccc;
            color: inherit;
            position: relative;
            overflow: hidden;
        }

        .course-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background: linear-gradient(145deg, #3a539b, #2c3e50);
            color: #fff;
        }

        /* Icon styling */
        .course-icon {
            font-size: 3em;
            margin-bottom: 15px;
            color: #5a5a5a;
        }

        /* Styling course title */
        .course-section h2 {
            margin: 10px 0;
            font-size: 1.6em;
            color: #333;
            transition: color 0.3s;
        }

        .course-section:hover h2 {
            color: #fff;
        }

        /* Styling course description */
        .course-description {
            font-size: 0.95em;
            color: #666;
            line-height: 1.6;
            transition: color 0.3s;
        }

        .course-section:hover .course-description {
            color: #e6e6e6;
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
        <!-- Link to Students Enrolled Page -->
        <a href="students_enrolled.php" class="course-link">
            <div class="course-section">
                <div class="course-icon">📚</div>
                <h2>View the Students Enrolled</h2>
                <p class="course-description">Get a detailed look at the students currently enrolled in various courses.</p>
            </div>
        </a>

        <!-- Link to Marks Page -->
        <a href="marks.php" class="course-link">
            <div class="course-section">
                <div class="course-icon">📊</div>
                <h2>Marks Obtained</h2>
                <p class="course-description">Check the marks and academic performance of students in each course.</p>
            </div>
        </a>

        <!-- Link to Feedback Page -->
        <a href="feedback.php" class="course-link">
            <div class="course-section">
                <div class="course-icon">💬</div>
                <h2>Feedback Section</h2>
                <p class="course-description">Provide constructive feedback to guide and support students effectively.</p>
            </div>
        </a>
    </main>

    <footer>
        <p>&copy; 2024 Courses Page. All rights reserved.</p>
    </footer>

</body>
</html>
