<?php

return [
    ['GET', '/', ['biroa\Controllers\HomeController', 'show']],
    ['GET', '/result', ['biroa\Controllers\ResultController', 'show']],
    ['GET', '/{slug}', ['biroa\Controllers\PageController', 'show']],


];
