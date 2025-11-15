<?php
include "config.php"; // include DB connection
$message = "";

// LOGIN PROCESS
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // CHECK USER IN DB
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // SUCCESS
        header("Location: dashboard.php");
        exit();
    } else {
        // FAIL
        $message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HOME OF EMBROIDERY - Login</title>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background: url('tech-bg.gif') no-repeat center center fixed;
        background-size: cover;
        overflow: hidden;
        animation: zoom 15s infinite alternate;
    }

    @keyframes zoom {
        from { transform: scale(1); }
        to { transform: scale(1.05); }
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .glass-card {
        width: 360px;
        padding: 25px;
        border-radius: 20px;
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        text-align: center;
        transition: 0.5s;
    }

    .glass-card:hover {
        transform: scale(1.02);
    }

    input {
        width: 90%;
        padding: 12px;
        margin-top: 10px;
        border-radius: 10px;
        border: none;
        outline: none;
        background: rgba(255,255,255,0.85);
    }

    button {
        width: 95%;
        padding: 13px;
        margin-top: 15px;
        border: none;
        background: #0066ff;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        font-size: 17px;
        font-weight: bold;
    }

    button:hover {
        background: #0047cc;
    }

    .loading-gif {
        width: 80px;
        margin-bottom: 15px;
    }

    .title {
        color: #fff;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 15px;
        text-shadow: 0 0 5px #000;
    }

    .error {
        color: red;
        margin-top: 10px;
        font-weight: bold;
    }
</style>
</head>

<body>

<div class="container">
    <div class="glass-card">

        <!-- Loading GIF -->
        <img src="loading.gif" class="loading-gif">

        <!-- System Title -->
        <div class="title">HOME OF EMBROIDERY LOGIN</div>

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>

            <button type="submit">Login</button>
        </form>

        <?php if ($message != "") { ?>
            <div class="error"><?php echo $message; ?></div>
        <?php } ?>

    </div>
</div>

</body>
</html>
