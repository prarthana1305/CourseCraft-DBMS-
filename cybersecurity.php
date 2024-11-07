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
    <title>Cybersecurity Course</title>
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

        nav span {
            color: white; /* Text color */
            text-decoration: none; /* No underline */
            margin: 5px 0; /* Space between items */
        }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
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
    </style>
    <script>
        function navigateToAssessment() {
            var checkbox = document.getElementById("assessment-checkbox");
            if (checkbox.checked) {
                window.location.href = "cybersecurity_assessment.php"; // Navigate to the Cybersecurity assessment page
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
            <h2>Introduction to Cybersecurity</h2>
            <p><strong>1. What is Cybersecurity?</strong><br>
            Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks.</p>

            <p><strong>2. Importance of Cybersecurity:</strong><br>
            It is crucial to protect sensitive information and ensure data integrity and availability.</p>

            <p><strong>3. Types of Cyber Threats:</strong><br>
            Common threats include malware, phishing, and ransomware attacks that exploit vulnerabilities.</p>

            <p><strong>4. Key Concepts in Cybersecurity:</strong><br>
            Key concepts include authentication, encryption, and intrusion detection systems.</p>

            <p>To understand more about Cybersecurity, you can check out this video: <a href="https://www.youtube.com/watch?v=7pETu1OVvDk">Learn more here</a>.</p>
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
