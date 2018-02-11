<?php
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
$mail = $_POST['mail'];
$text = $_POST['text'];

$content = "mail: ".$mail.";\n\n"."-- \n".$text;

try {
mail("mail@michale.ru", "Письмо с Resume.michale", $content); 
echo 'Спасибо, ваше сообщение отправлено';
} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

}

?>