Example application using Zend\Permissions\Rbac
===============================================

Setup
-----

1. Clone this repo, run `composer.phar install`

2. Create database (change root according to your setup):

    `mysql -u root -p -e "CREATE DATABASE zend_rbac_test"`

3. Configure database connection by creating config/autoload/database.local.php file, with following contents:

    ```php
    <?php
    return array(
        'doctrine' => array(
            'connection' => array(
                'orm_default' => array(
                    'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => array(
                        'host'     => 'localhost',
                        'port'     => '3306',
                        'user'     => 'YOUR_DATABASE_USER',
                        'password' => 'YOUR_DATABASE_PASSWORD',
                        'dbname'   => 'zend_rbac_test',
                    )
                )
            ),
        ),
    );
    ```

4. Init tables:

    `php vendor/bin/doctrine-module orm:schema-tool:create`

5. Open RbacTest in your browser, go to "registration page" (should be similar to http://localhost/zend-rbac-test/public/user/register)

6. Register test user

7. Experiment :-) following routes are available:

    ```
    /public-area
    /members-only
    /administration
    ```
