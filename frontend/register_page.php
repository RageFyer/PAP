<?php
    session_start();
    include("../base/dbdataprovider.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/register/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registar - Build Your Own</title>
</head>
<body>
    <a href="landing_page.php">
        <div class="arrow">
            <i class="fa-solid fa-angle-left"></i><span id="back">Voltar</span>
        </div>
        <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
    </a>
    <div class="container">
        <p id="registar">Registar</p>
        <p id="error_msg"></p>
        <form method="POST">
            <div class="input">
                <p>Username</p>
                <input type="text" name="username" id="user">
            </div>
            <div class="input">
                <p>Email</p>
                <input type="email" name="email" id="email">
            </div>
            <div class="input">
                <p>Password</p>
                <input type="password" name="password" id="password">
            </div>
            <div class="input">
                <input id="submit" type="submit" value="Registar">
            </div>
        </form>
        <p id="signin">Já tens conta? <a href="login_page.php">Login</a></p>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($username)){
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'O campo username não pode estar vazio';
                </script>";
            }else if(empty($email)){
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'O campo email não pode estar vazio';
                </script>";
            }else if(empty($password)){
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'O campo password não pode estar vazio';
                </script>";
            }else{
                $dataprovider = new DBDataprovider();
                $dataprovider->addUser($username, $email, $password);
            }
        }
    ?>
</body>
</html>