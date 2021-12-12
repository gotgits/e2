<?php

# routes defined 'url' => ['Controller', 'method']

return [
    '/' => ['AppController', 'index'],
    '/playername' => ['AppController', 'playername'],
    '/game' => ['AppController', 'game'],
    '/history' => ['AppController', 'history'],
    '/round' => ['AppController', 'round'],
    '/register' => ['AppController', 'register'],
    // '/history' => ['HistoryController', 'index'],
    // '/history' => ['HistoryController', 'show'],
    // '/round' => ['HistoryController', 'show']
];
