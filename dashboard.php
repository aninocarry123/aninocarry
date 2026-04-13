<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e40af);
            color: #e0f2fe;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            display: inline-block;
            padding: 40px;
            background: rgba(30, 58, 138, 0.3);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
        }

        h2 {
            color: #93c5fd;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            background: #1d4ed8;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>