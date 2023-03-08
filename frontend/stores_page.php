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
    <link rel="stylesheet" href="../css/header/header.css">
    <link rel="stylesheet" href="../css/stores/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lojas</title>
</head>
<body>
    <div class="byo_header">
        <a href="../frontend/mounting_page.php"><span class="byo_navigation montar" onClick="document.getElementsByClassName('byo_scrolled')[0].scrollIntoView();">MONTAR</span></a>
        <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
        <a href="../frontend/stores_page.php"><span class="byo_navigation lojas">LOJAS</span></a>
        <form METHOD="POST">
            <i id="byo_user" class="fa-solid fa-user"></i>
        </form>
    </div>
    <h1 id="title">As lojas de technologia onde podes comprar tudo aquilo que precisas</h1>
    <div class="container">
        <a href="https://www.pcdiga.com/" class="href_stores" target="_blank">
            <div class="backgroundstores">
                <img class="stores" src="../img/logo_pcdiga.png" alt="">
            </div>
        </a>
        <a href="https://www.globaldata.pt/" class="href_stores" target="_blank">
            <div class="backgroundstores">
                <img class="stores" src="../img/logo_globaldata.png" alt="">
            </div>
        </a>
        <a href="https://www.pccomponentes.pt/" class="href_stores" target="_blank">
            <div class="backgroundstores">
                <img class="stores ajusts" src="../img/logo_pccomponentes.png" alt="">
            </div>
        </a>
        <a href="https://www.mbit.pt/" class="href_stores" target="_blank">
            <div class="backgroundstores">
                <img class="stores ajusts" src="../img/logo_mbit.png" alt="">
            </div>
        </a>
    </div>

    <?php
        if(isset($_SESSION['username'])){
            echo "<script>
            document.getElementById('byo_user').onclick = function() {
                window.location.href = '../frontend/personaldata_page.php';
            }
            </script>";
        }else{
            echo "<script>
            document.getElementById('byo_user').onclick = function() {
                window.location.href = '../frontend/login_page.php';
            }
            </script>";
        }
    ?>
</body>
</html>