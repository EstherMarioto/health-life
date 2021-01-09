<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <title>Cadastro de Paciente</title>
  </head>

  <body>
 
    <div class="box" >
    <br/><br/>   <br/><br/><br/><br/>
      <div class="container" >
        <h2 class="text-center"><i> Olá, faça seu cadastro!</i></h2>
        <div class="row">
          <div class="col s2 m12 offset-m1 center">
            <?php
              include '../conexao/conexao.php';
   
              $p_prontuario= $_GET['p_prontuario'];

              $sth = $pdo->prepare('SELECT *FROM tbl_paciente ');
              $sth->execute();
            ?>
            <form name="form" action="insert_paciente.php" method="post" enctype = "multipart/form-data">
            <input name="p_prontuario" type="hidden" value="<?= $p_prontuario; ?>">
            <input name="id" type="hidden" value="<?= $id; ?>" >      
            <input name="p_status" type="hidden" value="<?= $p_status = 1; ?>">                
              <div class="form-row">
              <br><br>
                        <h3 class="col-md-12">Formulário referente às outras informações</h3>
                <div class="form-group col-md-6">
                  <label><b class="text-white"> Nome </b></label>
                  <input type="text" class="form-control" name="p_nome" placeholder="Nome completo" />
                </div>
        
                <div class="form-group col-md-6">
                  <label><b class="text-white"> Email</b></label>
                  <input type="text" class="form-control" name="p_email" placeholder="Email"/>
                </div>           
              </div> 

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label><b class="text-white">Data de Nascimento</b></label>
                  <input type="date" class="form-control" name="p_dtnasc"/>
                </div>

                <div class="form-group col-md-2">
                  <label><b class="text-white">Telefone</b></label>  
                  <input name="p_telefone" placeholder="(12)9999999999" class="form-control input-  Zmd" required="" type="text" "/>
                </div>
                <div class="form-group col-md-8">
                  <label><b class="text-white">Ocupacão </b></label>  
                  <input name="p_ocupacao" placeholder="Profissão" class="form-control input-md" required="" type="text" "/>
                </div>               
              </div>
                             
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label><b class="text-white">Nome do Pai</b></label>
                  <input name="p_nome_pai" type="text" class="form-control" id="nome" placeholder="Nome completo">    
                </div>              
                <div class="form-group col-md-6">
                  <label><b class="text-white">Nome da Mãe</b></label>
                  <input name="p_nome_mae" type="text" class="form-control" id="nome" placeholder="Nome completo">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label><b class="text-white">Obs</b></label>
                  <select name="p_siglas" class="form-control">
                    <?php
                      $sth = $pdo ->prepare('select * from tbl_siglas');
                      $sth->execute(); 
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $sig_codigo .'">' . $sig_tipo . '</option>'; 
                      } 
                    ?>
                  </select>
                </div>    
                <div class="form-group col-md-3">
                  <label><b class="text-white">Tipo de paciente</b></label>
                  <select name="p_tipo" class="form-control">
                    <?php
                      $sth = $pdo ->prepare('select * from tbl_tipo_paciente');
                      $sth->execute(); 
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $tip_p_codigo .'">' . $tip_p_tipo . '</option>'; 
                      } 
                    ?>
                  <select>
                </div>
                <div class="form-group col-md-3">
                  <label><b class="text-white">Gênero</b></label>
                  <select name="p_genero" class="form-control">
                    <?php
                      $sth = $pdo ->prepare('select * from tbl_genero');
                      $sth->execute(); 
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $tipo_genero_codigo .'">' . $tipo_genero_tipo . '</option>'; 
                      }  
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label><b class="text-white">Outro Tipo de Gênero</b></label>
                  <input type="text" class="form-control" name="p_outro" placeholder="Outro Gênero" />
                </div>                   
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label><b class="text-white">Frequência Escolar</b></label>
                  <select name="p_freq_escolar" class="form-control">
                   <?php
                      $sth = $pdo ->prepare('select * from tbl_opcao');
                      $sth->execute(); 
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $op_codigo .'">' . $op_tipo . '</option>'; 
                      } 
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-1">
                  
                  <div class="custom-file">
                    <label><b class="text-white"> Foto </b></label>
                    <span class="text-white"><input type="file" name="pac_foto" id="imagem" onchange="previewImagem()"><br><br>
                  </div>
                  </div>        
                  <div class="form-group col-md-3"></div>
                  <div class="form-group col-md-2"> <span>&nbsp;&nbsp;&nbsp;</span>
                    <img style="width: 120px; height: 120px; "><br><br></span>
                  </div>
                <br><br>
                <h1>d<h1>
                                <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-2">
                
                      <button type="button-submit" class="btn btn-outline-light">Próximo</button>
                    </div>
                  </div>
                           
              
            </form>
          </div> <!-- card-panel -->
        </div> <!-- row -->
      </div> <!-- container -->
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script>
			function previewImagem(){
				var imagem = document.querySelector('input[name=pac_foto]').files[0];
				var preview = document.querySelector('img');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}
		</script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>