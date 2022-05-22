<?php

$msg_box = ""; 
$errors = array(); 

// если форма без ошибок
if(empty($errors)){     
    // создание сделки
    $message = "Имя: " . $_POST['user-name'] . "<br>Телефон: " . $_POST['user-tel'];
    send_mail($message);
}
    
// создание сделки
function send_mail($message){
    // почта, на которую придет письмо
    $mail_to = "timeloft39@inbox.ru";

    // тема письма
    $subject = 'Заявка с сайта | TimeLoft';
        
    // заголовок письма
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
    $headers .= "From: <timeloft39@inbox.ru>\r\n"; // от кого письмо
        
    // отправляем письмо 
    mail($mail_to, $subject, $message, $headers);
}
    

// Файлы phpmailer
// require 'phpmailer/PHPMailer.php';
// require 'phpmailer/SMTP.php';
// require 'phpmailer/Exception.php';


// // Переменные, которые отправляет пользователь
// $name = $_POST['user-name'];
// $tel = $_POST['user-tel'];
// $file = $_FILES['myfile'];

// // Формирование самого письма
// $title = "Заявка с сайта | TimeLoft";
// $body = "
// <h2>Новая заявка</h2>
// <b>Имя:</b> $name<br><br>
// <b>Телефон:</b> $tel<br><br>
// ";

// // Настройки PHPMailer
// $mail = new PHPMailer\PHPMailer\PHPMailer();
// try {
//     $mail->isSMTP();   
//     $mail->CharSet = "UTF-8";
//     $mail->SMTPAuth   = true;
//     //$mail->SMTPDebug = 2;
//     $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

//     // Настройки вашей почты
//     $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
//     $mail->Username   = 'timeloft39@inbox.ru'; // Логин на почте
//     $mail->Password   = '6Irresistible6'; // Пароль на почте
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port       = 465;
//     $mail->setFrom('timeloft39@inbox.ru', 'Изготовление мебели в стиле лофт'); // Адрес самой почты и имя отправителя

//     // Получатель письма
//     $mail->addAddress('timeloft39@inbox.ru');

//     // Прикрипление файлов к письму
//     if (!empty($file['name'][0])) {
//         for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
//             $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
//             $filename = $file['name'][$ct];
//             if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
//                 $mail->addAttachment($uploadfile, $filename);
//                 $rfile[] = "Файл $filename прикреплён";
//             } else {
//                 $rfile[] = "Не удалось прикрепить файл $filename";
//             }
//         }   
//     }

//     // Отправка сообщения
//     $mail->isHTML(true);
//     $mail->Subject = $title;
//     $mail->Body = $body;    

//     // Проверяем отравленность сообщения
//     if ($mail->send()) {$result = "success";} 
//     else {$result = "error";}

// } catch (Exception $e) {
//     $result = "error";
//     $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
// }

// // Отображение результата
// echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

?> -->

<?php
// формируем запись в таблицу google
$url = "";

// массив данных (изменить entry, draft и fbzx)
$post_data = array (
 "entry.111111111" => $_POST['user_name'],
 "entry.222222222" => $_POST['user_tel'],
 "draftResponse" => "[,,"-6953169141178261229"]",
 "pageHistory" => "0",
 "fbzx" => "-6953169141178261229"
);

// с помощью CURL заносим данные в таблицу google (не изменять!!!)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// указываем, что у нас POST запрос
curl_setopt($ch, CURLOPT_POST, 1);
// добавляем переменные
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//заполняем таблицу google
$output = curl_exec($ch);
curl_close($ch);

?>