<?php

return array(
    # definir e gerenciar controllers
    'controllers' => array(
        'invokables' => array(
            'HomeController' => 'Laudo\Controller\HomeController',
            'MenuController' => 'Laudo\View\Helper\MenuAtivo',
            'LaudosController' => 'Laudo\Controller\LaudosController'
        ),
    ),
    # definir e gerenciar rotas
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'index',
                    ),
                ),
            ),
            # literal para action sobre home
            'sobre' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sobre',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'sobre',
                    ),
                ),
            ),
            'laudos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/laudos[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'LaudosController',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    # definir e gerenciar servicos
    'service_manager' => array(
        'factories' => array(
        #'translator' => 'ZendI18nTranslatorTranslatorServiceFactory',
        ),
    ),
    # definir e gerenciar layouts, erros, exceptions, doctype base
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'laudo/home/index' => __DIR__ . '/../view/laudo/home/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
