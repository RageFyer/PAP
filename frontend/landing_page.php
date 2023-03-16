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
                        <img src="https://static.pcdiga.com/media/catalog/product/cache/4a9972e1440204cef7cf19ceb7c4fc35/s/9/s9a0d99s_1.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador OMEN by HP 25L Gaming Desktop GT15-0003np</p>
                        <p class="build_settings">Intel Core i7-12700F | W11 Home | 16GB RAM | GeForce RTX 3060 Ti | SSD 1TB</p><br>
                        <span class="price">1799 €</span><br>
                        <a href="https://www.pcdiga.com/computadores-e-software/computadores-desktop/computadores-gaming/computador-omen-by-hp-25l-gaming-desktop-gt15-0003np-6l0n3ea-ab9-196786171345"><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="https://static.pcdiga.com/media/catalog/product/cache/4a9972e1440204cef7cf19ceb7c4fc35/1/_/1_p047885_3.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop Lenovo Legion T5 26IAB7-880</p>
                        <p class="build_settings">Intel Core i7-12700F | Sistema Operativo Não Incluído | 16GB RAM | GeForce RTX 3060 | SSD 512GB</p><br>
                        <span class="price">1399 €</span><br>
                        <a href="https://www.pcdiga.com/computadores-e-software/computadores-desktop/computadores-gaming/computador-desktop-lenovo-legion-t5-26iab7-880-90sv00d5pg-196800505880"><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="https://static.pcdiga.com/media/catalog/product/cache/4a9972e1440204cef7cf19ceb7c4fc35/p/0/p046403_3.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Victus by HP 15L Gaming Desktop TG02-0016np</p>
                        <p class="build_settings">AMD Ryzen 5 5600G | Free DOS | 16GB RAM | GeForce GTX 1660 SUPER | SSD 512GB</p><br>
                        <span class="price">649 €</span><br>
                        <a href="https://www.pcdiga.com/computadores-e-software/computadores-desktop/computadores-gaming/computador-victus-by-hp-15l-gaming-desktop-tg02-0016np-6b450ea-ab9-196548630271"><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="https://static.pcdiga.com/media/catalog/product/cache/4a9972e1440204cef7cf19ceb7c4fc35/1/_/1_p051463.jpg" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador Desktop MSI MPG Trident A 12TC-449EU</p>
                        <p class="build_settings">Intel Core i5-12400F | W11 Home | 16GB RAM | GeForce RTX 3060 | SSD 512GB + HDD 1TB</p><br>
                        <span class="price">1299 €</span><br>
                        <a href="https://www.pcdiga.com/computadores-e-software/computadores-desktop/computadores-gaming/computador-desktop-msi-mpg-trident-a-12tc-449eu-9s6-b924211-449-4711377032858"><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="https://img.globaldata.pt/products/KM22-LTD-021.jpg?auto=compress%2Cformat&fit=fill&fill-color=fff&q=70&fill=solid&w=805&h=805" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador King Mod Limited Liquid R7</p>
                        <p class="build_settings">Ryzen 7 3800XT | 32GB DDR4 | SSD 1TB | HDD 2TB | RTX 2070</p><br>
                        <span class="price">2999 €</span><br>
                        <a href="https://www.globaldata.pt/computador-king-mod-limited-liquid-r7-3800xt-16gb-1tb-2tb-rtx-2070-super-km22-ltd-021"><button class="card_btn">Saber mais</button></a>
                    </div>
                </div>
                <div class="byo_card">
                    <div class="build_img">
                        <img src="https://img.globaldata.pt/products/KML22-EKHYDRA.jpg?auto=compress%2Cformat&fit=fill&fill-color=fff&q=70&fill=solid&w=805&h=805" class="card_img" alt="">
                    </div>
                    <div class="byo_cardinfo">
                        <p class="build_name">Computador King Mod Liquid EKWB Hydra R7</p>
                        <p class="build_settings">AMD Ryzen 7 5800X | 16GB DDR4 | SSD 512GB | RTX 3060 Ti</p><br>
                        <span class="price">2599 €</span><br>
                        <a href="https://www.globaldata.pt/computador-king-mod-liquid-ekwb-hydra-r7-16gb-512gb-rtx-3060-ti-w10-kml22-ekhydra"><button class="card_btn">Saber mais</button></a>
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