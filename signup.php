<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="animate.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="header_content">
                <h1>Daftar Akun Baru</h1>
            </div>
        </header>
        <main>
            <div class="container" id="login-form">
            <form method="post" action="aksi_signup.php" id="signup-form">
                <div class="input-group">
                    <input style="width: 280px;" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input style="width: 280px;" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input id="btnsignup" type="submit" value="Daftar" class="btn">
                </div>
            </form>
            </div>
        </main>
        <div class="clear"></div>
    </div>
</body>
</html>
