<?php
session_start(); 

if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];


$servername = "localhost"; 
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "course_management"; 


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course_name'];
    $marks = $_POST['marks_obtained'];

    $stmt = $conn->prepare("INSERT INTO student (userid, username, course, marks) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $userid, $username, $course, $marks);


    if ($stmt->execute()) {
        echo "Record stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Data Assessment</title>
    <style>
       body { font-family: 'Arial', sans-serif; margin: 0; padding: 0;  background: linear-gradient(to right, #444648, #21cbf3);}
        header { background-color: #343a40; color: #fff; display: flex; justify-content: space-between; align-items: center; padding: 15px 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); }
        main { padding: 20px; text-align: left; }
        .assessment-section { background-color: #EBD9B4; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; margin: 20px auto; padding: 20px; max-width: 400px; }
        .form-input { margin-bottom: 15px; }
        .form-input label { display: block; margin-bottom: 5px; }
        .form-input input { width: 90%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; }
        .submit-button, .google-form-button { display: block; margin: 20px auto; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; }
        .submit-button { background-color: black; color: #fff; }
        .submit-button:hover { background-color: #45a049; }
        
        nav { display: flex; flex-direction: column; align-items: flex-end; }

        .google-form-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            width: 250px; 
            background-color: #357AE8;
        }

        /* Navigation link styling */
        nav span {
            color: white; /* Text color */
            text-decoration: none; /* No underline */
            margin: 5px 0; /* Space between items */
        }
    </style>
</head>
<body>

<header>
        <h1>Assessment Section</h1>
        <nav>
            <span>User ID: <?php echo htmlspecialchars($userid); ?></span>
            <span>Name: <?php echo htmlspecialchars($username); ?></span>
        </nav>
    </header>

    <main>
    <a href="https://docs.google.com/forms/your-google-form-link" target="_blank" class="google-form-button">Go to Assessment</a>
        <div class="assessment-section">
            <h2>Submit Your Assessment</h2>
            <p>Fill in the details below to submit your assessment.</p>
            <p>Note: Please note that the marks is entered after you take up the assessment</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-input">
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name" value="Blockchain" required>
                </div>
                <div class="form-input">
                    <label for="marks_obtained">Marks Obtained:</label>
                    <input type="number" id="marks_obtained" name="marks_obtained" required>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </main>

</body>
</html>
