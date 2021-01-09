<!doctype html>
<?php
include '../conexao/conexao.php';
include '../header.php';
$id = $_GET['id'];

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Helth&Life</title>
        <link rel="stylesheet" href="../css/login2.css">
        <link rel="stylesheet" href="../css/letraa.css">
    </head>
    <body>
     
        <div class="box">
            
            <h2>Login</h2>
            <form name="form1" action="validarubs.php" method="post">
                <input name="id" type="hidden" value="<?= $id; ?>" ><br/><br/>
                <div class="inputBox">
                    <input type="text"name="numail" id="email" type="email">
                    <label>Inscrição</label>
                </div>
                <div class="inputBox">
                    <input type="password"  name="senha" id="password" type="password">
                    <label>Senha</label>
                </div>
                <p><input type="checkbox" onclick="mostrarSenha()" >Mostrar Senha</input></p>
                <br/>

                 <input type="submit" name="entrar" value="Entrar">
            </form>
            <br/>    
        <a href="../cadastrar/formulario_endereco_ubs.php?id=<?= $id;?>"><button class="bt">Cadastrar</button></a>
             
        
            <script>
                function mostrarSenha() {
                    var tipo = document.getElementById("password");
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }else{
                        tipo.type = "password";
                    }
                }
            </script>
           </div>

    </body>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
    <?php
        include '../footer.php';
?>
</html>