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
    if (isset($_GET["codigo"])) {
    $codigo     =   $_GET["codigo"];
    $query      =   "SELECT nome,problema,setor,data_atual,ticketID,unidade FROM ticktes WHERE ticketID = $codigo";
    $dados      =   mysqli_query($conecta,$query ) or die("Erro no banco");
    $linha      =   mysqli_fetch_assoc($dados);
    $total      =   mysqli_num_rows($dados);
    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome       =   $_POST['nome'];
        $data_atual =   $_POST['date'];
        $setor      =   $_POST['setor'];
        $unidade    =   $_POST['unidade'];
        $problema   =   $_POST['problema']; 
        $ticketID   =   $_POST['ticketID'];
        $usuarioID  =   $_SESSION["user_portal"];
        $update     =   "UPDATE ticktes SET nome ='$nome', data_atual = '$data_atual', problema = '$problema', setor = '$setor', unidade = '$unidade' WHERE ticketID = $ticketID";
        if (mysqli_query($conecta, $update)) {
            echo "<script>alert('Ticket editado com sucesso');</script>";
            header("location:http://localhost/sistema_de_chamados/menu.php/");
        }else {
            echo "<script>alert('Erro ao editar o ticket');</script>";
        }    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ticket</title>
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
                <form action="editar.php" method="POST">
                    <label for="nome">
                        Digite seu nome
                    </label>
                    <input  required type="text" id="nome" name="nome" value="<?php echo utf8_encode($linha["nome"]);?>" >
                    <label for="date">
                        Digite a data de hoje
                    </label>
                    <input required type="date" name="date" id="date"  value="<?php echo utf8_encode($linha["data_atual"]);?>">
                    <label for="setor">
                        Digite seu setor
                    </label>
                    <input type="text" name="setor" value="<?php echo utf8_encode($_SESSION["user_setor"]); ?>" id="setor">
                    <label for="unidade">Digite a sua unidade</label>
                    <input required type="text" name="unidade" id="setor" value="<?php echo utf8_encode($linha["unidade"]);?>">
                    <label for="problema">
                        Digite qual o seu problema problema
                    </label>
                    <textarea name="problema" id="problema" cols="30" required rows="3"><?php echo utf8_encode($linha["problema"]);?></textarea>
                    <input type="hidden" name="ticketID" id="ticketID" value="<?php echo $codigo?>">
                    <input type="hidden" name="usuarioID" id="usuarioId" value="<?php echo $_SESSION["user_portal"] ?>">
                    <input type="submit" value="Editar Ticktes" id="editar_tickets" name="editar_tickets" ></input>
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