<?php

  CONST SERVER = "localhost";
  CONST LOGIN = "root";
  CONST PASSWORD = "root";
  CONST DB = "gallery";
  CONST IMG_BIG = './img_big/';
  CONST IMG_SMALL = './img_small/';

  $connect = mysqli_connect(SERVER,LOGIN,PASSWORD,DB) or die("Error connect!");