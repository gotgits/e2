<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/history' => ['ProductsController', 'index'],
    '/round' => ['ProductsController', 'show'],
    '/history/save-round' => ['ProductsController', 'saveRound'],
    '/history/rounds' => ['ProductsController', 'rounds']
];