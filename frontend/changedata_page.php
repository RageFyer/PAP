<?php
    session_start();
    include("../base/dbdataprovider.php");

    $dataprovider = new DBDataprovider();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/changedata/page.css">
    <link rel="stylesheet" href="../css/changedata/header.css">
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
        <?php
            $dataprovider = new DBDataprovider();
            $dataprovider->getImage();
        ?>
        <img class="img" src="../img/user.png">
        <input type="file" id="inputfile" name="profile_pic" style="display: none;" >
        <div id="button" onclick="document.getElementById('inputfile').click();">
            <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <div class="background">
            <input id="name" type="text" name="name" value="<?php echo $dataprovider->getName();?>"><i class="namepen fa-solid fa-pencil"></i>
            <span class="label email">Email:</span>
            <input class="email" type="text" name="old_email" readonly="readonly" value="<?php echo $dataprovider->getEmail();?>"><i class="emailpen fa-solid fa-pencil"></i>
            <span class="label">Novo Email:</span>
            <input class="email" type="text" name="new_email" value=""> 
            <button id="btn" type="submit">Aplicar Alterações</button>
        </div>
    </form>

    <p id="error_msg"></p>
    <p id="msg"></p>

    <?php
        if ($_SERVER['REQUEST_METHOD'] ===  "POST"){
            $name = $_POST['name'];
            $old_email = $_POST['old_email'];
            $new_email = $_POST['new_email'];
            $_FILES['profile_pic'] = $_POST['profile_pic'];

            $dataprovider = new DBDataprovider();
            $dataprovider->changeUser($name, $old_email, $new_email, $_FILES['profile_pic']);
        }
    ?>
</body>
</html>