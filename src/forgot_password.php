<!-- forgot_password.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password - ApotekKu</title>
    <link rel="stylesheet" href="style.css">
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
        <h2>Reset Password</h2>
        <form method="POST" action="proses/forgot_password_proses.php" class="form-box">
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <button type="submit">Reset</button>
        </form>
        <p><a href="index.php">Kembali ke Login</a></p>
    </div>
</body>
</html>
