<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/changedata/page.css">
    <link rel="stylesheet" href="../css/changedata/header.css">
    <meta http-equiv="refresh" content="1;url=../frontend/changedata_page.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados - Build Your Own</title>
</head>
<body>
    <div class="byo_header">
        <a href="../frontend/personaldata_page.php">
            <div class="arrow">
                <i class="fa-solid fa-angle-left"></i><span id="back">Voltar</span>
            </div>
            <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
        </a>
        <a href="../frontend/personaldata_page.php"><i id="byo_user" class="fa-solid fa-user"></i></a>
    </div>
    
    <form method="POST">
        <div class="img"></div>
        <div class="background">
            <input id="name" type="text" name="name" value="Joao">
            <span class="label">Email Antigo:</span>
            <input class="email" type="text" name="old_email" value="androxlast@gmail.com">
            <span class="label">Novo Email:</span>
            <input class="email" type="text" name="new_email" value="androxlast@gmail.com">
            <button id="btn" type="submit"> Guardar</button>
        </div>
    </form>
</body>
</html>