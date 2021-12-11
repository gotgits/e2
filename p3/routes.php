<?php

# routes defined 'url' => ['Controller', 'method']

return [
    '/' => ['AppController', 'index'],
    '/register' => ['AppController', 'register'],
    '/game' => ['AppController', 'game'],
    '/history' => ['AppController', 'history'],
    '/round' => ['AppController', 'round'],
    // '/history' => ['HistoryController', 'index'],
    // '/history' => ['HistoryController', 'show'],
    // '/round' => ['HistoryController', 'show']
];