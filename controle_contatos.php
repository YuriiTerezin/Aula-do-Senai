<?php
    session_start();
    if(isset($_SESSION["logado"]) == 1){
?>
<!--CADASTRO DOS PACIENTES-->

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>

<body bgcolor="#cccccc"> 
<center>
<img src="img/logo.png" width="150"><br>
    <h2>Cadastro do Paciente</h2>
    

    <form name="cadastro" method="post" action="gravar_cadastro.php">
        <table border="1" bgcolor="#FFE4C4">
            <tr>
                <td><strong>Nome Completo:</strong></td>
                <td><input type="text" name="nome_paciente"></td>
                <td><strong>Data de Nacimento:</strong></td>
                <td><input type="date" name="data_nasc"></td>
            </tr>
            <tr>
                <td align="center"><strong>CPF:</strong></td>
                <td><input type="text" name="cpf" placeholder="000.000.000-00"></td>
                <td align="center"><strong>Estado Civil:</strong></td>
                <td><select name="estado_civil">
                    <option value="i">Selecione</option>
                    <option value="s">Solteiro(a)</option>
                    <option value="c">Casado(a)</option>
                    <option value="v">Viuvo(a)</option>
                    </select></td>
            </tr>
            <tr>
                <td align="center"><strong>Sexo:</strong></td>
                <td><input type="radio" name="sexo" value="m">&nbsp;Masc &nbsp;
                    <input type="radio" name="sexo" value="f">&nbsp;Fem</td>
            </tr>
            <tr>
                <td align="center"><strong>Pai:</strong></td>
                <td><input type="text" name="pai"></td>
                <td align="center"><strong>Mãe:</strong></td>
                <td><input type="text" name="mae"></td>
            </tr>
            <tr>
                <td align="center"><strong>E-mail:</strong></td>
                <td><input type="text" name="email" placeholder="nome@exemplo.com"></td>
            
                <td align="center"><strong>Celular:</strong></td>
                <td><input type="text" name="telefone_cel" placeholder="(ddd) 00000-0000"></td>
            </tr>
        </table>

<!--ENDEREÇO DOS PACIENTES-->
    
    <h2>Endereço</h2>

    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
           
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
           
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
    </head>

    <!-- Inicio do formulario -->
    <table border="1" bgcolor="#FFE4C4">
        <tr>
            <td><label><strong>Cep:</strong></td>
            <td><input name="cep" type="text" id="cep" value="" maxlength="9"
               onblur="pesquisacep(this.value);"></label><br></td>
        </tr>
        <tr>
            <td><label><strong>Rua:</strong></td>
            <td><input name="rua" type="text" id="rua"></label><br></td>
        <tr>
            <td><label><strong>Bairro:</strong></td>
            <td><input name="bairro" type="text" id="bairro"></label><br></td>
        </tr>
            <td><label><strong>Cidade:</strong></td>
            <td><input name="cidade" type="text" id="cidade"></label><br></td>
        </tr>
        <tr>
            <td><label><strong>Estado:</strong></td>
            <td><input name="estado" type="text" id="uf"></label><br></td>
        </tr>
</table>

<!--HISTORICO DOS PACIENTES-->

    <br><h2>Histórico familiar</h2>
        
    <table border="1" bgcolor="#FFE4C4">
        
        <td width="170">
    <label class="formata" form="historico"><strong> Histórico familiar</strong> <br>
        <input type="checkbox" name="historico" value="1">câncer <br>
        <input type="checkbox" name="historico" value="2">infarto/avc <br>
        <input type="checkbox" name="historico" value="3">tabagismo<br>
        <input type="checkbox" name="historico" value="4">diabetes<br>
        <input type="checkbox" name="historico" value="5">hipertensão<br>
        <input type="checkbox" name="historico" value="6">outros<br>
    </div></td>


    <td><label class="formata" for="historico"><strong> Ingere bebiba alcoolica?</strong><br>
            <input type="radio" name="bebida_alcoolica" value="sim">sim <br>
            <input type="radio" name="bebida_alcoolica" value="nao">não <br>
    <label class="formata" for="historico"><strong> Prática exercicios físicos?</strong><br>
            <input type="radio" name="exercicio_fisico" value="sim">sim <br>
            <input type="radio" name="exercicio_fisico" value="nao">não <br>
    
        <label><strong>Tipo Sanguineo</strong></label>
            <select id="estado" name="tipo_sanguineo">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option></td>
    
    <tr><label>
        <td colspan="2" align="center">Outros:</label>
            <input name="outros" type="text"></td>
    </tr>
</table>
<table>
    <tr>
        <td align="center"><a href="menu.php"><input type="button" value="Voltar"></a></td>
        <td align="center" colspan="2"><input type="submit" value="Salvar" name="salvar"></td>
    </tr>
</table>
    </form>
    </center>
    </body>
    

</html>

<?php
    
    } else{
        
        $controle = "";
        include("conexao.php");
        
    }
?>