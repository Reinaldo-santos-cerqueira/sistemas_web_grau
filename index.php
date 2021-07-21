<?php
    require_once("conexao/conexao.php");
?>
<?php
    session_start();
    if(isset($_POST['email'])){
        $email          =   $_POST['email'];
        $password       =   $_POST['password'];
        $check          =   "SELECT * "; 
        $check         .=   " FROM usuarios "; 
        $check         .=   " WHERE email = '{$email}' ";
        $check         .=   " AND senha = '{$password}' ";
        $access         =   mysqli_query($conecta,$check);
        if( !$access){
            die("Falha na conexão com o banco");
        }
        $informação     =   mysqli_fetch_assoc($access);
        if(empty($informação)){
            $mensagem   =   "Usuario ou senha incorretos";
            echo "<script>alert('Usuario ou senha incorretos');</script>";
        }else{
            $_SESSION["user_portal"]    =   $informação["usuarioID"];
            $_SESSION["user_name"]      =   $informação["nome"];
            $_SESSION["user_email"]     =   $informação["email"];
            $_SESSION["user_setor"]     =   $informação["setor"];
            $_SESSION["user_unidade"]   =   $informação["unidade"];
            if($informação["usuarioID"] == 1){
                header("location:http://localhost/sistema_de_chamados/exibir_adm.php/");
            }else{
                header("location:http://localhost/sistema_de_chamados/menu.php/");
            }
        }
    }
    require_once("conexao/close_banc.php");
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php
            require_once("css/style.css");
        ?>
        #div_principal{
            background-image: url("images/bg.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>
    <main>
        <div id="div_principal">
            <div id="div_form">
                <form action="index.php" method="POST">
                    <label for="email">
                        Digite seu E-mail
                    </label>
                    <input type="email" id="email" name="email">
                    <label for="password">
                        Digite sua senha
                    </label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Login" id="login" name="login"></input>
                    <div id="btns-a">
                        <a href="trocar_senha.php">Trocar a senha?</a>
                    </div>
                </form>
            </div>
            <div id="footer-1">
                <h3>Desenvolvido pela <a href="https://www.inbitdev.com/">InbitDev</a></h3>
            </div>
        </div>
    </main>
</body>
</html>
<?php
    require_once("conexao/close_banc.php");
?>