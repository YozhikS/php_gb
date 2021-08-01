<?php
  include_once 'module/config.php';

  function translit($string) {
      $association = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya');

      return preg_replace('~[\s]{1}~u', '_', strtr(mb_strtolower(trim($string)), $association));
   }

   function changeImage($h, $w, $src, $newsrc, $type) {
    $newimg = imagecreatetruecolor($h, $w);
    switch ($type) {
      case 'jpeg':
        $img = imagecreatefromjpeg($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagejpeg($newimg, $newsrc);
        break;
      case 'png':
        $img = imagecreatefrompng($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagepng($newimg, $newsrc);
        break;
      case 'gif':
        $img = imagecreatefromgif($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagegif($newimg, $newsrc);
        break;
    }
   }

  if (isset($_POST['send'])) {
    if ($_FILES['userfile']['error']) {
      $message = 'Ошибка загрузки файла!';
    } elseif ($_FILES['userfile']['size'] > 1000000) {
      $message = 'Файл слишком большой';
    } elseif (
        $_FILES['userfile']['type'] == 'image/jpeg'||
        $_FILES['userfile']['type'] == 'image/png' ||
        $_FILES['userfile']['type'] == 'image/gif'
      ) {
          if (copy($_FILES['userfile']['tmp_name'], IMG_BIG.translit($_FILES['userfile']['name']))) {
            $path = translit($_FILES['userfile']['name']);
            $type = explode('/', $_FILES['userfile']['type'])[1];
            changeImage(150, 150, $_FILES['userfile']['tmp_name'], IMG_SMALL.$path, $type);
            $sqlInsert = "INSERT INTO `images` (`path`, `size`, `name`) VALUES ('".$path."', '".$_FILES['userfile']['size']."', '".$_FILES['userfile']['name']."')";
            $sqlRun = mysqli_query($connect, $sqlInsert);
            $message = 'Файл загружен успешно!';
          } else {$message = 'Ошибка загрузки файла!';}
      } else {
        $message = 'Не правильный тип файла!';
    }
  }
?>
