<?php
    session_start();
    if(isset($_SESSION["logado"]) == 1){

        session_destroy();

        header("location:index.php");

    } else{

        $controle = "";

        include("nao_logado.php");

    }