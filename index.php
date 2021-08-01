<?php
  include_once 'module/include_image.php';
  include_once 'module/config.php';
  
  $sql = "select * from images ORDER BY counter DESC";
  $table = mysqli_query($connect, $sql);
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
    <h1>Галерея фотографий</h1>
  </header>


  <div class="fg-gallery">  
    <?php while ($images = mysqli_fetch_assoc($table)) : ?>
      <a href='image.php?id=<?= $images['id'] ?>' class='product'>
        <img src="<?= IMG_SMALL.$images['path'] ?>" alt="<?= $images['name'] ?>">
      </a>
    <?php endwhile; ?>
  </div>

  <div class="add_foto">
    <form action="" method="POST" enctype="multipart/form-data">
      <span> <b>Добавить файл: </b> </span>
      <input type="file" name="userfile">
      <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
      <span><?=$message?></span>
    </form>
  </div>

</body>
</html>
