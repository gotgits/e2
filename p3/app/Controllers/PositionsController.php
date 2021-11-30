<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    private $positionObj;
    # Create a construct method to set up a productsObj property that can be used across different methods
    public function __construct($app)
    {
        parent::__construct($app);
        $this->positionObj = new Products($this->app->path('database/positions.json'));
    }
    public function index()
    {
        # Docs App methods
        // $productsObj = new Products($this->app->path('/database/products.json'));
        $positions = $this->positionObj->getAll();
        return $this->app->view('rounds/index', ['rounds' => $rounds]);

        // dd($products);
        // var_dump($productsObj);
        # Docs Global helpers
        // dump($this->app->path('/database/products.json'));
        // dd($productsObj);
        // return 'This is the products index...';
    }

    // public function missing()
    // {
    //     $missing = $this->productsObj->is_null($product);

    // }
    
    public function show()
    {
        $position = $this->app->param('position');
        
        # above is terse version for an absolute path instance, using the param method to retrieve route parameters/query string values:
        # this is the absolute path:
        // $productsObj = new Products($this->app->path('/database/products.json'))
        # which replaces a relative path:
        //  $productsObj = new Products('../database/products.json');
        # dump($$_GET['sku]);
        # dump($this->app->param('sku'));
        
        if (is_null($position)) {
            $this->app->redirect('/history');
        }
        $position = $this->positionObj->getBySku($position);

        if (is_null($round)) {
            return $this->app->view('history/missing');
        }
        # accessing the data from variable in the saveReview method below
        $roundSaved = $this->app->old('roundSaved');
        # then make sure it is available to the view
        return $this->app->view(
            'history/show',
            ['position' => $position,
            'roundSaved' => $roundSaved
        ]
        );
    }
    public function saveRound()
    {
        # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
        
        # DSN (Data Source Name) string
        # below comes directly from https://www.php.net/manual/en/book.pdo.php
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

        # Driver-specific connection options
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        // return 'Save review test...';
        # validation code should be at top, before retrieving data
        $this->app->validate([
            'player' => '',
            'competitor' => '',
            'position' => 'required',
            'round' => ''
        ]);

 

        # If the above validation checks fail
        # The user is redirected back to where they came from (/product)
        # None of the code that follows will be executed

        # if using $_GET or $POST superglobals, //dump($_POST['sku']);
        # instead use input() from the framework, allows for second parameter
        //dump($this->app->input('sku',''));
        $player = $this->app->input('player');
        $competitor = $this->app->input('competitor');
        $position = $this->app->input('position');
        # Todo: Persist review to the database...
        # confirmation message, redirect data persisted or specifically flashed to the session or exist in the session for a single page request and then is deleted upon refresh with a second parameter expecting an array

        # Write a SQL query
        $sql = "SELECT * FROM rounds";

        # Execute the statement, getting the result set as a PDOStatement obect
        # https://www.php.net/manual/en/pdo.query.php
        $statement = $pdo->query($sql);

        $sqlTemplate = "INSERT INTO history (player, competitor, position) 
        VALUES (:player, :competitor, :position, :round)";

        $values = [
            'player' => $this->app->input('player'),
            'competitor' => $this->app->input('player'),
            'position' => $this->app->input('position'),
            'round' => $this->app->input('round'),
        ];

        $statement = $pdo->prepare($sqlTemplate);
        $statement->execute($values);


        // # https://www.php.net/manual/en/pdostatement.fetchall.php
        // dump($statement->fetchAll());


        return $this->app->redirect('/history=' . $history, ['history' => true]);
    }
}