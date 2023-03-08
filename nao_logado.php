<?php

    if(isset($_SESSION["logado"]) == 1) 
    {
        echo"<center><h2>ATENCAO!! Voce nao esta logado no sistema</h2>";
        echo"<br><a href=\"index.php\">Voltar para pagina inicial<a></center>";
    }
?>