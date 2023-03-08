<?php
     
     session_start();
     if(isset($_SESSION["logado"]) == 1){

    require("conexao.php");
    
    $_SESSION['id']= $_GET['id'];
    
    $query= mysqli_query ($conexao, "SELECT id_cad, nome_paciente, data_nasc, cpf, estado_civil, sexo, pai, mae, email, telefone_cel FROM cadastro WHERE id_cad='" .$_SESSION['id']."'");
        $result= mysqli_fetch_all ($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<body bgcolor="#cccccc">
     
<center>
<img src="img/logo.png" width="150"><br>
    <h2 align="center">ALTERAR CADASTRO DE PACIENTE</h2>
    <form name="alt_cadastro" method="post" action="gravar_alteracao.php">
        
        <input type="hidden" name="controle" value="alt_cadastro">
    <table align="center" border="1" bgcolor="#87CEFA ">

       <tr>
            <td>Nome Completo:</td>
            <td><input type="text" name="nome_paciente" value="<?php printf($result[0]["nome_paciente"]);?>"></td>
            <td>Data de Nacimento:</td>
            <td><input type="date" name="data_nasc" value="<?php printf($result[0]["data_nasc"]);?>"></td>
        </tr>
        <tr>
            <td align="center">CPF:</td>
            <td><input type="text" name="cpf" value="<?php printf($result[0]["cpf"]);?>" placeholder="000.000.000-00"></td>
            <td align="center">Estado Civil:</td>
            <td><select name="estado_civil">
                <option value="i" <?php if($result[0]["estado_civil"]=="i"){ echo "selected"; } ?>>Selecione</option>
                <option value="s" <?php if($result[0]["estado_civil"]=="s"){ echo "selected"; } ?>>Solteiro(a)</option>
                <option value="c" <?php if($result[0]["estado_civil"]=="c"){ echo "selected"; } ?>>Casado(a)</option>
                <option value="v" <?php if($result[0]["estado_civil"]=="v"){ echo "selected"; } ?>>Viuvo(a)</option></select></td>
        </tr>
        <tr>
            <td align="center">Sexo:</td>
            <td><input type="radio" name="sexo" value="m" <?php if($result[0]["sexo"]=="m"){ echo "checked"; } ?>>&nbsp;Masc &nbsp;
                <input type="radio" name="sexo" value="f" <?php if($result[0]["sexo"]=="f"){ echo "checked"; } ?>>&nbsp;Fem</td>
        </tr>
        <tr>
            <td align="center">Pai:</td>
            <td><input type="text" name="pai" value="<?php printf($result[0]["pai"]);?>"></td>
            <td align="center">Mae:</td>
            <td><input type="text" name="mae" value="<?php printf($result[0]["mae"]);?>"></td>
        </tr>
        <tr>
            <td align="center">Email:</td>
            <td><input type="text" name="email" value="<?php printf($result[0]["email"]);?>" placeholder="nome@exemplo.com"></td>
            <td align="center">Celular:</td>
            <td><input type="text" name="telefone_cel" value="<?php printf($result[0]["telefone_cel"]);?>" placeholder="(00) 00000-0000"></td>
        </tr>
    </table>
<table>
        <tr>
            <td align="center" colspapan="2"><br><a href="menu.php"><input type="button" value="Voltar"></a></td>
            <td align="center" colspan="3"><br><input type="submit" value="Salvar" name="salvar"></td>
        </tr>
</table>
    </form>
</center>

</body>
</html>

<?php
    
} else{

    $controle = "";

    include("nao_logado.php");        
}
?>