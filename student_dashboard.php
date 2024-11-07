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
    <title>Courses Page</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #444648, #21cbf3);
        }

        /* Header styling */
        header {
            background-color: #343a40; /* Dark gray background */
            color: #fff;
            display: flex;
            justify-content: space-between; /* Space between title and user info */
            align-items: center; /* Center items vertically */
            padding: 15px 30px; /* Padding for header */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        /* Header title styling */
        h1 {
            margin: 0; /* Remove default margin */
            font-size: 2em; /* Larger header font size */
            color: #ffffff; /* White color for title */
        }

        /* Navigation styling */
        nav {
            display: flex;
            flex-direction: column; /* Arrange items vertically */
            align-items: flex-end; /* Align items to the right */
        }

        /* Navigation link styling */
        nav span {
            color: white; /* Text color */
            text-decoration: none; /* No underline */
            margin: 5px 0; /* Space between items */
        }

        /* Main content styling */
        main {
            display: grid; /* Use grid layout */
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive columns */
            gap: 20px; /* Gap between grid items */
            padding: 20px;
            margin-top: 20px; /* Space below header */
        }

        /* Course section styling */
        .course-section {
            background-color: #fff; /* White background for courses */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            border-radius: 8px; /* Rounded corners */
            padding: 20px;
            text-align: left; 
            transition: transform 0.3s, box-shadow 0.3s; /* Animation for hover effect */
            border: 1px solid #ccc; /* Add border */
            text-decoration: none; /* Remove text decoration for links */
            color: inherit; /* Inherit color for text */
        }

        .course-section:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
        }

        /* Course heading styling */
        .course-section h2 {
            margin: 10px 0; 
            font-size: 1.5em; /* Increase heading size */
            color: #333; /* Darker text color for contrast */
            border-bottom: 2px solid #e2e2e2; /* Underline effect */
            padding-bottom: 5px; /* Space below heading */
        }

        /* Course image styling */
        .course-image {
            width: 100%; /* Full width of parent */
            height: 180px; /* Fixed height for images */
            object-fit: cover; /* Cover image */
            border-radius: 5px; /* Rounded corners */
            margin-bottom: 10px;
            border: 2px solid #d2b48c; /* Add border to image */
        }

        /* Course description styling */
        .course-description {
            font-size: 0.9em; /* Slightly smaller font for description */
            color: #666; /* Lighter text color for description */
            line-height: 1.4; /* Better line spacing */
        }

        /* Footer styling */
        footer {
            background-color: #343a40; /* Dark background */
            color: white; /* White text */
            text-align: center;
            padding: 15px;
            position: relative;
            bottom: 0;
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
        <a href="bigdata.php" class="course-section">
            <img src="big_data_image.jpg" alt="Big Data" class="course-image">
            <h2>Big Data</h2>
            <p class="course-description">A comprehensive course covering the processing and analysis of large datasets. Explore tools like Hadoop and Spark.</p>
        </a>

        <a href="devops.php" class="course-section">
            <img src="devops_image.jpg" alt="DevOps" class="course-image">
            <h2>DevOps</h2>
            <p class="course-description">Learn the principles of DevOps, emphasizing collaboration between development and operations teams for efficient software delivery.</p>
        </a>

        <a href="datascience.php" class="course-section">
            <img src="data_science_image.jpg" alt="Data Science" class="course-image">
            <h2>Data Science</h2>
            <p class="course-description">Delve into the world of data exploration, statistical analysis, and machine learning to extract meaningful insights.</p>
        </a>

        <a href="cybersecurity.php" class="course-section">
            <img src="cybersecurity_image.jpg" alt="Cybersecurity" class="course-image">
            <h2>Cybersecurity</h2>
            <p class="course-description">Protect systems and networks from cyber threats. Understand encryption, firewalls, and ethical hacking techniques.</p>
        </a>

        <a href="blockchain.php" class="course-section">
            <img src="blockchain_image.jpg" alt="Blockchain" class="course-image">
            <h2>Blockchain</h2>
            <p class="course-description">Explore the decentralized world of blockchain technology. Learn about cryptocurrencies, smart contracts, and distributed ledgers.</p>
        </a>

        <a href="aiml.php" class="course-section">
            <img src="aiml_image.jpg" alt="AIML" class="course-image">
            <h2>AIML</h2>
            <p class="course-description">Artificial Intelligence and Machine Learning fundamentals. Gain hands-on experience with popular AI/ML frameworks.</p>
        </a>
    </main>

    <footer>
        <p>&copy; 2024 Courses Page. All rights reserved.</p>
    </footer>

</body>
</html>
