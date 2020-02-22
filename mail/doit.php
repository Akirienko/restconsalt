<?php
    $msg_box = ""; // в этой переменной будем хранить сообщения формы
    $errors = array(); // контейнер для ошибок
    // проверяем корректность полей
    
    // если форма без ошибок
    if(empty($errors)){     
        // собираем данные из формы
        $message  = "Имя : " . $_POST['name'] . "<br/>";
        $message .= "Телефон: " . $_POST['phone'] . "<br/>";
        $message .= "E-mail: " . $_POST['email'] . "<br/>";
        $message .= "Сайт: " . $_POST['url'] . "<br/>";
        $message .= "Рассылка: " . $_POST['сb'] . "<br/>";
        send_mail($message); // отправим письмо
        // выведем сообщение об успехе
        $msg_box = "<span style='color: green;font-weight:bold;display: block;'>Спасибо. Наш менеджер свяжется с Вами в ближайшее время!</span>";
    } else {
        // если были ошибки, то выводим их
        $msg_box = "";
        foreach($errors as $one_error){
            $msg_box .= "<span style='color: red;font-weight:bold;display: block;'>Фнкция mail не отработала!</span><br/>";
        }
    }
 
    // делаем ответ на клиентскую часть в формате JSON
    echo json_encode(array(
        'result' => $msg_box
    ));
     
     
    // функция отправки письма
    function send_mail($message){
        // почта, на которую придет письмо
        $mail_toThird = "marya.vadymovna@gmail.com";
        $mail_toFirst = "k.popov00@gmail.com"; 
        $mail_toSecond = "info.itmoko@gmail.com"; 
        // тема письма
        $subject = $_POST['formHidde'];
         
        // заголовок письма
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
        $headers .= "From:".$subject." <ns@leadbox.pro>\r\n"; // от кого письмо
         
        // отправляем письмо 
        mail($mail_toFirst, $subject, $message, $headers);
        mail($mail_toSecond, $subject, $message, $headers);
        mail($mail_toThird, $subject, $message, $headers);
    }
     
?>