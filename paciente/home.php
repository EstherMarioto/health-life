<?php
  include '../conexao/conexao.php';
  include 'header.php';
?>

<!doctype html>
<html lang="en">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  
    </ol>
      
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php
          $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc ');
          $sth->bindValue(':mu_tipo', 1);
          $sth->execute();
          $resultado = $sth->fetch(PDO::FETCH_ASSOC);
          extract($resultado);

          echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' class='d-block w-100 ' />";
                                    
        ?>
      </div>
      <?php
        $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc limit 1,2 ');
        $sth->bindValue(':mu_tipo', 1);
        $sth->execute();
        foreach ($sth as $res) :
          extract($res);                                
      ?>
      <div class="carousel-item">
        <?php
          echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' class='d-block w-100' />";
        ?>
      </div>
      <?php
        endforeach;
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span> 
    </a>
  </div>
  <br/><br/>
  <div class="container">
    <div class="row">
      <?php
        $sth = $pdo->prepare('select * from tbl_mural where mu_tipo = :mu_tipo order by mu_codigo desc limit 6 ');
        $sth->bindValue(':mu_tipo', 2);
        $sth->execute();
        foreach ($sth as $res) :
        extract($res);
      ?>
      <div class="col-lg-4">
        <div class="containerr">
          <div class="card">
            <div class="face face1">
              <div class="content">
                <?php
                  echo "<img src='../secretario/publicacoes/img/" . $mu_img. "' alt='Fotos' width='200' height='200' />";
                ?>  
                <h3><?php echo $mu_titulo ?></h3>
              </div>
            </div>
            <div class="face face2">
              <div class="content">
                <p><?php echo substr($mu_assunto, 0, 38); ?>...</p>
                <br>
                <p><?php 
                $ano = substr($mu_data,0,4);
                $mes=substr($mu_data,4,4);
                $dia=substr($mu_data,8,2);
                
                  echo $dia; echo $mes; echo $ano;?> 
                    <p>
                </p>
                <center> <a href ="vermais.php"> Ver mais </a> </center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        endforeach;
      ?>
    </div>
    </div>
    <br>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <!-- mibew button --><a id="mibew-agent-button" href="/health&amp;Life/mibew/chat?locale=pt-br" target="_blank" onclick="Mibew.Objects.ChatPopups['5f8e312984246f1'].open();return false;"><img src="/health&amp;Life/mibew/b?i=mibew&amp;lang=pt-br" border="0" alt="" /></a><script type="text/javascript" src="/health&Life/mibew/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"5f8e312984246f1","url":"\/health&Life\/mibew\/chat?locale=pt-br","preferIFrame":true,"modSecurity":false,"width":640,"height":480,"resizable":true,"styleLoader":"\/health&Life\/mibew\/chat\/style\/popup"});</script><!-- / mibew button -->
    
    <br><br> 
    <?php
      include '../footer.php';
    ?> 
   
  </body>
</html>