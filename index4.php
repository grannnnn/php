<?php
  //setcookie

  $user_name = "Alex";
  //setcookie("user_name", $user_name, time()+5/*куки живет 5 секунд*/);
  setcookie("user_name", $user_name, time()+180);
//  setcookie("user_name", $user_name, time()-180);//удаление куки
?>
