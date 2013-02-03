Example application using Zend\Permissions\Rbac
===============================================

Setup
-----

1. Clone this repo, run `composer.phar install`

2. Create database (change root according to your setup):

    mysql -u root -p -e "CREATE DATABASE zend_rbac_test"

3. Init tables:

    php vendor/bin/doctrine-module orm:schema-tool:create