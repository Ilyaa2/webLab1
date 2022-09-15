<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="resourses/icon-money.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Graph</title>
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <header>
        <div class="name">
          Загородников Илья
        </div>
        <div class="metainf">
          P32121<br>
          Вариант №1705
        </div>
      </header>
      <h1>Выберите значения, чтобы узнать попадает ли точка в область фигуры</h1>
      <img src="resourses/graph.jpg" alt="graph" class="image">
      <form class="block_values" action="index.php" method="get">
        <div class="values">
          <div class="elem">X:</div>
          <button name="btn" value="-5">-5</button>
          <button name="btn" value="-4">-4</button>
          <button name="btn" value="-3">-3</button>
          <button name="btn" value="-2">-2</button>
          <button name="btn" value="-1">-1</button>
          <button name="btn" value="0">0</button>
          <button name="btn" value="1">1</button>
          <button name="btn" value="2">2</button>
          <button name="btn" value="3">3</button>
        </div>
        <div class="values">
          <div class="elem">Y:</div>
          <input type="text" class="input_text" name="text" required>
        </div>
        <div class="values">
          <div class="elem">R:</div>
          <div class="radio">
            1<input type="radio" name="radiobutton" value="1">
          </div>
          <div class="radio">
            2<input type="radio" name="radiobutton" value="2">
          </div>
          <div class="radio">
            3<input type="radio" name="radiobutton" value="3">
          </div>
          <div class="radio">
            4<input type="radio" name="radiobutton" value="4">
          </div>
          <div class="radio">
            5<input type="radio" name="radiobutton" value="5">
          </div>
        </div>
        <button type="submit" class="submit" onmousedown="viewContent()">Отправить</button>
        <!-- <input type="submit" name="enter_key" value="true" style="display:none">
        <input type="hidden" name="pressed_button" id="pressed_button" value="false">
        <input type="button" value="Submit" class ="submit" 
          onclick="viewContent()"> -->
      </form>
      <script>
      function viewContent() {
        //document.getElementById('pressed_button').value='true';document.getElementById('myform').submit();
        document.getElementById("specialContent").style.display = "block";
      };
      </script>
    </div>
    <table>
      <tr>
        <td>X</td>
        <td>Y</td>
        <td>R</td>
        <td>Result</td>
      <tr>
      <?php
        include_once 'script.php';
      ?>
      <style type ="text/css">
        table{
          margin: 0 auto;  
          margin-top: 40px;
          border: 1px solid black;
        }
        tr,td{
          padding: 5px;
          border: 1px solid black;
          font-size: 23px;
        }
        .green{
          background-color: rgb(106, 206, 106);
        }

        .red{
          background-color: rgb(244, 81, 81);
        }
      </style>

    </table>

    
</body>

</html>