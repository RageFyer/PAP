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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/window.css">
    <link rel="stylesheet" href="../css/header/header.css">
    <link rel="stylesheet" href="../css/mouting/page.css">
    <link rel="stylesheet" href="../css/header/sidebar.css">
    <link rel="stylesheet" href="../css/mouting/popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Montar</title>
</head>
<body>
    <div class="byo_header">
        <a href="../frontend/mounting_page.php"><span class="byo_navigation montar" onClick="document.getElementsByClassName('byo_scrolled')[0].scrollIntoView();">MONTAR</span></a>
        <a href="../frontend/landing_page.php"><img id="byo_logo" src="../img/BYO_LOGO.png"></a>
        <a href=""><span class="byo_navigation lojas">LOJAS</span></a>
        <i id="byo_user" class="fa-solid fa-user"></i>
    </div>

    <div class="popup">
        <button id="fechar-popup"><i class="fas fa-times"></i></button>
        <div class="search">
            <input id="search_bar" type="text" placeholder="Procurar...">
            <button id="search_button"><i class="fa-solid fa-search"></i></button>
        </div>
    </div>


    <div class="byo_scrolled">
        <h2 class="byo_category2">DÁ ASAS À TUA MONTAGEM!</h2>
        <div class="content">
            <div class="byo_buildContainer cpu">
                <p class="title">PROCESSADORES</p>
                <img class="piece" src="" alt="">
                <p id="processador" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer cooler">
                <p class="title">COOLER</p>
                <img class="piece" src="" alt="">
                <p id="cooler" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer motherboard">
                <p class="title">MOTHERBOARD</p>
                <img class="piece" src="" alt="">
                <p id="motherboard" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer ram">
                <p class="title">RAM</p>
                <img class="piece" src="" alt="">
                <p id="ram" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
        </div>
        <div class="content">
            <div class="byo_buildContainer graphics">
                <p class="title">PLACA GRÁFICA</p>
                <img class="piece" src="" alt="">
                <p id="graphics" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer storage">
                <p class="title">ARMAZENATO</p>
                <img class="piece" src="" alt="">
                <p id="storage" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer powersupply">
                <p class="title">FONTES DE ALIMENTAÇÃO</p>
                <img class="piece" src="" alt="">
                <p id="power" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
            <div class="byo_buildContainer case">
                <p class="title">CAIXA</p>
                <img class="piece" src="" alt="">
                <p id="case" class="modelo"></p>
                <button class="check"><i class="fa-solid fa-repeat"></i></button>
            </div>
        </div>
        <div id="buttons">
            <button id="verify">Verificar Compatibilidades</button>
            <button type="submit" id="save">Guardar</button>
        </div>
    </div>

    <script>
        const checkBtn = document.querySelectorAll('.check');
        const popup = document.querySelector('.popup');
        const confirmBtn = document.querySelectorAll('.confirm');

        popup.addEventListener('click', function() {
            if (event.target.id == 'fechar-popup' || event.target.parentElement.id == 'fechar-popup') {
                const infos = document.getElementById('infos');
                infos.remove();
                popup.classList.forEach(className => {
                    if (className !== 'popup') {
                        popup.classList.remove(className);
                    }
                });
                popup.style.display = 'none';
            }
        });

        for (let i = 0; i < checkBtn.length; i++) {
            checkBtn[i].addEventListener('click', function() {
                const containers = popup.querySelectorAll('.container');
                for (let i = 0; i < containers.length; i++) {
                    containers[i].remove();
                }

                if (this.parentElement.classList.contains('cpu')) {
                    popup.classList.add('cpu');
                    popup.innerHTML += '<?php $dataprovider->getCpus(); ?>';
                }else if (this.parentElement.classList.contains('cooler')) {
                    popup.classList.add('cooler');
                    popup.innerHTML += '<?php $dataprovider->getCoolers(); ?>';
                }else if(this.parentElement.classList.contains('motherboard')) {
                    popup.classList.add('motherboard');
                    popup.innerHTML += '<?php $dataprovider->getMbs(); ?>';
                }else if(this.parentElement.classList.contains('ram')) {
                    popup.classList.add('ram');
                    popup.innerHTML += '<?php $dataprovider->getRams(); ?>';
                }else if(this.parentElement.classList.contains('graphics')) {
                    popup.classList.add('graphics');
                    popup.innerHTML += '<?php $dataprovider->getGpus(); ?>';
                }else if(this.parentElement.classList.contains('storage')) {
                    popup.classList.add('storage');
                    popup.innerHTML += '<?php $dataprovider->getStorages(); ?>';
                }else if(this.parentElement.classList.contains('powersupply')) {
                    popup.classList.add('powersupply');
                    popup.innerHTML += '<?php $dataprovider->getPowers(); ?>';
                }else if(this.parentElement.classList.contains('case')) {
                    popup.classList.add('case');
                    popup.innerHTML += '<?php $dataprovider->getCases(); ?>';
                }
                popup.style.display = 'block';
            });
        }

        popup.addEventListener('click', function(event) {
            if (event.target.classList.contains('confirm') || event.target.parentElement.classList.contains('confirm')) {
                const parent = event.target.parentNode.parentNode;
                const img = parent.querySelector('.img');
                const modelo = parent.querySelector('.name');


                if (popup.classList.contains('cpu')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.cpu');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('cooler')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.cooler');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('motherboard')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.motherboard');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML
                }else if (popup.classList.contains('ram')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.ram');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('graphics')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.graphics');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('storage')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.storage');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('powersupply')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.powersupply');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }else if (popup.classList.contains('case')) {
                    const buildContainer = document.querySelector('.byo_buildContainer.case');
                    const piece = buildContainer.querySelector('.piece');
                    const modeloPiece = buildContainer.querySelector('.modelo');
                    piece.src = img.src;
                    modeloPiece.innerHTML = modelo.innerHTML;
                }
                popup.classList.forEach(className => {
                    if (className !== 'popup') {
                        const infos = document.getElementById('infos');
                        infos.remove();
                        popup.classList.remove(className);
                    }
                    popup.style.display = 'none';
                });
            }
        });

    </script>

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