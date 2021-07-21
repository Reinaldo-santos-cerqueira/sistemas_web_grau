<?php
    require_once("conexao/conexao.php");
?>
<?php
    session_start();
    if( !isset($_SESSION["user_portal"])){
        header("location:http://localhost/sistema_de_chamados/index.php/");
    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome       =   $_POST['nome'];
        $data_atual =   $_POST['date'];
        $setor      =   $_POST['setor'];
        $unidade    =   $_POST['unidade'];
        $problema   =   $_POST['problema'];
        $usuarioID  =   $_SESSION["user_portal"];
        $insere     =   " INSERT INTO ticktes (nome,setor,unidade,problema,data_atual,usuarioID) VALUES ('$nome','$setor','$unidade','$problema','$data_atual',$usuarioID)";

        mysqli_query($conecta,$insere ) or die("Erro no banco");
        mysqli_close($conecta);
        echo "<script>alert('Ticket editado com sucesso');</script>";

        header("location:http://localhost/sistema_de_chamados/menu.php/");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Ticket</title>
    <style>
        <?php
            require_once("css/style.css");
        ?>
    </style>
</head>
<body>
    <main>
            <div id="div_principal_ticktes">
                <div id="div_form1">
                    <form action="criar_tickets.php" method="POST">
                        <label for="nome">
                            Digite seu nome
                        </label>
                        <input  required type="text" id="nome" name="nome" value="<?php echo utf8_encode($_SESSION["user_name"]);?>" >
                        <label for="date">
                            Digite a data de hoje
                        </label>
                        <input required type="date" name="date" id="date"  value="<?php echo date('Y-m-d'); ?>">
                        <label for="setor">
                            Digite seu setor
                        </label>
                        <input type="text" name="setor" value="<?php echo utf8_encode($_SESSION["user_setor"]); ?>" id="setor">
                        <label for="unidade">Digite a sua unidade</label>
                        <input required type="text" name="unidade" id="setor" value="<?php echo utf8_encode($_SESSION["user_unidade"]);?>">
                        <label for="problema">
                            Digite qual o seu problema problema
                        </label>
                        <textarea name="problema" id="problema" cols="30" required rows="3"></textarea>
                        <input type="hidden" name="usuarioID" id="usuarioId" value="<?php echo $_SESSION["user_portal"] ?>">
                        <input type="submit" value="Criar Ticktes" id="criar_ticktes" name="criar_ticktes" ></input>
                    </form>
                </div>
            </div>
            <div id="footer-1">
                <h3>Desenvolvido pela <a href="https://www.inbitdev.com/">InbitDev</a></h3>
            </div>
    </main>
</body>
</html>
<?php
    require_once("conexao/close_banc.php");
?>