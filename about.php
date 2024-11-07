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
    <title>About</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .about-section {
            background-color: #EBD9B4;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px auto;
            padding: 20px;
        }

        .about-section h2 {
            margin-bottom: 10px;
        }

        .about-section p {
            margin-bottom: 15px;
        }
        nav span {
            color: white; 
            text-decoration: none; 
            margin: 5px 0; 
        }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
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
    <div class="about-section">
        <h2>About This Platform</h2>
        <p>This platform offers various courses in the field of technology, including Artificial Intelligence, Machine Learning, Big Data, and Blockchain. Our goal is to provide comprehensive knowledge and assessments to help you succeed in your learning journey.</p>
        <p>For any inquiries, feel free to contact us at support@yourplatform.com.</p>
    </div>
</main>

</body>
</html>
