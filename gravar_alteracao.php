<?php
    
    session_start();
     if(isset($_SESSION["logado"]) == 1){

    require("conexao.php");

    if($_POST['controle'] == "alt_cadastro"){
        //salvar alteracao de cadastro
        $id_cad= $_SESSION['id'];
        $nome= $_POST['nome_paciente'];
        $data= $_POST['data_nasc'];
        $cpf= $_POST['cpf'];
        $estado= $_POST['estado_civil'];
        $sexo= $_POST['sexo'];
        $pai= $_POST['pai'];
        $mae= $_POST['mae'];
        $email= $_POST['email'];
        $celular= $_POST['telefone_cel'];

        mysqli_query($conexao, "UPDATE cadastro SET 
            nome_paciente='$nome', 
            data_nasc='$data',
            cpf='$cpf', 
            estado_civil='$estado', 
            sexo='$sexo', 
            pai='$pai', 
            mae='$mae', 
            email='$email', 
            telefone_cel='$celular' WHERE id_cad='$id_cad'");

        header("location:alterar_endereco.php");

    } elseif($_POST['controle'] == "alt_endereco"){
        //salvar alteracao de endereco
        $id_end= $_SESSION['id'];
        $cep= $_POST['cep'];
        $rua= $_POST['rua'];
        $bairro= $_POST['bairro'];
        $estado= $_POST['estado'];
        $cidade= $_POST['cidade'];

        mysqli_query($conexao, "UPDATE endereco SET 
            cep='$cep', 
            rua='$rua', 
            bairro='$bairro', 
            estado='$estado', 
            cidade='$cidade' WHERE id_end='$id_end'");

        header("location:alterar_historico.php");
    
    } elseif($_POST['controle'] == "alt_historico"){
        //salvar alteracao de historico
        $id_his= $_SESSION['id']; 
        $historico= $_POST['historico']; 
        $bebida_alcoolica= $_POST['bebida_alcoolica']; 
        $exercicio_fisico= $_POST['exercicio_fisico']; 
        $tipo_sanguineo= $_POST['tipo_sanguineo']; 
        $outros= $_POST['outros'];

        mysqli_query($conexao, "UPDATE historico_familiar SET 
            historico='$historico', 
            bebida_alcoolica='$bebida_alcoolica', 
            exercicio_fisico='$exercicio_fisico', 
            tipo_sanguineo='$tipo_sanguineo', 
            outros='$outros' WHERE id_his='$id_his'");

        header("location:menu.php");
    }
    
} else{

    $controle = "";

    include("nao_logado.php");        
}
   
?>