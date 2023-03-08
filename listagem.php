<html>
<meta charset="utf-8">
</head>

<body bgcolor="#cccccc"> 
<center>

<?php
    
    require("conexao.php");

    $query= mysqli_query ($conexao, "SELECT id_cad, nome_paciente FROM cadastro");
    
    $result= mysqli_fetch_all ($query, MYSQLI_ASSOC);

    foreach ($result as $resultado) 
    {
        $id= $resultado["id_cad"]; 
        printf("<a href=\"alterar_cadastro.php?id=$id\"> ".$resultado["nome_paciente"]."</a><br><br>");
    }

    echo "<a href=\"menu.php\"><input type=\"button\" value=\"Voltar para menu\"></a>"

?>