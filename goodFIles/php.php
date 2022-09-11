<?php
// if (isset($_GET["btn"])){
//   $button = $_GET["btn"];
// }

// foreach ($_GET as $key=>$value){
//   echo 'Ключ: '.$key.' Значение: '.$value;
// }

//   if (isset($_GET["1"])){
//     $X = $_GET["1"];
//   }  
//   // $Y = $_GET["2"];

//   //for($i = 1; $i<intdiv(count($_COOKIE),2)+1; $i++){
//   if (count($_COOKIE) == 0){
//     setcookie("mas1[]",$X);
//     setcookie("mas2[]",$Y);
//   } else {
//     for($i = count($_COOKIE)+1; $i<$i = count($_COOKIE)+2;$i++){
//       setcookie("mas1[$i]",$X);
//       setcookie("mas2[$i]",$Y);
//     }  
//   }

  //АААААААААААААААААААААААААААААААААААААААААА
  // ТЕБЕ НАФИГ НЕ НУЖЕН ЦИКЛ, ПРОСТО НАРАЩИВАЙ ЗНАЧЕНИЕ, КУКИ ПЕРЕЗАПИСЫВАТЬ НЕ НАДО, ОНИ ЖЕ ХРАНЯТСЯ


//   foreach ($_COOKIE['mas1'] as $name => $value) {
//     $name = htmlspecialchars($name);
//     $value = htmlspecialchars($value);
//     echo "$name : $value <br />\n";
//   }

//   foreach ($_COOKIE['mas2'] as $name => $value) {
//     $name = htmlspecialchars($name);
//     $value = htmlspecialchars($value);
//     echo "$name : $value <br />\n";
//   }
//   echo count($_COOKIE);
//   //вывел 2, нумерация с нуля. ТО есть 3 элемента
// }















//все-таки нужно чекать нажал ли пользователь на кнопку submit, потому что иначе, если был хоть раз гет запрос при дальнейших обновлениях страницы просто будет наращиваться занчение без фактического ввода значений пользвоателя, массиву будет просто хватать его предыдущего гет запроса


//if (isset($_REQUEST["submit"]) and isset($_GET["1"])){
  //и тут работа с сессией 
  //то есть если пользователь нажал на submit, тогда мы показываем контент




  
if (isset($_GET["1"])){
  $i = count($_SESSION)+1;
  $_SESSION["mas[$i]"] = $_GET["1"];
  
  foreach ($_SESSION as $row) {
    echo $row . "<br>\r\n";
  }

//}

  }

  foreach ($_SESSION as $row) {
    echo $row . "<br>\r\n";
  }
?>
