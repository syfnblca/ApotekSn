<!-- register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register - ApotekKu</title>
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
        <h2>Register</h2>
        <form method="POST" action="proses/register_proses.php" class="form-box">
            <label>Username:</label>
            <input type="text" name="username" required>
            
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Password:</label>
            <input type="password" name="password" required>
            
            <label>Nama Lengkap:</label>
            <input type="text" name="nama_lengkap">
            
            <label>Jabatan:</label>
            <input type="text" name="jabatan">
            
            <label>Nomor Telepon:</label>
            <input type="text" name="nomor_telepon">
            
            <button type="submit">Register</button>
        </form>
        <p><a href="index.php">Sudah punya akun? Login</a></p>
    </div>
</body>
</html>
