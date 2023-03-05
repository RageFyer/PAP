<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/forgotpass/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login - Build Your Own</title>
</head>
<body>
    <a href="../frontend/login_page.php">
        <div class="arrow">
            <i class="fa-solid fa-angle-left"></i><span id="back">Voltar</span>
        </div>
        <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
    </a>
    <p id="forgottxt">Esqueceste-te da palavra-pass?</p>
    <div class="container">
        <form method="POST">
            <div class="input">
                <p>Email</p>
                <input type="text" name="user" id="user">
            </div>
            <div class="input">
                <input id="submit" type="submit" value="Repor palavra-pass">
            </div>
        </form>
    </div>
</body>
</html>