<?php 			
session_start();
define('MB', 1048576);
$zos = 20*MB;
$uploaddir = 'img/';
$name = $_POST['texter'];
// это папка, в которую будет загружаться картинка
$apend=$name.rand(100,1000).'.jpg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения
$today = date("Y-m-d");  
// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size'] < $zos)) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] > 0 && $size[1]> 0) 
     { 
     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     echo "Upload succesfull. Now you will redirect back. " .$uploadfile."</b>"; 
     echo "<meta http-equiv='refresh' content='2;URL=page.php' />";


     include "connection.php";
     $query = "INSERT INTO files(url, `text`, sizes, `date`) VALUES ('img/$apend','$name', '".$size[0]."x". $size[1] ."pix', '$today')";

     mysqli_query($link, $query) or die("Error." . mysqli_error($link));

     } else {
     echo "thats not a picture!!!";
     echo "<meta http-equiv='refresh' content='2;URL=page.php' />"; 
     unlink($uploadfile); 
     // удаление файла 
     } 
   } else {
   echo "File wasnt upload, back and try again.";
   echo "<meta http-equiv='refresh' content='2;URL=page.php' />";
   } 
} else { 
echo "Filesize should be lower then 20mb.";
echo "<meta http-equiv='refresh' content='2;URL=page.php' />";
} 


?>