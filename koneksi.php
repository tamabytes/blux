<?php

$koneksi = mysqli_connect('localhost','root','','db_019_satwika_p2');

if($koneksi->error){
  echo "Database connection failed $koneksi->error";
  exit();
}