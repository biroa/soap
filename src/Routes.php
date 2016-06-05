<?php

return [
    ['GET', '/', ['biroa\Controllers\HomeController', 'show']],
    ['POST', '/result', ['biroa\Controllers\ResultController', 'proceed']],
    //['GET', '/{slug}', ['biroa\Controllers\PageController', 'show']],


];
