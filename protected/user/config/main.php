<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$user = dirname(dirname(__FILE__));
Yii::setPathOfAlias('user', $user);
return array(
    'basePath' => dirname($user),
    'runtimePath' => $user . '/runtime',
    'controllerPath' => $user . '/controllers',
    'viewPath' => $user . '/views',
    'name' => 'Laksyah',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'user.components.*',
        'user.controllers.*',
        'user.views.*',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/',
                    'js' => array('jquery.min.js'),
                )
            ),
        // other clientScript config
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'selectedPageCssClass' => 'active',
                    'prevPageLabel' => '<i class="fa fa-angle-left" aria-hidden="true" style="font-size: 15px;font-weight:bold;"></i>',
                    'nextPageLabel' => '<i class="fa fa-angle-right" aria-hidden="true" style="font-size: 15px;font-weight:bold;"></i>',
                    'firstPageLabel' => '<i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 15px;font-weight:bold;"></i>',
                    'lastPageLabel' => '<i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 15px;font-weight:bold;"></i>',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    )
                )
            )
        ),
        'Upload' => array('class' => 'UploadFile'),
        'Currency' => array('class' => 'Converter'),
        'Discount' => array('class' => 'DiscountPrice'),
        'Menu' => array('class' => 'MenuCategory'),
        'user' => array(
// enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
//        'db' => array(
//            'connectionString' => 'mysql:host=localhost;dbname=vijaymasala',
//            'emulatePrepare' => true,
//            'username' => 'root',
//            'password' => 'mysql',
//            'charset' => 'utf8',
//        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    'params' => array(
// this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);

