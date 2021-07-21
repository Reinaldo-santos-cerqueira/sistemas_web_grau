<?php
    require_once("conexao/conexao.php");
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email  =   $_POST["email"];
        $senha  =   $_POST["password"];
        $update     =   "UPDATE usuarios SET senha = '$senha' WHERE email = '$email'";
        if (mysqli_query($conecta, $update)) {
            echo "<script>alert('Senha trocada com sucesso');</script>";
            header("location:http://localhost/sistema_de_chamados/index.php");
        } else {
            echo "<script>alert('Erro ao trocar a senha');</script>";
        } 
    }
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
                <form action="trocar_senha.php" method="POST">
                    <label for="email">
                        Digite seu E-mail
                    </label>
                    <input type="email" id="email" name="email">
                    <label for="password">
                        Digite sua senha
                    </label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="Trocar senha" id="login" name="login">
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