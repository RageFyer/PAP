<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:wamp64\composer\vendor\autoload.php';


class DBDataprovider {
    private $conn;
    private $verification = 0;

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

    function getName(){
        $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT username FROM users WHERE username = '$username'";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $username = $row['username'];
            echo $username;
        } else {
            echo "0 results";
        }
    }

    function getEmail(){
        $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT email FROM users WHERE username = '$username'";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $email = $row['email'];
            echo $email;
        } else {
            echo "0 results";
        }
    }

    function nameExists($username){
        $this->connect();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $resultset = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($resultset) > 0){
            return true;
        }else{
            return false;
        }
    }

    function getComputers() {
        $this->connect();
        $username = $_SESSION['username'];
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $id = $row['id'];
            $sql = "SELECT * FROM donepcs WHERE users_id = '$id'";
            $resultset = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($resultset) > 0) {
                while($row = $resultset->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $this->getCpu($row["cpus_id"]) . "</td>
                    <td>" . $this->getCooler($row["coolers_id"]) . "</td>
                    <td>" . $this->getMotherboard($row["motherboards1_id"]) . "</td>
                    <td>" . $this->getRam($row["rams1_id"]) . "</td>
                    <td>" . $this->getGraphicsCard($row["graphicscards1_id"]) . "</td>
                    <td>" . $this->getStorage($row["storages1_id"]) . "</td>
                    <td>" . $this->getPowerSupply($row["powersupplys1_id"]) . "</td>
                    <td>" . $this->getCase($row["cases1_id"]) . "</td>
                    </tr>";
                }
            } else {
                echo "0 results";
            }
        } else {
            echo "0 results";
        }
    }

    function getCpu($id) {
        $this->connect();
        $sql = "SELECT name FROM cpus WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getCooler($id) {
        $this->connect();
        $sql = "SELECT name FROM coolers WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getMotherboard($id) {
        $this->connect();
        $sql = "SELECT name FROM motherboards WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getRam($id) {
        $this->connect();
        $sql = "SELECT name FROM rams WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getGraphicsCard($id) {
        $this->connect();
        $sql = "SELECT name FROM graphicscards WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getStorage($id) {
        $this->connect();
        $sql = "SELECT name FROM storages WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getPowerSupply($id) {
        $this->connect();
        $sql = "SELECT name FROM powersupplys WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function getCase($id) {
        $this->connect();
        $sql = "SELECT name FROM cases WHERE id = '$id'";
        $resultset = mysqli_query($this->conn, $sql);
        if ($resultset->num_rows > 0) {
            $row = $resultset->fetch_assoc();
            $name = $row['name'];
            return $name;
        } else {
            return "0 results";
        }
    }

    function changeUser($username, $old_email, $new_email){
        $this->connect();

        if($username != $_SESSION['username'] && $new_email != ""){
            if ($this->nameExists($username) && $this->emailExists($new_email)) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Username e Email já existe!';
                </scrip>";
            } else if ($this->nameExists($username)) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Username já existe!';
                </script>";
            }else if ($this->emailExists($new_email)) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Email já existe!';
                </script>";
            }  else {
                $sql = "UPDATE users SET username = '$username', email = '$new_email' WHERE email = '$old_email'";
                $resultset = mysqli_query($this->conn, $sql);
                if ($resultset) {
                    echo "<script>
                    document.getElementById('msg').innerHTML = 'Username e email alterados com sucesso!';
                    </script>";
                    $_SESSION['username'] = $username;
                } else {
                    echo "<script>
                    document.getElementById('error_msg').innerHTML = 'Erro ao alterar o username e email!';
                    </script>";
                }
            }
        } else if ($username == $_SESSION['username'] && $new_email != "") {
            if ($this->emailExists($new_email)) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Email já existe!';
                </script>";
            } else {
                $sql = "UPDATE users SET email = '$new_email' WHERE username = '$username'";
                $resultset = mysqli_query($this->conn, $sql);
                if ($resultset) {
                    echo "<script>
                    document.getElementById('msg').innerHTML = 'Email alterado com sucesso!';
                    </script>";
                } else {
                    echo "<script>
                    document.getElementById('error_msg').innerHTML = 'Erro ao alterar o email!';
                    </script>";
                }
            }
        } else if ($username != $_SESSION['username'] && $new_email == "") {
            if ($this->nameExists($username)) {
                echo "<script>
                document.getElementById('error_msg').innerHTML = 'Username já existe!';
                </script>";
            } else {
                $sql = "UPDATE users SET username = '$username' WHERE email = '$old_email'";
                $resultset = mysqli_query($this->conn, $sql);
                if ($resultset) {
                    echo "<script>
                    document.getElementById('msg').innerHTML = 'Username alterado com sucesso!';
                    </script>";
                    $_SESSION['username'] = $username;
                } else {
                    echo "<script>
                    document.getElementById('error_msg').innerHTML = 'Erro ao alterar o username!';
                    </script>";
                }
            }
        } else {
            echo "<script>
            document.getElementById('error_msg').innerHTML = 'Erro ao alterar o username e email!';
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
        $sql = "SELECT name, img, graphicsdime, price FROM cases";
        $resultset = mysqli_query($this->conn, $sql);

        if ($resultset->num_rows > 0) {
            echo '<div id="infos">';
            echo '<span id="modelo">Modelo</span>';
            echo '<span id="dimension">Dimensão para placa grafica</span>';
            echo '<span id="preco">Preço</span>';
            echo '</div>';
            while($row = $resultset->fetch_assoc()) {
                echo '<div class="container">';
                echo '<img class="img" src="' . $row['img'] . '" alt="">';
                echo '<p class="name">' . $row['name'] . '</p>';
                echo '<p class="graphicsdime">' . $row['graphicsdime'] . '</p>';
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

    function sendPc($cpu, $cooler, $motherboard, $ram, $graphics, $storage, $powersupply, $case){
        $this->connect();
        $sql = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $user_id = $row['id'];

        $sql = "SELECT id FROM cpus WHERE name = '" . $cpu . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cpu_id = $row['id'];

        $sql = "SELECT id FROM graphicscards WHERE name = '" . $graphics . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $gpu_id = $row['id'];
        
        $sql = "SELECT id FROM rams WHERE name = '" . $ram . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $ram_id = $row['id'];

        $sql = "SELECT id FROM storages WHERE name = '" . $storage . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $storage_id = $row['id'];

        $sql = "SELECT id FROM powersupplys WHERE name = '" . $powersupply . "'";
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

        $sql = "SELECT id FROM motherboards WHERE name = '" . $motherboard . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $motherboard_id = $row['id'];

        $sql = "INSERT INTO donepcs (users_id, cpus_id, coolers_id, motherboards1_id, rams1_id, graphicscards1_id, storages1_id, powersupplys1_id, cases1_id) VALUES ('$user_id', '$cpu_id', '$cooler_id', '$motherboard_id', '$ram_id', '$gpu_id', '$storage_id', '$power_id', '$case_id')";
        $resultset = mysqli_query($this->conn, $sql);


        if ($resultset) {
            echo "<script>document.getElementById('byo_category4').innerHTML='Computador Guardado';";

            echo "<script>document.getElementById('save').innerHTML='<i class=\"fa-solid fa-check\"></i>';
                document.getElementById('save').style.backgroundColor='green';
                document.getElementById('save').style.border='none';</script>";
        } else {
            echo "<script>document.getElementById('byo_category4').innerHTML='Não foi possivel guardar o seu computador';";
            
            echo "<script>document.getElementById('save').innerHTML='<i class=\"fa-solid fa-xmark\"></i>';
                document.getElementById('save').style.backgroundColor='red';
                document.getElementById('save').style.border='none';</script>";
        }
    }

    function verifyPc($cpu, $cooler, $motherboard, $ram, $graphics, $storage, $powersupply, $case){
        $verification = 0;
        $this->connect();
        
        $sql = "SELECT socket FROM cpus" . " WHERE name = '" . $cpu . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cpu_socket = $row['socket'];

       $sql = "SELECT coolers.*, GROUP_CONCAT(sockets.socket SEPARATOR ', ') as sockets
        FROM coolers
        INNER JOIN coolers_sockets ON coolers.id = coolers_sockets.cooler_id
        INNER JOIN sockets ON coolers_sockets.socket_id = sockets.id
        GROUP BY coolers.id;";
        $resultset = mysqli_query($this->conn, $sql);

        while ($row = $resultset->fetch_assoc()) {
            $cooler_sockets = explode(', ', $row['sockets']);
            for ($i = 0; $i < count($cooler_sockets); $i++) {
                if ($cooler_sockets[$i] == $cpu_socket) {
                    $verification += 1;
                }
            }
        }

        if ($verification == 0) {
            echo "<script>document.getElementById('byo_category3').textContent += 'O cooler não é compatível com o processador selecionado / ';</script>";
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql = "SELECT socket FROM motherboards" . " WHERE name = '" . $motherboard . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $motherboard_socket = $row['socket'];

        if($cpu_socket != $motherboard_socket){
            echo "<script>document.getElementById('byo_category3').textContent += 'A placa mãe não é compatível com o processador selecionado / ';</script>";
        }else{
            $verification += 1;
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql = "SELECT typeRam FROM motherboards" . " WHERE name = '" . $motherboard . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $motherboard_ram = $row['typeRam'];

        $sql = "SELECT typeRam FROM rams" . " WHERE name = '" . $ram . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $ram_ram = $row['typeRam'];

        if($motherboard_ram != $ram_ram){
            echo "<script>document.getElementById('byo_category3').textContent += 'A memória não é compatível com a placa mãe selecionada / ';</script>";
        }else{
            $verification += 1;
        }

        $sql = "SELECT dimensions FROM graphicscards" . " WHERE name = '" . $graphics . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $graphics_dimensions = $row['dimensions'];

        $sql = "SELECT graphicsdime FROM cases" . " WHERE name = '" . $case . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $case_graphicsdime = $row['graphicsdime'];

        if($graphics_dimensions > $case_graphicsdime){
            echo "<script>document.getElementById('byo_category3').textContent += 'A placa gráfica não é compatível com a caixa selecionada / ';</script>";
        }else{
            $verification += 1;
        }

        if ($verification == 4) {
            echo "<script>document.getElementById('byo_category4').textContent += 'Tudo é compativel';</script>";
        }
    }

    function getPrice($cpu, $cooler, $motherboard, $ram, $graphics, $storage, $powersupply, $case){
        $this->connect();
        $sql = "SELECT price FROM cpus" . " WHERE name = '" . $cpu . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cpu_price = $row['price'];

        $sql = "SELECT price FROM coolers" . " WHERE name = '" . $cooler . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $cooler_price = $row['price'];

        $sql = "SELECT price FROM motherboards" . " WHERE name = '" . $motherboard . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $motherboard_price = $row['price'];

        $sql = "SELECT price FROM rams" . " WHERE name = '" . $ram . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $ram_price = $row['price'];

        $sql = "SELECT price FROM graphicscards" . " WHERE name = '" . $graphics . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $graphics_price = $row['price'];

        $sql = "SELECT price FROM storages" . " WHERE name = '" . $storage . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $storage_price = $row['price'];

        $sql = "SELECT price FROM powersupplys" . " WHERE name = '" . $powersupply . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $powersupply_price = $row['price'];

        $sql = "SELECT price FROM cases" . " WHERE name = '" . $case . "'";
        $resultset = mysqli_query($this->conn, $sql);
        $row = $resultset->fetch_assoc();
        $case_price = $row['price'];
        
        $total_price = $cpu_price + $cooler_price + $motherboard_price + $ram_price + $graphics_price + $storage_price + $powersupply_price + $case_price;
        echo $total_price;
    }

    function sendEmail($email){
        $this->connect();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $resultset = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($resultset) > 0){
            $emailencripted = base64_encode($email);
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 

            $mail->Host = 'smtp.sapo.pt';
            $mail->Port = 587;
            $mail->Username = 'Build Your Own';
            $mail->Password = 'Buildyourown.123';

            $mail->SetFrom('buildyourown.inc@sapo.pt', 'Build Your Own991531');
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->Subject = 'Build Your Own - Recuperação de Password';

            $mail->IsHTML(true);
            $mail->Body = "Olá,<br><br> Para recuperar a sua password, clique no link abaixo:<br><br><a href='http://localhost/PAP/resetpass_page.php?key=".$emailencripted."'>RECUPERAR PALAVRAPASS</a><br><br>Obrigado,<br><br>Build Your Own";

            $mail->AddAddress($email);

            if(!$mail->Send()){
                echo 'Erro do email: ' .$mail->ErrorInfo;
            }else{
                echo '<script>document.getElementById("success").style.display = "block"</script>';
                $_SESSION['email'] = $email;
                $this->disconnect();
                session_destroy();
            }
        }else{
            echo '<script>document.getElementById("message").textContent="Este email não está registado"; document.getElementById("alert").style.display = "block"</script>';
            $this->disconnect();
            session_destroy();
        }
    }

    function resetPassword($password){
        $this->connect();
        if($_GET['key']){
            $emailunencripted = base64_decode($_GET['key']);
            $sql = "UPDATE users SET password = '$password' WHERE email = '$emailunencripted'";
            $resultset = mysqli_query($this->conn, $sql);
            if($resultset){
                echo '<script>document.getElementById("success").style.display = "block"</script>';
                $this->disconnect();
                session_destroy();
            }else{
                echo '<script>document.getElementById("message").textContent="Erro ao alterar password"; document.getElementById("alert").style.display = "block"</script>';
                $this->disconnect();
                session_destroy();
            }
        }
    }
}
?>
