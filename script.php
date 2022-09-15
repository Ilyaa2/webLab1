<?php
$start = microtime(1);

//можно сделать что-то типо if (isset(x,y,r)){func1(),func2(),func3()}
//косяки:
//1) при обновлении страницы результаты все ще записываются в таблицу 
//2) валидация на сервере
//3) сделать проект в разных файлах, а не все в одном

//4) кнопка x не работает
//5) валидация на клиенте



//$start = microtime();

//Посмотреть мало ли будут проблемы с дробными числами
//сделать валидацию значений от пользователя
$bool = true;


if (isset($_GET['text'])) {
  $y = $_GET['text'];
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masy[$i]"] = $y;
  if (!is_numeric($y)){
    $bool = false;
  }
}

if (isset($_GET['radiobutton']) and $bool) {
  $R = $_GET['radiobutton'];
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masr[$i]"] = $R;
}

if (isset($_GET['radiobutton']) and $bool) {
  $x = 5;
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masx[$i]"] = $x;
}


if (isset($x) and isset($y) and isset($R) and $bool) {
  $k = $R / 7;
}


function batman_upper($x, $k)
{
  $x = abs($x);
  if ($x > 7 * $k) {
    return 'The Batman equaxion is defined on -R <= x <= R';
  } elseif ($x < 0.5 * $k) {
    return 2.25;
  } elseif ((0.5 * $k <= $x)  and ($x < 0.75 * $k)) {
    return 3 * $x + 0.75;
  } elseif ((0.75 * $k <= $x) and ($x < 1.0 * $k)) {
    return 9 - 8 * $x;
  } elseif ((1 * $k <= $x) and ($x < 3 * $k)) {
    return (1.5 - 0.5 * $x - 3 * sqrt(10) / 7 * (sqrt(3 - ($x ** 2) + 2 * $x) - 2));
  } elseif ((3 * $k <= $x) and ($x <= 7 * $k)) {
    return 3 * sqrt((- ($x / 7) ** 2) + 1);
  }
}


function batman_lower($x, $k)
{
  $x = abs($x);
  if ($x > 7 * $k) {
    return 'The Batman equation is defined on -R <= t <= R';
  } elseif ((0 <= $x) and ($x < 4 * $k)) {
    return (abs($x / 2) - (3 * sqrt(33) - 7) / 112 * ($x ** 2) + sqrt(1 - (abs($x - 2) - 1) ** 2) - 3);
  } elseif ((4 * $k <=  $x) and ($x <= 7 * $k)) {
    return -3 * sqrt(- ($x / 7) ** 2 + 1);
  }
}




$Rez = 0;



if ((isset($x) and isset($y) and isset($R)) and ($y >= 0) and $bool) {
  $Rez = batman_upper($x, $k);
} elseif (isset($x) and isset($y) and isset($R)) {
  $Rez = batman_lower($x, $k);
}

if (isset($x) and isset($y) and isset($R)) {
  $Rez = (int) $Rez * $k - $y;
}

//это не совсем правильно, потому что он мог обрезать результат, изучи работу с дробными числами
// проверить, а если будет сравнение целого числа с дробным



$response;
if (isset($x) and isset($y) and isset($R) and $bool) {
  if ($Rez >= 0) {
    $response = "Попадает";
  } else {
    $response = "Не попадает";
  }
  
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masrez[$i]"] = $response;
}







//нужно ли вообще проверять на сессию???

if (isset($_SESSION) and isset($x) and isset($y) and isset($R)) {
  for($i = 1; $i < intdiv(count($_SESSION),4)+1; $i++){

    //echo count($_SESSION);
    //echo $i;
    $x = $_SESSION["masx[$i]"];
    $y = $_SESSION["masy[$i]"];
    $R = $_SESSION["masr[$i]"];
    $response = $_SESSION["masrez[$i]"];
    if (strcmp("Попадает",$response) == 0) {
      echo "<div id=specialContent>
<tr class='green'>
<td>$x</td>
<td>$y</td>
<td>$R</td>
<td>$response</td>
</tr>
</div>  
";
    } else {
      echo "<div id=specialContent>
<tr class='red'>
<td>$x</td>
<td>$y</td>
<td>$R</td>
<td>$response</td>
</tr>
</div>  
";
    }
  }
}




echo "<br> Время выполнения скрипта: " . number_format(microtime(1) - $start,13). " сек <br>";
echo "Текущее время: " . date("r");

//exit();
