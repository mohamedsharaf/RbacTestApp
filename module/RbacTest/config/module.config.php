<?php

return array(
    'router' => array(
        'routes' => array(
            'public-area' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/public-area',
                    'defaults' => array(
                        'controller' => 'RbacTest\Controller\Index',
                        'action'     => 'public-area',
                    ),
                ),
            ),
            'members-only' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/public-area',
                    'defaults' => array(
                        'controller' => 'RbacTest\Controller\Index',
                        'action'     => 'members-only',
                    ),
                ),
            ),
            'administration' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/administration',
                    'defaults' => array(
                        'controller' => 'RbacTest\Controller\Index',
                        'action'     => 'administration',
                    ),
                ),
            ),
        ),
    ),

    // tell ZfcUser that we'll override default user entity
    'zfcuser' => array(
        'enable_default_entities' => false,
        'user_entity_class' => 'RbacTest\Entity\User',
    ),

    // tell doctrine where to find custom user entity
    'doctrine' => array(
        'driver' => array(
            'rbactest_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/RbacTest/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'RbacTest\Entity' => 'rbactest_annotation_driver'
                )
            )
        )
    ),

    // add test controller
    'controllers' => array(
        'invokables' => array(
            'RbacTest\Controller\Index' => 'RbacTest\Controller\IndexController'
        ),
    ),

    // add view directory from this module to template path stack
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
