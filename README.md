```php
    session_start();
    ob_start();

    define('DB_HOST', 'xxx');
    define('DB_USER', 'xxx');
    define('DB_PASS', 'xxx');
    define('DB_NAME', 'xxx');

    // spl_autoload_register(function ($class) {
    //     include 'class' . PATH_SEPARATOR . $class . '.class.php';
    // });

    function my_autoloader($className) {
        include 'class/' . $className . '.class.php';
    };

    spl_autoload_register('my_autoloader');
    define('UPLOAD_FILES', 'images/');
```
