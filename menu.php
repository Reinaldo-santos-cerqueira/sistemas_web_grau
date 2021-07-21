<?php
    session_start();
    if( !isset($_SESSION["user_portal"])){
        header("location:http://localhost/sistema_de_chamados/index.php/");
    }
?>
<?php
    if( isset($_POST['button_meus_tickets'])) {
        header("location:http://localhost/sistema_de_chamados/meus_tickets.php/");
    }
    if( isset($_POST['button_criar_tickets'])) {
        header("location:http://localhost/sistema_de_chamados/criar_tickets.php/");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        
        <?php
            require_once("css/style.css");
        ?>

    </style>    
</head>
<body>
    <main>
        <div id="div_principal">
            <div id="menu">
                <form action="" method="post">
                    <h1>Escolha umas das opções</h1>
                    <button id="button_meus_tickets" name="button_meus_tickets" >Meus Tickets</button>
                    <button id="button_criar_tickets" name="button_criar_tickets" >Criar Tickets</button>
                </form>
            </div>
        </div>
        <div id="footer-1">
            <h3>Desenvolvido pela <a href="https://www.inbitdev.com/">InbitDev</a></h3>
        </div>
    </main>
</body>
</html>
