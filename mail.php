<?php
header("Content-Type: text/html; charset=utf-8");

function show_error($a) {
    echo $a;
}

//var_dump($_POST);
/*
Форма обратной связи может получать сообщения с любых почтовых ящиков.
Исправлена проблема кодировки при получении писем почтовым клиентом Outlook.
Вы скачали её с сайта Epic Blog https://epicblog.net Заходите на сайт снова!
ВНИМАНИЕ! Лучше всего в переменную myemail прописать почту домена, который использует сайт. А не mail.ru, gmail и тд.
*/

/* Устанавливаем e-mail Кому и от Кого будут приходить письма */   
$to = "info@Mice.ru"; // Здесь нужно написать e-mail, куда будут приходить письма   
$from = "info@Mice.ru"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply(собака)epicblog.net
 
/* Указываем переменные, в которые будет записываться информация с формы */
$name = $_POST['name'];
$phone = $_POST['phone'];
$type = $_POST['type'];
$people = $_POST['people'];
$day = $_POST['day'];
$date = $_POST['date'];
$counry = $_POST['country'];
$subject = "Форма отправки сообщений с сайта Mice";


$error_count = 0;

     
/* Проверка правильного написания e-mail адреса 
if (empty($email)) {
    show_error("Укажите пожалуйста e-mail адрес.\n");
    $error_count = 1;
}

*/

if (empty($phone)) {
    show_error("Укажите пожалуйста номер телефона.\n");
    $error_count = 1;
}
elseif (!preg_match("/^\+7\s\(9[0-9]{2}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $phone))
{
    show_error("Не корректно указан номер телефона.\n");
    $error_count = 1;
}


if (empty($error_count)) {
    /* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
    $mail_to_myemail = "Здравствуйте! <br>
    Было отправлено сообщение с сайта! <br>
    Имя отправителя: $name <br>
    Вид мероприятия: $type <br>
    Кол-во человек: $people <br>
    Кол-во дней: $day <br>
    Примерные даты: $date <br>
    Страна: $type1 <br>
    Номер телефона: $phone <br> <br>
    Текст сообщения: $message <br>
    Чтобы ответить на письмо, создайте новое сообщение, скопируйте электронный адрес и вставьте в поле Кому.";  

    $headers = "From: $from \r\n";





    /* Отправка сообщения, с помощью функции mail() */
    if (mail($to, $subject, $mail_to_myemail, $headers . 'Content-type: text/html; charset=utf-8'))
    {
        
        echo " Сообщение отправлено.\n
        Спасибо Вам " . $name . ", мы скоро свяжемся с Вами.";
    }
    else
    {
        echo "Что то пошло не так...";
    }
}
?>
