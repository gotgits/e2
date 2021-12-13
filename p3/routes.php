<?php

# routes defined 'url' => ['Controller', 'method']

return [
    '/' => ['AppController', 'index'],
    '/playerlog' => ['AppController', 'playerlog'],
    '/register' => ['AppController', 'register'],
    '/game' => ['AppController', 'game'],
    '/history' => ['AppController', 'history'],
    '/round' => ['AppController', 'round'],
];