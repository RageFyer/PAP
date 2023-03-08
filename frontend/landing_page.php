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
    <link rel="stylesheet" href="../css/landing/page.css">
    <link rel="stylesheet" href="../css/header/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Build Your Own</title>
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
    
    <div class="byo_about">
        <p id="texto">
            O BUILD YOUR OWN é o lugar perfeito para aqueles que desejam montar o seu próprio computador. 
            Com uma vasta seleção de peças e componentes de alta qualidade, vais poder escolher exatamente 
            o que precisas para construir o computador dos teus sonhos. Além disso, o site oferece opções 
            de computadores pré-montados, para aqueles que preferem deixar a tarefa nas mãos de 
            especialistas. O nosso site também oferece uma variedade de opções de componentes de computadores,
            garantindo que possas encontrar exatamente o que precisas. Se estiveres à procura de construir
            o teu próprio computador ou simplesmente atualizar o teu atual, o BUILD YOUR OWN é o 
            lugar certo para ti.
        </p>
    </div>
    <div class="byo_body">
        <h2 class="byo_category">PRÉ MONTADOS</h2>
        <section class="byo_prebuilds">
            <button class="pre-btn"><img src="../img/arrow.png" alt=""></button>
            <button class="nxt-btn"><img src="../img/arrow.png" alt=""></button>
            <div class="byo_container">
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="../img/img1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MAG Codex 5 12TC-1478ES</p>
                        <p class="build_settings">Intel Core i5-12400F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1000 €</span><br>
                        <a href=""><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
            </div>
        </section>
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

    <script>
        const productContainers = [...document.querySelectorAll('.byo_container')];
        const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
        const preBtn = [...document.querySelectorAll('.pre-btn')];

        productContainers.forEach((item, i) => {
            let containerDimensions = item.getBoundingClientRect();
            let containerWidth = containerDimensions.width;

            nxtBtn[i].addEventListener('click', () => {
                item.scrollLeft += containerWidth;
            })

            preBtn[i].addEventListener('click', () => {
                item.scrollLeft -= containerWidth;
            })
        })

    </script>
</body>
</html>