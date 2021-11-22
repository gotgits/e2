<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    private $productsObj;
    # Create a construct method to set up a productsObj property that can be used across different methods
    public function __construct($app)
    {
        parent::__construct($app);
        $this->productsObj = new Products($this->app->path('database/products.json'));
    }
    public function index()
    {
        # Docs App methods
        // $productsObj = new Products($this->app->path('/database/products.json'));
        $products = $this->productsObj->getAll();
        return $this->app->view('products/index', ['products' => $products]);

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
        $sku = $this->app->param('sku');
        
        # above is terse version for an absolute path instance, using the param method to retrieve route parameters/query string values:
        # this is the absolute path:
        // $productsObj = new Products($this->app->path('/database/products.json'))
        # which replaces a relative path:
        //  $productsObj = new Products('../database/products.json');
        # dump($$_GET['sku]);
        # dump($this->app->param('sku'));
        
        if (is_null($sku)) {
            $this->app->redirect('/products');
        }
        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('products/missing');
        }
        # accessing the data from variable in the saveReview method below
        $reviewSaved = $this->app->old('reviewSaved');
        # then make sure it is available to the view
        return $this->app->view(
            'products/show',
            ['product' => $product,
            'reviewSaved' => $reviewSaved
        ]
        );
    }
    public function saveReview()
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
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200|maxLength:300'
        ]);

 

        # If the above validation checks fail
        # The user is redirected back to where they came from (/product)
        # None of the code that follows will be executed

        # if using $_GET or $POST superglobals, //dump($_POST['sku']);
        # instead use input() from the framework, allows for second parameter
        //dump($this->app->input('sku',''));
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $review = $this->app->input('review');
        # Todo: Persist review to the database...
        # confirmation message, redirect data persisted or specifically flashed to the session or exist in the session for a single page request and then is deleted upon refresh with a second parameter expecting an array

        # Write a SQL query
        $sql = "SELECT * FROM reviews";

        # Execute the statement, getting the result set as a PDOStatement obect
        # https://www.php.net/manual/en/pdo.query.php
        $statement = $pdo->query($sql);

        $sqlTemplate = "INSERT INTO reviews (sku, name, review) 
        VALUES (:sku, :name, :review)";

        $values = [
            'sku' => $this->app->input('sku'),
            'name' => $this->app->input('name'),
            'review' => $this->app->input('review'),
        ];

        $statement = $pdo->prepare($sqlTemplate);
        $statement->execute($values);


        // # https://www.php.net/manual/en/pdostatement.fetchall.php
        // dump($statement->fetchAll());


        return $this->app->redirect('/product?sku=' . $sku, ['reviewSaved' => true]);
    }
}