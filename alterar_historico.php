<?php

    session_start();
    if(isset($_SESSION["logado"]) == 1){
    
        require("conexao.php");
    
        $id= $_SESSION['id'];
    
    $query= mysqli_query ($conexao, "SELECT id_his, historico, bebida_alcoolica, exercicio_fisico, tipo_sanguineo, outros FROM historico_familiar WHERE id_his='" .$_SESSION['id']."'");
        $result= mysqli_fetch_all ($query, MYSQLI_ASSOC);
?>
<body bgcolor="#cccccc">
    
<br><center>
<img src="img/logo.png" width="150"><br>
<h2>Histórico familiar</h2>
    <form name="alt_historico" method="post" action="gravar_alteracao.php">
    <input type="hidden" name="id_his" value="<?php echo $id; ?>">
    <input type="hidden" name="controle" value="alt_historico">
        <table border="1" bgcolor="#87CEFA">
        
        <td width="170">
    <label class="formata" form="historico"><strong> Histórico familiar</strong> <br>
        <input type="checkbox" name="historico" value="1" <?php if($result[0]["historico"]=="1"){ echo "checked"; } ?>>câncer<br>
        <input type="checkbox" name="historico" value="2" <?php if($result[0]["historico"]=="2"){ echo "checked"; } ?>>infarto/avc<br>
        <input type="checkbox" name="historico" value="3" <?php if($result[0]["historico"]=="3"){ echo "checked"; } ?>>tabagismo<br>
        <input type="checkbox" name="historico" value="4" <?php if($result[0]["historico"]=="4"){ echo "checked"; } ?>>diabetes<br>
        <input type="checkbox" name="historico" value="5" <?php if($result[0]["historico"]=="5"){ echo "checked"; } ?>>hipertensão<br>
        <input type="checkbox" name="historico" value="6" <?php if($result[0]["historico"]=="6"){ echo "checked"; } ?>>outros<br></td>       

    <td><label class="formata" for="historico"><strong> Ingere bebiba alcoolica?</strong><br>
            <input type="radio" name="bebida_alcoolica" value="sim" <?php if($result[0]["bebida_alcoolica"] == "sim"){ echo "checked"; } ?>>sim<br>
            <input type="radio" name="bebida_alcoolica" value="nao" <?php if($result[0]["bebida_alcoolica"] == "nao"){ echo "checked"; } ?>>não<br>
    <label class="formata" for="historico"><strong> Prática exercicios físicos?</strong><br>
            <input type="radio" name="exercicio_fisico" value="sim" <?php if($result[0]["exercicio_fisico"] == "sim"){ echo "checked"; } ?>>sim <br>
            <input type="radio" name="exercicio_fisico" value="nao" <?php if($result[0]["exercicio_fisico"] == "nao"){ echo "checked"; } ?>>não <br>
    
        <label><strong>Tipo Sanguineo</strong></label>
            <select id="estado" name="tipo_sanguineo">
                <option value="A+" <?php if($result[0]["tipo_sanguineo"]=="A+"){ echo "selected"; } ?>>A+</option>
                <option value="A-" <?php if($result[0]["tipo_sanguineo"]=="A-"){ echo "selected"; } ?>>A-</option>
                <option value="B+" <?php if($result[0]["tipo_sanguineo"]=="B+"){ echo "selected"; } ?>>B+</option>
                <option value="B-" <?php if($result[0]["tipo_sanguineo"]=="B-"){ echo "selected"; } ?>>B-</option>
                <option value="AB+" <?php if($result[0]["tipo_sanguineo"]=="AB+"){ echo "selected"; } ?>>AB+</option>
                <option value="AB-" <?php if($result[0]["tipo_sanguineo"]=="AB-"){ echo "selected"; } ?>>AB-</option>
                <option value="O+" <?php if($result[0]["tipo_sanguineo"]=="O+"){ echo "selected"; } ?>>O+</option>
                <option value="O-" <?php if($result[0]["tipo_sanguineo"]=="O-"){ echo "selected"; } ?>>O-</option></td>
    
    <tr><label>
        <td colspan="2" align="center">Outros:</label>
            <input name="outros" type="text"></td>
    </tr>
    <tr>
        <td align="center" colspan="3"><br><input type="submit" value="Salvar" name="salvar"></td>
    </tr>
</table>
    </form></center>

<?php
} else{

    $controle = "";

    include("nao_logado.php");        
}
   
?>