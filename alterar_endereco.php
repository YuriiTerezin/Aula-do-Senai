<?php

    session_start();
    if(isset($_SESSION["logado"]) == 1){
    
        require("conexao.php");
    
    $id= $_SESSION['id'];
    
    $query= mysqli_query ($conexao, "SELECT id_end, cep, rua, bairro, estado, cidade FROM endereco WHERE id_end='" .$_SESSION['id']."'");
        $result= mysqli_fetch_all ($query, MYSQLI_ASSOC);

?>
<body bgcolor="#cccccc">

        <center>
        <img src="img/logo.png" width="150"><br> 
        <h2>ALTERAR ENDEREÇO</h2>
        
        <form name="alt_endereco" method="post" action="gravar_alteracao.php">
        
        <input type="hidden" name="controle" value="alt_endereco">
            <table border="1" bgcolor="#87CEFA">
    <tr>
        <td><strong>CEP:</strong></td>
        <td><input name="cep" type="text" value="<?php printf($result[0]["cep"]); ?>"></td>
    </tr>     
    <tr>
        <td><strong>Rua:</strong></td>
        <td><input name="rua" style="width: 26em" type="text" value="<?php printf($result[0]["rua"]); ?>"></td>
    </tr>
    <tr>
        <td><strong>Bairro:</strong></td>
        <td><input name="bairro" type="text" value="<?php printf($result[0]["bairro"]); ?>"></td></label>
    </tr>
    <tr>
        <td><label class="formata" for="estado"><strong>Estado:</strong></td>
        <td><select name="estado">
            <option value="AC" <?php if($result[0]["estado"]=="AC"){ echo "selected"; } ?>>Acre</option>
            <option value="AL" <?php if($result[0]["estado"]=="AL"){ echo "selected"; } ?>>Alagoas</option>
            <option value="AP" <?php if($result[0]["estado"]=="AP"){ echo "selected"; } ?>>Amapa</option>
            <option value="AM" <?php if($result[0]["estado"]=="AM"){ echo "selected"; } ?>>Amazonas</option>
            <option value="BA" <?php if($result[0]["estado"]=="BA"){ echo "selected"; } ?>>Bahia</option>
            <option value="CE" <?php if($result[0]["estado"]=="CE"){ echo "selected"; } ?>>Ceara</option>
            <option value="DF" <?php if($result[0]["estado"]=="DF"){ echo "selected"; } ?>>Distrito Fereal</option>
            <option value="ES" <?php if($result[0]["estado"]=="ES"){ echo "selected"; } ?>>Espirito Santo</option>
            <option value="GO" <?php if($result[0]["estado"]=="GO"){ echo "selected"; } ?>>Goias</option>
            <option value="MA" <?php if($result[0]["estado"]=="MA"){ echo "selected"; } ?>>Maranhao</option>
            <option value="MT" <?php if($result[0]["estado"]=="MT"){ echo "selected"; } ?>>Mato Grosso</option>
            <option value="MS" <?php if($result[0]["estado"]=="MS"){ echo "selected"; } ?>>Mato Grosso do Sul</option>
            <option value="MG" <?php if($result[0]["estado"]=="MG"){ echo "selected"; } ?>>Minas Gerais</option>
            <option value="PA" <?php if($result[0]["estado"]=="PA"){ echo "selected"; } ?>>Para</option>
            <option value="PB" <?php if($result[0]["estado"]=="PB"){ echo "selected"; } ?>>Paraiba</option>
            <option value="PR" <?php if($result[0]["estado"]=="PR"){ echo "selected"; } ?>>Parana</option>
            <option value="PE" <?php if($result[0]["estado"]=="PE"){ echo "selected"; } ?>>Pernambuco</option>
            <option value="PI" <?php if($result[0]["estado"]=="PI"){ echo "selected"; } ?>>Piaui</option>
            <option value="RJ" <?php if($result[0]["estado"]=="RJ"){ echo "selected"; } ?>>Rio de Janeiro</option>
            <option value="RN" <?php if($result[0]["estado"]=="RN"){ echo "selected"; } ?>>Rio Grande do Norte</option>
            <option value="RS" <?php if($result[0]["estado"]=="RS"){ echo "selected"; } ?>>Rio Grande do Sul</option>
            <option value="RO" <?php if($result[0]["estado"]=="RO"){ echo "selected"; } ?>>Rondônia</option>
            <option value="RR" <?php if($result[0]["estado"]=="RR"){ echo "selected"; } ?>>Roraima</option>
            <option value="SC" <?php if($result[0]["estado"]=="SC"){ echo "selected"; } ?>>Santa Catarina</option>
            <option value="SP" <?php if($result[0]["estado"]=="SP"){ echo "selected"; } ?>>Sao Paulo</option>
            <option value="SE" <?php if($result[0]["estado"]=="SE"){ echo "selected"; } ?>>Sergipe</option>
            <option value="TO" <?php if($result[0]["estado"]=="TO"){ echo "selected"; } ?>>Tocantins</option></label></select></td>
    </tr>
    <tr>
        <label><td><strong>Cidade:</strong></td></label>
        <td><input name="cidade" type="text" value="<?php printf($result[0]["cidade"]); ?>"></td>
    </tr>
    <tr>
            <td align="center" colspan="3"><br><input type="submit" value="Salvar" name="salvar"></td>
    </tr>
</table>
    </form>

<?php
    
} else{

    $controle = "";

    include("nao_logado.php");        
}
?>