<?php
session_start();
require __DIR__ . '/db_connection.php';

$error_message = ''; // Initialize error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM utilisateurs WHERE username = :username AND password = :password");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Vérifiez le rôle et faites la redirection
        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
            exit;
        } elseif ($user['role'] === 'employe') {
            header("Location: employe_dashboard.php");
            exit;
        } else {
            $error_message = "Rôle inconnu.";
        }
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login </title>
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
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.container h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333333;
    font-weight: 600;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
    animation: slideIn 1.2s ease-in-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333333;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid #cccccc;
    border-radius: 6px;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color:rgb(98, 130, 185);
    box-shadow: 0 0 8px rgb(93, 143, 229);
}

.btn {
    display: inline-block;
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg,rgb(39, 72, 59),rgb(114, 164, 251));
    color: #ffffff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
    text-transform: uppercase;
    animation: fadeIn 1.5s ease-in-out;
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

@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .btn {
        font-size: 14px;
    }

    .form-group input {
        font-size: 14px;
    }
}
.alert {
            padding: 15px;
            margin: 20px 0;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .toggle-password {
            cursor: pointer;
            font-size: 14px;
            color: #2575fc;
            display: inline-block;
            margin-top: 5px;
        
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Page Login</h2>
           <!-- Show error message if exists -->
           <?php if (!empty($error_message)): ?>
            <div class="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Full name:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePassword('password')">Show Password</span>
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>
        <div class="links">
            <a href="signup.php">Signup   |   </a>
            <a href="#">Forget password ?</a>
        </div>
    </div>
    <script>
        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            field.type = (field.type === "password") ? "text" : "password";
        }
    </script>   
</body>
</html>


