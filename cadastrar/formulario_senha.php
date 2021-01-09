<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Última versão CSS compilada e minificada -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
        <link rel="stylesheet" href="../css/LoginStyle.css">
        <link rel="stylesheet" href="../css/letra.css">
        <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
        <title>Cadastro do formulário</title>

    </head>
    <?php
    $p_codigo =$_GET['p_codigo'];
    
    ?>
    <body>
        <div class="box">
            <h2>Crie sua senha !</h2>
            <form name="form1" action="insert_senha.php" method="post" >  
            <input name="lo_tipo" type="hidden" value="<?= 4; ?>">
            <input name="p_codigo" type="hidden" value="<?= $p_codigo; ?>">
            <br>
            <div class="inputBox">
      
            <br><br>
                  <select name="lo_unidade" class="form-control">
                    <?php
                        include '../conexao/conexao.php';
                      $sth = $pdo ->prepare('select * from tbl_unidade where un_dtl_unidade = :tipo');
                      $sth->bindValue(':tipo', 2);
                      $sth->execute(); 
                      
                      foreach ($sth as $res){ 
                        extract($res);
                        echo'<option value="'. $un_codigo .'">' . $un_tipo . '</option>'; 
                      }  
                    ?>
                  </select>
                </div>
<br>
                <div class="inputBox">
                    <input type="password" name="lo_senha" id="password" type="password" >
                    <label>Senha</label>
                </div>
                
                <div class="inputBox">
                    <input type="password" name="password" id="password" type="password" >
                    <label>Confirma Senha</label>
                </div>
                <div class="form-group col-md-4">
                <div class="g-recaptcha" data-sitekey="6LcxsdkZAAAAAIAxhunRo4ce1CIJP6OP7SCrldki"></div>
                                    <br>
               <input type="submit" name="entrar" value="Enviar">
                </div>
            </form>
            <br/>
</div>

    </body>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>