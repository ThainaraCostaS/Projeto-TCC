<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome= $_POST['nome'];
		$email= $_POST['email'];
		$mensagem= $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "cesar@celke.ga");
        $subject = "Mensagem de Contato";
        $to = new SendGrid\Email(null, "safeworld.duvidas@gmail.com");
        $content = new SendGrid\Content("test/html", "boa tarde, <br><br>Nova mensagem 
		do site safeworld<br><br>Nome: $nome<br> Email: $email <br>Mnesagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada";

        ?>
    </body>
</html>
