<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <!-- Left section for the ad -->
        <div class="left-section">
            <img src="assets/img/background.jpg" alt="" width="100%" height="100%">
        </div>
        
        <!-- Right section for the login form -->
        <div class="right-section">
            <h2>Sign in to ITviec!</h2>
            <form action="login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="e.g. free2rhyme@yahoo.com" required>
                
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Keep me signed in</p>
                </div>

                <input type="submit" value="Sign In" name="signin">
                
                <div class="help-links">
                    <a href="#">I can't access my account</a> | 
                    <a href="#">Help</a>
                </div>
            </form>
            <div class="create-account">
                <p>Don't have a ITviec! ID?</p>
                <a href="#" class="create-button">Create New Account</a>
                <p>OR</p>
                <p>Sign in with:</p>
                <div class="social-login">
                    <a href="#" class="social-btn fb">Facebook</a>
                    <a href="#" class="social-btn google">Google</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>