<?php
    
    session_start();
     if(isset($_SESSION["logado"]) == 1){

    require("conexao.php");
    
    $nome= $_POST['nome_paciente'];
    $data= $_POST['data_nasc'];
    $cpf= $_POST['cpf'];
    $estado= $_POST['estado_civil'];
    $sexo= $_POST['sexo'];
    $pai= $_POST['pai'];
    $mae= $_POST['mae'];
    $email= $_POST['email'];
    $celular= $_POST['telefone_cel'];
    
    $gravar_cadastro= mysqli_query($conexao, "INSERT INTO  cadastro (nome_paciente, data_nasc, cpf, estado_civil, sexo ,pai, mae, email, telefone_cel)
         VALUES ('$nome', '$data', '$cpf', '$estado', '$sexo', '$pai', '$mae', '$email', '$celular')");

    //gravar endereco
    $cep= $_POST['cep'];
    $rua= $_POST['rua'];
    $bairro= $_POST['bairro'];
    $estado= $_POST['estado'];
    $cidade= $_POST['cidade'];

    $gravar_endereco= mysqli_query($conexao, "INSERT INTO endereco (cep, rua, bairro, estado, cidade) 
        VALUES ('$cep', '$rua', '$bairro', '$estado', '$cidade')");

    //gravar historico
    $historico= $_POST['historico'];
    $bebida_alcoolica= $_POST['bebida_alcoolica'];
    $exercicio_fisico= $_POST['exercicio_fisico'];
    $tipo_sanguineo= $_POST['tipo_sanguineo'];
    $outros= $_POST['outros'];

    $gravar_historico= mysqli_query($conexao, "INSERT INTO historico_familiar (historico, bebida_alcoolica, exercicio_fisico, tipo_sanguineo, outros)
        VALUES ('$historico', '$bebida_alcoolica', '$exercicico_fisico', '$tipo_sanguineo', '$outros')");

} else{

    $controle = "";

    include("nao_logado.php");        
}
    header("location:menu.php");
?>