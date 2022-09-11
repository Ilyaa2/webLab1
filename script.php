<?php

//можно сделать что-то типо if (isset(x,y,r)){func1(),func2(),func3()}
//косяки:
//1) при обновлении страницы результаты все ще записываются в таблицу 
//2) время поправь
//3) валидация на сервере
//4) кнопка x не работает
//5) валидация на клиенте




//$start = microtime();

//ПОПРАВИТЬ IF

//Посмотреть мало ли будут проблемы с дробными числами
//сделать валидацию значений от пользователя

//$x = -3;
//$y = 4;
//$R = 6;

//$x = $_GET['btn'];


//добавить x





if (isset($_GET['text'])) {
  $y = $_GET['text'];
  
  // if (isset($_SESSION["masy"])) {
  //   $i = count($_SESSION["masy"]) + 1;
  //   echo count($_SESSION["masy"]);
  // } else {
  //   $i = 1;
  // }
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masy[$i]"] = $y;
}

if (isset($_GET['radiobutton'])) {
  $R = $_GET['radiobutton'];
  
  // if (isset($_SESSION["masr"])) {
  //   $i = count($_SESSION["masr"]) + 1;
  // } else {
  //   $i = 1;
  // }
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masr[$i]"] = $R;
}

if (isset($_GET['radiobutton'])) {
  $x = 5;
  // if (isset($_SESSION["masx"])){
  //   $i = count($_SESSION["masx"]) + 1;
  // } else {
  //   $i = 1;
  // }
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masx[$i]"] = $x;
  //echo $_SESSION["masx[$i]"];
}


if (isset($x) and isset($y) and isset($R)) {
  $k = $R / 7;
}


//print($k);  

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


if ((isset($x) and isset($y) and isset($R)) and ($y >= 0)) {
  $Rez = batman_upper($x, $k);
} elseif (isset($x) and isset($y) and isset($R)) {
  $Rez = batman_lower($x, $k);
}

if (isset($x) and isset($y) and isset($R)) {
  $Rez = (int) $Rez * $k - $y;
}

//это не совсем правильно, потому что он мог обрезать результат, изучи работу с дробными числами

// проверить, а если будет сравнение целого числа с дробным
// также проверить X,Y,R (от пользователя) на допустимость значений.


//$bool = true;
$response;
if (isset($x) and isset($y) and isset($R)) {
  if ($Rez >= 0) {
    $response = "Попадает";
  } else {
    //$bool = false;
    $response = "Не попадает";
  }
  
  $i = intdiv(count($_SESSION),4)+1;
  $_SESSION["masrez[$i]"] = $response;
  //echo $_SESSION["masrez[$i]"];
}


//если обновлять страницу то массив сессии будет наращиваться







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




// echo "Время выполнения скрипта: " . (microtime() - $start);
// echo "Текущее время: " . date("r");
