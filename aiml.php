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
    <title>AI/ML Course</title>
    <style>
        /* Same styles as in the Big Data course */
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

        .course-section h2 {
            margin-bottom: 10px;
        }

        .course-section p {
            margin-bottom: 15px;
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
                window.location.href = "aiml_assessment.php"; // Navigate to the AI/ML assessment page
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
            <h2>Concepts of AI/ML</h2>
            <p><strong>1. What is AI?</strong><br>
            Artificial Intelligence (AI) refers to the simulation of human intelligence in machines. These systems are designed to think like humans and mimic their actions. The goal of AI is to enable machines to perform tasks that would typically require human intelligence, such as visual perception, speech recognition, decision-making, and language translation.</p>

            <p><strong>2. What is Machine Learning?</strong><br>
            Machine Learning (ML) is a subset of AI that focuses on the use of data and algorithms to imitate the way that humans learn, gradually improving its accuracy. Machine learning involves training a model on a dataset and then using this model to make predictions or decisions without being explicitly programmed for the task.</p>

            <p><strong>3. Applications of AI/ML:</strong><br>
            AI and ML technologies are utilized in various fields, including healthcare for predictive analytics, finance for fraud detection, and customer service for chatbots. They help in making more informed decisions and automating processes.</p>

            <p><strong>4. Big Data in AI/ML:</strong><br>
            The effectiveness of AI and ML algorithms largely depends on the amount of data available. Big Data provides the necessary fuel for training complex models that can learn and adapt to new information.</p>

            <p>To understand more about AI and ML, you can check out this video: <a href="https://www.youtube.com/watch?v=2ePf9rue1Ao">Learn more here</a>.</p>
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
