<?php
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer(true);

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

try {
     $mail->Host = 'smtp.hostinger.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465; //  Usar 587 porta SMTP
     $mail->Username = 'artec@artecsolar.com'; // Usuário servidor SMTP (endereço de email)
     $mail->Password = '250839Artec@'; // Senha do servidor SMTP (senha do email usado)

 //pego os dados enviados pelo formulário 
$nome = $_POST["nome"]; 
$email = $_POST["email"]; 
$telefone = $_POST["telefone"];	
$mensagem = $_POST["mensagem"]; 
$assunto = 'MENSAGEM DO SITE DE: '.$nome.'';

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->AddReplyTo("$email","$nome"); //E-mail de Resposta
     $mail->SetFrom('artec@artecsolar.com', 'Artec Solar'); //Seu e-mail
	 $mail->Subject = ("$assunto");//Assunto do e-mail

     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('artec@artecsolar.com');
     //$mail->AddCC('qqqqqq@qqqqqq.com', 'Destinatario'); // Copia
     //$mail->AddBCC('qqqqqq@qqqqqq.com', 'Destinatario2`'); // Cópia Oculta


	 $arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE; 

if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){ 

$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb"); 
$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); 
$anexo = base64_encode($anexo); 
 
fclose($fp); 
 $anexo = chunk_split($anexo); 

	 $corpo = "$mensagem\n\n\n$nome\n$telefone - $email";

     //Define o corpo do email
	 $mail->Body = $corpo;
	 $mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);
 
     $mail->Send();
	 echo "<script>location.href='../contato2.html'</script>"; 
 } 

//se nao tiver anexo 
else{ 	

	 $corpo = "$mensagem\n\n\n$nome\n$telefone - $email";

     //Define o corpo do email
	 $mail->Body = $corpo;

     $mail->Send();
	 echo "<script>location.href='../contato2.html'</script>";  
}	 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>