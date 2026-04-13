<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // still basic

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #e0f2fe;
        }

        .login-box {
            background: rgba(30, 58, 138, 0.3);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
            text-align: center;
        }

        h2 {
            color: #93c5fd;
        }

        input {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: none;
            background: #1e293b;
            color: white;
        }

        button {
            padding: 10px 20px;
            background: #2563eb;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #1d4ed8;
            transform: scale(1.05);
        }

        .error {
            color: #f87171;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>