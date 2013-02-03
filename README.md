Example application using Zend\Permissions\Rbac
===============================================

Setup
-----

1. Clone this repo, run `composer.phar install`

2. Create database (change root according to your setup):

    mysql -u root -p -e "CREATE DATABASE zend_rbac_test"

3. Init tables:

    php vendor/bin/doctrine-module orm:schema-tool:create

4. Open RbacTest in your browser, go to "registration page" (should be similar to http://localhost/zend-rbac-test/public/user/register)

5. Register test user

6. Experiment :-) following routes are available:

    /public-area
    /members-only
    /administration