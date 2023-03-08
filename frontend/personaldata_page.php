<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/personaldata/page.css">
    <link rel="stylesheet" href="../css/personaldata/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dados - Build Your Own</title>
</head>
<body>
    <div class="byo_header">
        <div>
            <div class="arrow">
                <i class="fa-solid fa-angle-left"></i><span id="back">Voltar</span>
            </div>
            <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
        </div>
        <a href="../frontend/personaldata_page.php"><i id="byo_user" class="fa-solid fa-user"></i></a>
    </div>

    <div class="page">
        <div class="user">
                <img id="img" src="../img/user.png">
                <span id="name"></span>
                <form method="post">
                    <button type="submit" name="logout" id="log_out">terminar sessão <i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
        </div>
        <a class="mycomputers" href="../frontend/mycomputers_page.php">
            <span class="computers_text">Os meus computadores</span>
            <i class="fa-solid fa-desktop computer"></i>
        </a>
        <div class="container">
            <a class="button" href="../frontend/changedata_page.php">
                <i class="fa-solid fa-user icon"></i>
                <span class="text edit">Editar dados</span>
            </a>

            <a class="button" href="../frontend/changepass_page.php">
                <i class="fa-solid fa-lock icon"></i>
                <span class="text">Alterar password</span>
            </a>
        </div>
        
    </div>

    <script>
        const arrow = document.getElementsByClassName('arrow')[0];
        arrow.addEventListener('click', function() {
            window.history.back(); 
        });
    </script>
    
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '<script>document.getElementById("name").innerHTML = "' . $username . '";</script>';
        }

        if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
            header('Location: ../frontend/login_page.php');
            exit;
        }
    ?>
</body>
</html>