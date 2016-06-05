<?php

if(file_exists( __DIR__ . '/../src/Bootstrap.php')){
    require __DIR__ . '/../src/Bootstrap.php';
}else{
    throw new Exception('Error 404! File not found');
}

