<!DOCTYPE html>
<head>
<head>
    <title>Menu</title>
    <meta charset="UTF-8">
</head>
</form>
<body bgcolor="#cccccc">


    
        <center><br>
            <h2><strong><u>Menu</u></strong></h2>
            <br><br><br>
    

</form>
</body>

    </form>
</body>
</html>
<?php
    session_start();
        if(isset($_SESSION["logado"]) == 1) 
        {   
            echo"<img src=\"img/cad.png\" width=\"100\">";    
            echo "<br><br><center><a href=\"controle_contatos.php\"><input type=\"button\" value=\"Formulario de cadastro\"></a></br><br>";

            echo"<img src=\"img/update.png\" width=\"100\">";
            echo "<br><br><a href=\"listagem.php\"><input type=\"button\" value=\"Alterar Cadastro\"</a><br><br>";

            echo"<img src=\"img/excluir.png\" width=\"100\"><br><br>";
            echo "<a href=\"excluir.php\"><input type=\"button\" value=\"Excluir cadastro\"</a>";
            
            echo "<br><br><a href=\"sair.php\"><input type=\"button\" value=\"Sair\"></a></center>";
        } 
        else
        {
            include("nao_logado.php");
        }
?>