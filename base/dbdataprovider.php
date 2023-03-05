<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'C:wamp64\composer\vendor\autoload.php';


class DBDataprovider {
    private $conn;
    
    function connect(){
        $db = parse_ini_file("db_config.ini");
        $this->conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['dbname']);
        if(!$this->conn){
            die("Erro na ligação à base de dados");
        }
    }

    function disconnect(){
        mysqli_close($this->conn);
    }

    function getUser($username, $password){
        $this->connect();
        if($this->userExists($username, $password)){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo "<script>window.location.href = '../frontend/landing_page.php';</script>";
        }else{
            echo "<script>
                document.getElementById('error_msg').innerHTML = 'Username ou password incorretos!';
                </script>";
            $this->disconnect();
            session_destroy();
        }
    }

    function userExists($username, $password){   
        $this->connect();
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $resultset = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($resultset) > 0){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $email, $password){
        $this->connect();
        if($this->emailExists($email)){
            $this->disconnect();
            echo "<script>
                document.getElementById('error_msg').innerHTML = 'Uma conta com este email já existe!';
                </script>";
        }else{
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            $resultset = mysqli_query($this->conn, $sql);
            if($resultset){
                echo "<script>window.location.href = '../frontend/login_page.php';</script>";
                $this->disconnect();
                session_destroy();
            }else{
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Erro ao criar conta!';
                </script>";
                $this->disconnect();
                session_destroy();
            }
        }
    }

    function emailExists($email){
        $this->connect();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $resultset = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($resultset) > 0){
            return true;
        }else{
            return false;
        }
    }

    function changePassword($currentpass, $newpassword){
        $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT password FROM users WHERE username = '$username'";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $currentpass = $row['password'];

            $sql = "UPDATE users SET password = '$newpassword' WHERE username = '$username'";
            $resultset = mysqli_query($this->conn, $sql);
            if ($resultset) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Senha alterada com sucesso!';
                </script>";
            } else {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Error ao alterar a senha!';
                </script>";
            }
        } else {
            echo "<script>
            document.getElementById('error_msg').innerHTML = 'Erro ao alterar a senha!';
            </script>";
        }
    }

    function getCpus(){
        $this->connect();
        $sql = "SELECT name, img, socket, price FROM cpus";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="socket">Socket</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="socket">' . $row['socket'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getGpus(){
        $this->connect();
        $sql = "SELECT name, img, vRam, price FROM graphicscards";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="vram">vRam</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="vram">' . $row['vRam'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getMbs(){
        $this->connect();
        $sql = "SELECT name, img, socket, price FROM motherboards";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="socket">Socket</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="socket">' . $row['socket'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getRams(){
        $this->connect();
        $sql = "SELECT name, img, modules, price FROM rams";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="modulos">Modulos</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="modulos">' . $row['modules'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getStorages(){
        $this->connect();
        $sql = "SELECT name, img, capacity, price FROM storages";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="capacity">Capacidade</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="capacity">' . $row['capacity'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getPowers(){
        $this->connect();
        $sql = "SELECT name, img, watts, price FROM powersupplys";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="watts">Wattage</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="watts">' . $row['watts'] . 'W</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getCases(){
        $this->connect();
        $sql = "SELECT name, img, price FROM cases";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function getCoolers(){
        $this->connect();
        $sql = "SELECT coolers.*, GROUP_CONCAT(sockets.socket SEPARATOR ', ') as sockets
        FROM coolers
        INNER JOIN coolers_sockets ON coolers.id = coolers_sockets.cooler_id
        INNER JOIN sockets ON coolers_sockets.socket_id = sockets.id
        GROUP BY coolers.id;";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="sockets">Sockets</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="sockets">' . $row['sockets'] . '</p>';
                echo '<p class="price">' . $row['price'] . '€</p>';
                echo '<button class="confirm"><i class="fa-solid fa-check"></i></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
    }

    function sendPc($cpu, $gpus, $rams, $storage, $power, $case, $cooler){
        $this->connect();
        $sql = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $user_id = $row['id'];

        $sql = "SELECT id FROM cpus WHERE name = '" . $cpu . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cpu_id = $row['id'];

        $sql = "SELECT id FROM graphicscards WHERE name = '" . $gpus . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $gpu_id = $row['id'];
        
        $sql = "SELECT id FROM rams WHERE name = '" . $rams . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $ram_id = $row['id'];

        $sql = "SELECT id FROM storages WHERE name = '" . $storage . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $storage_id = $row['id'];

        $sql = "SELECT id FROM powersupplys WHERE name = '" . $power . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $power_id = $row['id'];

        $sql = "SELECT id FROM cases WHERE name = '" . $case . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $case_id = $row['id'];

        $sql = "SELECT id FROM coolers WHERE name = '" . $cooler . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cooler_id = $row['id'];
        
        $sql = "INSERT INTO donepcs (users_id, cpus_id, graphicscard1_id, ram1_id, storage_id, power_id, case_id, cooler_id, price) VALUES ('$user_id', '$cpu_id', '$gpu_id', '$ram_id', '$storage_id', '$power_id', '$case_id', '$cooler_id')";
        $resultset = mysqli_query($this->conn, $sql);
    }
}
?>