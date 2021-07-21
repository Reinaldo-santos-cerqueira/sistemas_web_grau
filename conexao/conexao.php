<?php
    /*Conexao inicial com o banco de dados utilizando o xampp atravez do root no banco de dados do sistema_grau*/
    $server     =   "localhost";
    $user       =   "root";
    $password   =   "";
    $banco      =   "sistemas_grau";
    $conecta    =   mysqli_connect($server,$user,$password,$banco);
    
    /*Verificar erro*/
    if( mysqli_connect_errno()){
        die("Conexão com o banco de dados falhou ". mysqli_connect_errno());
    }
?>