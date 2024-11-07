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
    <title>Big Data Course</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #444648, #21cbf3);
        }

        header {
            background-color: #343a40; /* Dark gray background from dashboard */
            color: #fff;
            display: flex;
            justify-content: space-between; /* Space between title and user info */
            align-items: center; /* Center items vertically */
            padding: 15px 30px; /* Padding for header */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Shadow effect */
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
                window.location.href = "bigdata_assessment.php"; // Navigate to the assessment page
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
            <h2>Concepts of Big Data</h2>
            
            <p><strong>1. What is Big Data?</strong><br>
            Big Data refers to the enormous volume of structured, semi-structured, and unstructured data generated from various sources at high velocity. The traditional data processing software struggles to manage this massive amount of data, hence the term “Big Data.” The concept encompasses several characteristics known as the "3Vs": Volume, Velocity, and Variety. 

            - **Volume** refers to the vast amounts of data generated every second. Data is being produced at an unprecedented scale, from social media interactions to transactional data from e-commerce platforms.
            - **Velocity** indicates the speed at which this data is generated and processed. In today’s digital landscape, real-time data processing is crucial for making timely decisions.
            - **Variety** represents the different types of data, including structured data (like databases), semi-structured data (like JSON), and unstructured data (like videos and social media posts).

            The significance of Big Data lies in its potential to drive insights and decision-making. Organizations can utilize data analytics to improve operations, enhance customer experiences, and develop new products. To understand Big Data better, you can check out this video: <a href="https://www.youtube.com/watch?v=9z1iO3I3dX4">Learn more here</a>.</p>

            <p><strong>2. Types of Big Data:</strong><br>
            Big Data can be classified into three main categories: structured, unstructured, and semi-structured data. 

            - **Structured Data** is highly organized and easily searchable, typically stored in relational databases. Examples include tables with rows and columns, where data types are well-defined (like integers or strings).
            - **Unstructured Data** lacks a predefined format, making it more challenging to process and analyze. This category includes text documents, images, audio files, and videos. Unstructured data constitutes a significant portion of the data generated today.
            - **Semi-Structured Data** lies between structured and unstructured data. It doesn’t have a fixed schema but contains tags or markers to separate different elements. Examples include XML, JSON, and HTML.

            Understanding these types of data is crucial for organizations to manage and analyze their information effectively. For more insights, watch this informative video: <a href="https://www.youtube.com/watch?v=j2UqzY5xYCE">Learn more here</a>.</p>

            <p><strong>3. Big Data Technologies:</strong><br>
            The landscape of Big Data technologies is diverse, comprising tools and frameworks designed to handle the unique challenges posed by large datasets. Some prominent technologies include:

            - **Hadoop**: An open-source framework that allows distributed processing of large datasets across clusters of computers. It utilizes the Hadoop Distributed File System (HDFS) for storage and MapReduce for processing.
            - **Apache Spark**: A fast and general-purpose cluster-computing system that provides in-memory processing capabilities, making it significantly faster than Hadoop for certain tasks.
            - **NoSQL Databases**: Unlike traditional SQL databases, NoSQL databases are designed to handle unstructured data and offer high scalability. Examples include MongoDB, Cassandra, and Couchbase.

            By leveraging these technologies, organizations can effectively process, store, and analyze Big Data. For an overview of Big Data technologies, check out this video: <a href="https://www.youtube.com/watch?v=4t46y1N43Ck">Learn more here</a>.</p>

            <p><strong>4. Data Analytics:</strong><br>
            Data analytics involves examining large datasets to uncover patterns, correlations, and trends that inform decision-making. There are several types of data analytics:

            - **Descriptive Analytics**: This form of analytics answers the question "What happened?" by summarizing past data to provide insights into historical performance.
            - **Diagnostic Analytics**: This type goes a step further, answering "Why did it happen?" by exploring the causes of past outcomes.
            - **Predictive Analytics**: Predictive analytics uses historical data to forecast future events. It employs statistical algorithms and machine learning techniques to identify trends and predict outcomes.
            - **Prescriptive Analytics**: This form suggests actions to achieve desired outcomes. It answers "What should we do?" by recommending optimal solutions based on data analysis.

            By employing these analytics types, organizations can make informed decisions that drive growth and efficiency. For a deeper understanding of data analytics, watch this video: <a href="https://www.youtube.com/watch?v=aRy8TrxU9Mg">Learn more here</a>.</p>

            <p><strong>5. Real-World Applications:</strong><br>
            Big Data has transformative potential across various industries. Some applications include:

            - **Healthcare**: Big Data analytics can improve patient outcomes by analyzing medical records and predicting disease outbreaks. For example, hospitals can use predictive analytics to identify at-risk patients and intervene early.
            - **Finance**: In the finance sector, Big Data is used for fraud detection and risk management. By analyzing transaction patterns, institutions can identify anomalies that indicate fraudulent activities.
            - **Marketing**: Businesses utilize Big Data to personalize customer experiences. By analyzing consumer behavior and preferences, companies can tailor marketing campaigns to specific audiences, increasing engagement and sales.

            These examples demonstrate how leveraging Big Data can lead to significant advantages and innovations. For more insights into real-world applications, check out this video: <a href="https://www.youtube.com/watch?v=GVmD-dA2aSo">Learn more here</a>.</p>
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
