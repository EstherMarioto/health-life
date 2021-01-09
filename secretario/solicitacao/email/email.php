<?php
            session_start();
            include '../../../conexao/conexao.php';
           
            $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

            $sth = $pdo->prepare('select * from tbl_login where lo_codigo = :lo_codigo');
            $sth->bindValue(':lo_codigo',  $_SESSION["health"]["id"]);
            $sth->execute();
            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
            extract($resultado);
            $sth = $pdo->prepare('select * from tbl_unidade where un_codigo = :un_codigo');
            $sth->bindValue(':un_codigo', $lo_unidade);
            $sth->execute();
            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
            extract($resultado);
            if($un_dtl_unidade == 2 ){

                $sth = $pdo->prepare('select * from tbl_paciente where p_codigo = :p_codigo');
                $sth->bindValue(':p_codigo', $id);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);

            }else{
 
                $sth = $pdo->prepare('select * from tbl_paciente_ubs where p_codigo = :p_codigo');
                $sth->bindValue(':p_codigo', $id);
                $sth->execute();
                $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                extract($resultado);
            };


            require_once('src/PHPMailer.php');
            require_once('src/SMTP.php');
            require_once('src/Exception.php');
            
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            
            $mail = new PHPMailer(true);
            
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'health.lifeposto@gmail.com';
                $mail->Password = 'alfredaohealth';
                $mail->Port = 587;
            
                $mail->setFrom('health.lifeposto@gmail.com');
                $mail->addAddress($p_email);
               
            
                $mail->isHTML(true);
                $mail->Subject = 'Login';
                $mail->Body = "Ola, ".$p_nome."<br> Seu pedido de cadastro no Posto ".$un_tipo." foi aceito. <br><br>Seu numero de cadastro: ".$id." e sua senha criada no cadastro foi ativada. <br> Seja Bem-Vindo.";
                $mail->AltBody = "Ola, ".$p_nome."<br> Seu pedido de cadastro no Posto ".$un_tipo." foi aceito. <br><br>Seu numero de cadastro: ".$id." e sua senha criada no cadastro foi ativada. <br> Seja Bem-Vindo.";
            
                if($mail->send()) {
                    echo 'Email enviado com sucesso';
                   
                } else {
                    echo 'Email nao enviado';
                }
            } catch (Exception $e) {
                echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
            };

        ?>
       
    <head>
        <meta http-equiv="Refresh" content="0; url=http://localhost/health&life/secretario/solicitacao/email/update.php?id=<?=$id?>" />
    </head>
      
        
        <a href="update.php?id=<?$id?>"> <h5> Ok </h5></a>;


            