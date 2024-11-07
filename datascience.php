<?php
session_start(); // Start the session

// Check if the user is logged in
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
    <title>Data Science Course</title>
    <style>
        /* Same styles as previous course pages */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #444648, #21cbf3);
        }

        header {
            background-color: #343a40; 
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        main {
            padding: 20px;
            text-align: left;
        }

        .course-section {
            background-color: #EBD9B4;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px 0;
            padding: 20px;
        }

        .start-learning-button {
            display: block;
            margin: 20px auto;
            padding: 10px 35px;
            background-color: black;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .start-learning-button:hover {
            background-color: #45a049;
        }

        .checkbox-container {
            margin: 20px 0;
            text-align: center;
        }
        nav span {
            color: white; /* Text color */
            text-decoration: none; /* No underline */
            margin: 5px 0; /* Space between items */
        }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
      
    </style>
    <script>
        function navigateToAssessment() {
            var checkbox = document.getElementById("assessment-checkbox");
            if (checkbox.checked) {
                window.location.href = "datascience_assessment.php"; // Navigate to the Data Science assessment page
            } else {
                alert("Please agree to proceed to the assessment.");
            }
        }
    </script>
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
        <div class="course-section">
            <h2>Introduction to Data Science</h2>
            <p><strong>1. What is Data Science?</strong><br>
            Data Science is a multi-disciplinary field that uses scientific methods, processes, algorithms, and systems to extract knowledge and insights from structured and unstructured data.</p>

            <p><strong>2. Key Components of Data Science:</strong><br>
            Key components include data analysis, machine learning, big data technologies, and data visualization.</p>

            <p><strong>3. Tools Used in Data Science:</strong><br>
            Common tools include Python, R, SQL, Hadoop, and Tableau, which help in analyzing and visualizing data.</p>

            <p><strong>4. Applications of Data Science:</strong><br>
            Data Science is used in various fields such as finance, healthcare, marketing, and social sciences for predictive analytics and decision-making.</p>

            <p>To understand more about Data Science, you can check out this video: <a href="https://www.youtube.com/watch?v=G8y2Z9LsR5Q">Learn more here</a>.</p>
        </div>

        <div class="checkbox-container">
            <label>
                <input type="checkbox" id="assessment-checkbox"> I agree to proceed to the assessment.
            </label>
            <br>
            <button class="start-learning-button" onclick="navigateToAssessment()">Go to Assessment</button>
        </div>
    </main>

</body>
</html>
