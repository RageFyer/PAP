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
    <link rel="stylesheet" href="../css/changepass/page.css">
    <link rel="stylesheet" href="../css/changepass/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Alterar Password - Build Your Own</title>
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

    <div class="password">
        <form method="post">
            <h2>Alterar palavra-passe</h2>
            <p id="error_msg"></p>
            <div class="form-group">
                <label for="current_password">Palavra-passe atual</label>
                <input type="password" name="current_password" id="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Nova palavra-passe</label>
                <input type="password" name="new_password" id="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_new_password">Confirmar nova palavra-passe</label>
                <input type="password" name="confirm_new_password" id="confirm_new_password" required>
            </div>
                <button type="submit" name="change_password">Alterar palavra-passe</button>
        </form>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] ===  "POST"){
            $currentpass = $_POST['current_password'];
            $newpassword = $_POST['new_password'];
            $confirmpass = $_POST['confirm_new_password'];


            if ($newpassword == $confirmpass){
                $db = new DBDataProvider();
                $db->changePassword($currentpass, $newpassword);
            }else{
                echo "<script>document.getElementById('error_msg').innerHTML = 'As palavras-passe não coincidem!'</script>";  
            }
        }
    ?>
</body>