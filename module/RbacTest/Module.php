<?php

namespace RbacTest;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Permissions\Rbac\Rbac;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $events = $e->getApplication()->getEventManager();
        $strategy = new View\AccessDeniedStrategy();
        $events->attach($strategy);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'rbac' => function ($sm) {
                    $serviceLocator = $sm->getServiceLocator();
                    $rbac = $serviceLocator->get('Zend\Permissions\Rbac\Rbac');
                    $plugin = new Controller\Plugin\Rbac($rbac);
                    return $plugin;
                },
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Permissions\Rbac\Rbac' => function() {
                    $rbac = new Rbac();

                    $rbac->addRole('guest');
                    $rbac->addRole('member', 'guest');
                    $rbac->addRole('admin', 'member');

                    return $rbac;
                }
            )
        );
    }
}
