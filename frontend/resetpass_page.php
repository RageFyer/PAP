<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/resetpass/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Recuprar - Build Your Own</title>
</head>
<body>
    <a href="../frontend/login_page.php">
        <div class="arrow">
            <i class="fa-solid fa-angle-left"></i><span id="back">Voltar</span>
        </div>
        <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
    </a>
    <p id="forgottxt">Restaurar palavra-pass</p>
    <div id="success">
        <span class="closebtn" onclick="this.parentElement.style.display='nome';">&times;</span>
        <span>A palavra-pass foi alterada com sucesso!</span>
    </div>
    <div id="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='nome';">&times;</span>
        <span id="message">Não foi possivel alterar a palavra-pass</span>
    </div>
    <div class="container">
        <form method="POST">
            <div class="input">
                <p>Nova Palavra-pass</p>
                <input type="text" name="pass" id="user">
            </div>
            <div class="input">
                <input id="submit" type="submit" value="Repor palavra-pass">
            </div>
        </form>
    </div>
    <script>
        let close = document.getElementsByClassName("closebtn");
        let i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                let div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    <?php
        session_start();
        include("../base/dbdataprovider.php");

        if ($_SERVER['REQUEST_METHOD'] ===  "POST"){
            $pass = $_POST['pass'];

            if(empty($pass)){
                echo '<script>document.getElementById("message").textContent="Tem que escrever uma nova palavra-pass"; document.getElementById("alert").style.display = "block"</script>';
                session_destroy();
            }else{
                $dataprovider = new DBDataprovider();
                $dataprovider->resetPassword($pass);
            }
        }
    ?>
</body>
</html>