<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
$routes->scope('/api', function (RouteBuilder $routes) {
    $routes->setExtensions(['json']);
   
    $routes->resources('Intersecciones', [
        'map' => [
            'disable' => [
                'action' => 'disable',
                'method' => 'POST'
            ],
            'enable' => [
                'action' => 'enable',
                'method' => 'POST'
            ],
            'getEnabled' => [
                'action' => 'getEnabled',
                'method' => 'GET'
            ],
            'getWithActividades' => [
                'action' => 'getWithActividades',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Actividades', [
        'map' => [
            ':actividadesTipoId/getPendientes' => [
                'action' => 'getPendientes',
                'method' => 'GET'
            ],
            'report' => [
                'action' => 'report',
                'method' => 'POST'
            ],
            'disable' => [
                'action' => 'disable',
                'method' => 'POST'
            ],
            'enable' => [
                'action' => 'enable',
                'method' => 'POST'
            ],
            'register' => [
                'action' => 'register',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('ActividadesTipos', [
        'map' => [
            'getList' => [
                'action' => 'getList',
                'method' => 'GET'
            ],
            'enable' => [
                'action' => 'enable',
                'method' => 'POST'
            ],
            'disable' => [
                'action' => 'disable',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Trabajadores', [
        'map' => [
            'getList' => [
                'action' => 'getList',
                'method' => 'GET'
            ],
            'enable' => [
                'action' => 'enable',
                'method' => 'POST'
            ],
            'disable' => [
                'action' => 'disable',
                'method' => 'POST'
            ],
            'getWithoutUser' => [
                'action' => 'getWithoutUser',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Tareas', [
        'map' => [
            'getPendientesByActividad/:actividad_id' => [
                'action' => 'getPendientesByActividad',
                'method' => 'GET'
            ],
            'getRealizadasByActividad/:actividad_id' => [
                'action' => 'getRealizadasByActividad',
                'method' => 'GET'
            ]
        ]
    ]);
    $routes->resources('Trabajos', [
        'map' => [
            'register' => [
                'action' => 'register',
                'method' => 'POST'
            ]
        ]
    ]);
    $routes->resources('Users', [
        'map' => [
            'login' => [
                'action' => 'login',
                'method' => 'POST'
            ],
            'enable' => [
                'action' => 'enable',
                'method' => 'POST'
            ],
            'disable' => [
                'action' => 'disable',
                'method' => 'POST'
            ]
        ]
    ]);
});