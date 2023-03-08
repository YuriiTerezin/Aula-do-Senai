<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
    <body bgcolor="#cccccc"> 
        <center>
    </doby>
</html>

<?php
    
    require("conexao.php");

    $query= mysqli_query
        ($conexao, "select * from cadastro");

    $result= mysqli_fetch_all
        ($query, MYSQLI_ASSOC);

    echo "<form method=\"post\" action=\"gravar_exc.php\">";

    foreach ($result as $resultado)
    {
        $id= $resultado["id_cad"];
        echo "<input type=\"checkbox\" name=\"excluir$id\" value=\"$id\">".$resultado["nome_paciente"]."<br>";
    }

    echo "<input type=\"submit\" value=\"excluir\">";
?>
