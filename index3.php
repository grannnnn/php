<?php
//отправка сообщений с локального сервера не работает!
  $message = "Сообщение";
  $to = "admin@itproger.com";
  $from = "example@itproger.com";
  $subject = "Тема сообщения";

  $subject = "=?utf-8?B?".base64_decode($subject)."?=";//добавление кодировки
  $headers = "From: $from\r\nReply-to: $from\r\nContetnt-type: text/plain; charset=utf-8\r\n";

  mail($to, $subject, $message, $headers);
?>
