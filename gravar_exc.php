<?php

    require ("conexao.php");

        var_dump($_POST);

    foreach ($_POST as $campos)
    {
        mysqli_query ($conexao, "delete from cadastro where id_cad=$campos");
    }
        header("location:menu.php");
?>