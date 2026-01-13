<?php
    if (isset($_POST['signup'])) {
        require 'db_connection.php';

        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        // Validate username (must be at least two words)
        if (!preg_match("/^[a-zA-Z]+ [a-zA-Z]+$/", $username)) {
            $error_message = "Please enter your full name (first and last name).";
        }
        // Validate password
        elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{1,12}$/", $password)) {
            $error_message = "Password must contain:
            <ul>
                <li>At least one uppercase letter</li>
                <li>At least one lowercase letter</li>
                <li>At least one number</li>
                <li>At least one special character</li>
                <li>Maximum length of 12 characters</li>
            </ul>";
        }
        // Check if passwords match
        elseif ($password !== $confirm_password) {
            $error_message = "Passwords do not match. Please try again.";
        } else {
            // Check if the username already exists
            $checkStmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
            $checkStmt->execute([$username]);
            
            if ($checkStmt->rowCount() > 0) {
                $error_message = "Username already exists. Please choose another one.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new employee with the role of 'employe'
                $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, password, role) VALUES (?, ?, ?)");
                $stmt->execute([$username, $hashedPassword, 'employe']);

                $success_message = "Employee registered successfully!";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('background_text.png') no-repeat center center/cover;
            color: #ffffff;
            overflow: hidden;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            padding: 70px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            animation: slideDown 0.5s ease;
        }

        .alert-success {
            background-color: #4caf50;
            color: white;
        }

        .alert-error {
            background-color: #f44336;
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
        }

        .toggle-password {
            cursor: pointer;
            font-size: 14px;
            color: #2575fc;
            display: inline-block;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            text-transform: uppercase;
        }

        .btn:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            color: #2575fc;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #6a11cb;
            text-decoration: underline;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333333;
        }
        h2{
            color: black;
        }

    </style>
</head>
<body>
    <div class="container">
     <h2>Employe Sign-up</h2>
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="username">Full Name:</label>
                <input type="text" id="username" name="username" placeholder="First Name Last Name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter a new password" required>
                <span class="toggle-password" onclick="togglePassword('password')">Show Password</span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                <span class="toggle-password" onclick="togglePassword('confirm_password')">Show Password</span>
            </div>
            <button type="submit" name="signup" class="btn">Sign Up</button>
            <div class="links">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>   

    <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            field.type = (field.type === "password") ? "text" : "password";
        }
    </script>   
</body>
</html>
