<!DOCTYPE html>
<?php 
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Health&Life</title>
  </head>
  <body>
    <?php 
      include 'header.php';
      include '../../conexao/conexao.php';
    ?>
    </br></br></br></br>

    <div class="col-lg-12 ">
      <section class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>Consultas Pendentes</b></a>
          </li>                  
        </ul>
      </section>
      </br>
           
      <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">  
          <div class="container">
            <div class="row">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="col"><center>Número da Consulta</center></th>
                    <th scope="col"><center>Paciente </center></th>
                    <th scope="col"><center>Data e Horário</center></th>
                    <th scope="col"><center>Médico</center> </th>
                    <th scope="col"> </th>
                  </tr>
                </tbody>

                <?php
                 $sth = $pdo->prepare('select *from tbl_paciente_ubs where p_loginn = :p_login');
                 $sth->bindValue(':p_login',  $_SESSION["health"]["id"]);
                 $sth->execute();
                 $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                 extract($resultado);

                  $sth = $pdo->prepare('
                    select *from tbl_consulta c 
                    INNER JOIN tbl_login l on  l.lo_codigo = c.con_medico
                    INNER JOIN tbl_paciente_ubs p on  p.p_codigo = c.conn_paciente
                  WHERE c.con_status = :sta and c.conn_paciente = :paciente');       
                  $sth->bindValue(':sta', 1);
                  $sth->bindValue(':paciente',$p_codigo);
                  $sth->execute();
                  foreach ($sth as $res) :
                  extract($res);
                ?>

                <tbody>
                  <tr>
                    <th scope="row">
                      <center>
                        <h5><?= substr($con_codigo, 0, 10); ?></h5>
                      </center>
                    </th>
                    <td><h5><center><?= substr($p_nome, 0, 38); ?></center></h5></td>
                    <td><h5><center><?= substr($con_data, 0, 38); ?></center></h5></td>
                    <?php
                      $sth = $pdo->prepare('select *from tbl_medico where me_login = :me_login');
                      $sth->bindValue(':me_login', $con_medico);
                      $sth->execute();
                      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                      extract($resultado);
                    ?>
                    <td><h5><center><?= substr($me_nome, 0, 38); ?></center></h5></td>
                    <td>
                      <div class="row">
                        <div class="col-lg-7">
                          <center>
                            <form name="form1" method="post" action="update_consultas.php">
                              <input name="con_status" type="hidden" value=2><br />
                        
                              <a href="update_consultas.php?con_status=2&&con_codigo=<?= $con_codigo; ?> " class="btn btn-primary"><span class=" text-white">Confirmar</span> </a>
                     
                            </form>
                          </center>
                        </div> 
                        <!-- Modal --> 
                        <div class="col-lg-1">
                          <br/>
                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="25" height="25"viewBox="0 0 172 172"style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                              <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#e74c3c">
                                  <path d="M74.53333,17.2c-1.53406,-0.02082 -3.01249,0.574 -4.10468,1.65146c-1.09219,1.07746 -1.70703,2.54767 -1.70704,4.08187h-34.32161c-2.06765,-0.02924 -3.99087,1.05709 -5.03322,2.843c-1.04236,1.78592 -1.04236,3.99474 0,5.78066c1.04236,1.78592 2.96558,2.87225 5.03322,2.843h103.2c2.06765,0.02924 3.99087,-1.05709 5.03322,-2.843c1.04236,-1.78592 1.04236,-3.99474 0,-5.78066c-1.04236,-1.78592 -2.96558,-2.87225 -5.03322,-2.843h-34.32161c-0.00001,-1.53421 -0.61486,-3.00442 -1.70704,-4.08187c-1.09219,-1.07746 -2.57061,-1.67228 -4.10468,-1.65146zM34.4,45.86667v91.73333c0,6.33533 5.13133,11.46667 11.46667,11.46667h80.26667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-91.73333z"></path>
                                </g>
                              </g>
                            </svg>
                          </button>
                        </div> 
                      </div>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-left"> Tem certeza que deseja cancelar essa consulta ? </div>
                              <div class="modal-footer">
                                <a href="delete_consultas.php?id=<?= $con_codigo;?>"><button type="button" class="btn btn-primary"><span class="text-white">Sim</span></button></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="text-white"> Não</span></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    <hr/>
                  </tr>
                </tbody>
                <?php
                  endforeach;
                ?>
              </table>
            </div>
          </div> 
        </div>
      </div> 
      </br></br></br></br></br></br></br></br></br></br>

              
    </div>

     
  </body>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

  </script>
</html>