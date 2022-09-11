<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form method="get" action="index.php" id="myform">  
  ... form items here ...



<input type="submit" name="enter_key" value="true" style="display:none">
<input type="hidden" name="pressed_button" id="pressed_button" value="false">
<input type="button" value="Submit"
  onclick="document.getElementById('pressed_button').value='true';document.getElementById('myform').submit();">
</form>

<?php
if ($_GET['pressed_button']=='true') {
  echo "кнопка нажата";
} else{
  echo "кнопка не нажата";
}
?>

</body>
</html>