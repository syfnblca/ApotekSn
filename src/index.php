<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - ApotekKu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error-box {
            display: flex;
            align-items: center;
            background-color: #ffe0e0;
            border-left: 6px solid #ff4d4d;
            color: #b30000;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 6px;
            font-size: 14px;
        }
        .error-box svg {
            margin-right: 10px;
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="logo">ApotekKu</a>
        <ul>
            <li><a href="index.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="forgot_password.php">Forgot Password?</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Login</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-box">
                <!-- Ikon warning (SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 24 24" fill="#b30000">
                    <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
                <span><?= $_SESSION['error']; ?></span>
            </div>
            <?php unset($_SESSION['error']); // Hapus pesan setelah ditampilkan ?>
        <?php endif; ?>

        <form method="POST" action="proses/login_proses.php" class="form-box">
            <label>Username:</label>
            <input type="text" name="username" required>
            
            <label>Password:</label>
            <input type="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>

        <p><a href="register.php">Register</a> | <a href="forgot_password.php">Forgot Password?</a></p>
    </div>
</body>
</html>
