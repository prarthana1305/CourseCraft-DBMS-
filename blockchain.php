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
    <title>Blockchain Course</title>
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
        nav span {
            color: white; /* Text color */
            text-decoration: none; /* No underline */
            margin: 5px 0; /* Space between items */
        }
        nav { display: flex; flex-direction: column; align-items: flex-end; }

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
                window.location.href = "blockchain_assessment.php"; // Navigate to the Blockchain assessment page
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
            <h2>Concepts of Blockchain</h2>
            <p><strong>1. What is Blockchain?</strong><br>
            Blockchain is a distributed ledger technology that securely records transactions across multiple computers. This ensures that the record cannot be altered retroactively without the alteration of all subsequent blocks and the consensus of the network.</p>

            <p><strong>2. Key Features of Blockchain:</strong><br>
            Blockchain technology provides transparency, security, and decentralization, making it a revolutionary solution for various applications such as cryptocurrency, supply chain management, and smart contracts.</p>

            <p><strong>3. How Does Blockchain Work?</strong><br>
            Each block contains a number of transactions and is linked to the previous block through a cryptographic hash, forming a chain. This chain is maintained across multiple nodes, ensuring that every participant in the network has access to the same information.</p>

            <p><strong>4. Benefits of Blockchain:</strong><br>
            Some of the main benefits include increased security, reduced transaction costs, improved traceability, and enhanced transparency in business operations.</p>

            <p>To understand more about Blockchain, you can check out this video: <a href="https://www.youtube.com/watch?v=SSo_EIwH_wg">Learn more here</a>.</p>
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
