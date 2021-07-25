<?php
  include_once 'module/image.php';
  include_once 'module/config.php';
  
  $images = array_slice(scandir(IMG_SMALL), 2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Работа с файлами</title>
  <link rel="stylesheet" href = "css/gallery.css">
  <script src="js/gallery.js"></script>
</head>
<body>
  <header>
    <h1>Галерея фотографий</h1>
  </header>


  <div class="fg-gallery">
    <?php for ($i=0; $i < count($images); $i++) : ?>
        <img src="<?=IMG_SMALL.$images[$i] ?>" alt="">
    <?php endfor; ?>
  </div>

  <div class="add_foto">
    <form action="" method="POST" enctype="multipart/form-data">
      <span> <b>Добавить файл: </b> </span>
      <input type="file" name="userfile"> 
      <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
      <span><?=$message?></span>
    </form>
  </div>
  
  <script>
    var myGallery = new FgGallery ('.fg-gallery', { 
      cols: 4, 
      style: { 
        border: '10px solid #fff', 
        height: '180px', 
        boxShadow: '0 2px 10px -5px # 000' 
      } 
    })
  </script>
</body>
</html>
