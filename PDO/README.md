# Connecting to 4D Server from PHP via PDO

This repository is a collection of information to help get connected to 4D Server from PHP.
It may be broken, it may not work, it may not help (hopefully it helps though).

### Requirements

On the 4D side you need:
* 4D Server
 * 4D's SQL Server must be started and accessible to the client (default port 19812)

On the PHP client side you need:
* PHP
* PDO_4D module


Note that SQL/ODBC connections to 4D Server will consume a 4D Client license in the absence of an Unlimited SQL license.


## PDO_4D Driver

PDO_4D is a driver for PHP Data Objects (PDO) interface to enable access from PHP to 4D databases.

Main distribution:
http://sources.4d.com/trac/4d_pdo4d

PECL:   
http://pecl.php.net/pdo_4d

Docs:  
http://php.net/pdo_4d   
http://php.net/pdo

Original SVN repository:  
http://svn.php.net/repository/pecl/pdo_4d/

Notable Forks on github:  
https://github.com/famsf/pecl-pdo-4d   
https://github.com/BespokeSupport/pecl-pdo-4d   
https://github.com/jasonpjohnson/pecl-pdo-4d   
https://github.com/benddailey/pecl-pdo-4d   
https://github.com/jeromeurban/pecl-pdo-4d   


#### Example Usage

    <?php
    $dsn = '4D:host=localhost;port=19812;charset=UTF-8';
    $user = 'Administrator';
    $pswd = 'test';
    $db = new PDO($dsn, $user, $pswd);
    $db->exec('CREATE TABLE IF NOT EXISTS myTable(id INT NOT NULL, value VARCHAR(100))');
    unset($db);
    echo 'done'; // if you see this then the code ran successfully
    ?>
