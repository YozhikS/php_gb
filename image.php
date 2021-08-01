<?php
  include_once 'module/config.php';

  $imageId = $_GET['id'];
  $sqlImg = "select * from images where id = '$imageId'";
  $image = mysqli_fetch_assoc(mysqli_query($connect, $sqlImg));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Работа с файлами</title>
  <link rel="stylesheet" href = "css/gallery.css">
</head>
<body>
  <header>
    <h1>Изображение <?= $image['name'] ?></h1>
  </header>

  <main>
    <div class="image_big">
      <a href="index.php">Вернутся</a>
      <hr>
      <img src="<?= IMG_BIG.$image['path'] ?>" alt="<?= $images['name'] ?>" width = '60%' height = '60%'>
      <?= 
        // $sqlUpdate = ;
        mysqli_query($connect, "UPDATE images SET `counter` = `counter` + `1` where id = $imageId");
      ?>
      <h2 class="count">Количество просмотров: <?= ++$image['counter'] ?></h2>
    </div>
  </main>