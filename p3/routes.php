<?php

# routes defined 'url' => ['Controller', 'method']

return [
    '/' => ['AppController', 'index'],
    '/history' => ['PositionsController', 'index'],
    '/history' => ['PositionsController', 'show'],
    '/round' => ['PositionsController', 'show']
];