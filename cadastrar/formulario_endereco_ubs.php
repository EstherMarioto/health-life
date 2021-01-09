<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="form.css">
        <title>Cadastro do formulário</title>

    </head>
<body>
    <br/><br/>
    <div class="box" >
        <h2 class="text-center"> <i> Olá, faça seu cadastro!</i></h2>
        </br>
        <div class="row">
            <div class="col s2 m12 offset-m1 center" >
                <?php
                    include '../conexao/conexao.php';
                    $sth = $pdo->prepare('SELECT *FROM tbl_endereco ');
                    $sth->execute();
                ?>
        
                    <div class="container">
                        <h3 class="col-md-12">Formulário Endereço</h3>
                            <form name="form1" action="insert_endereco_ubs.php" method="post">
                                <div class="form-row">
                                    <label> <b class="text-white"> CEP </b>
                                        <input class="form-control" name="en_cep" type="text" id="cep" value="" size="10" maxlength="9"
                                        onblur="pesquisacep(this.value);" />
                                    </label>
                            
                                    <div class="form-group col-md-1"></div>

                                        <label> <b class="text-white"> Rua </b> 
                                            <input class="form-control" name="en_rua" type="text" id="rua" size="75" />
                                        </label>

                                        <div class="form-group col-md-1"></div>

                                        <label> <b class="text-white"> Numero </b> 
                                            <input class="form-control" name="en_numero" type="text" size="7" />
                                        </label>
                                    </div>
                                
                                <br><br>
                              
                                <div class="form-row">

                                    <label> <b class="text-white"> Bairro </b> 
                                        <select name="en_bairro" class="form-control" >
                                            <?php
                                                $sth = $pdo->prepare('select* from tbl_bairro ');
                                                $sth->execute();
                                                foreach ($sth as $res){
                                                    extract($res);
                                                    echo '<option value ="' . $ba_codigo . '">' . $ba_tipo . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </label>

                                    <div class="form-group col-md-0"></div>
                                    <div class="form-group col-md-1"></div>

                                    <label> <b class="text-white"> Cidade </b> 
                                        <input class="form-control" name="en_cidade" type="text" id="cidade" size="42" />
                                    </label>

                                    <div class="form-group col-md-2"></div>
                                    

                                    <label> <b class="text-white"> Estado </b> 
                                        <input class="form-control" name="en_uf" type="text" id="uf" size="2" />
                                    </label>

                                    </div> 
                                    <br><br>

                                <button type="button-submit" class="btn btn-outline-light"> <b> Próximo </b> </button>
                         
                            </form>
                    </div>
            </div>
        </div>
    </div>
</body>
                          
<script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
        
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>