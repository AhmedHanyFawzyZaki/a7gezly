<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');


return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'A7gezly',
    'defaultController' => 'home',
    //'homeUrl'=>'home',
    //new by salah for language
    'sourceLanguage' => 'en',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.YiiMailer.YiiMailer',
        /*         * * for gallery extesnion *** */
        'ext.galleryManager.*',
        'ext.galleryManager.models.*',
        'ext.galleryManager.GalleryController',
       'ext.EasyMultiLanguage.*',
    ),
    //'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('*', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'phpThumb' => array(
            'class' => 'ext.EPhpThumb.EPhpThumb.EPhpThumb',
        ),
        // to disable caching
        'components' => array(
            'assetManager' => array(
                'linkAssets' => false,
            ),
        ),
        /*         * *For gallery extension  ** */
        'widgetFactory' => array(
            'class' => 'CWidgetFactory',
            'widgets' => array(
                'GalleryManager' => array(
                    'controllerRoute' => '/gallery',
                ),
            )
        ),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/var/www/projects/PHPLib/ImageMagick-6.8.6-8'),
        ),
        'mailer' => array(
            'class' => 'ext.mail.Mailer',
        ),
        'Paypal' => array(
            'class' => 'application.components.Paypal',
            'apiUsername' => 'ahmed.hany.fawzy-facilitator_api1.hotmail.com',
            'apiPassword' => 'AA86G2K284HDV3L2',
            'apiSignature' => 'ArcoIsSBiDf1YkCyrHH34-M8jKo3AhzsU7eWzVM9-3t50NlXZqMw6JiR',
            'apiLive' => false,
            'returnUrl' => 'Home/confirm/', //regardless of url management component
            'cancelUrl' => 'Home/cancel/', //regardless of url management component
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
     'class' => 'EMUrlManager',
            'showScriptName' => false,
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '_<slug>' => 'home/test',
                'admin' => 'admin/dashboard',
                'dashboard' => 'admin/dashboard',
                'trips-<slug>' => 'home/locationTrips',
                'trip-<slug>' => 'home/tripDetails',
                 'category-<slug>' => 'home/categoryTrips',
                 'comment-<slug>' => 'home/addComment',
                
                
            ),
        ),
        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=e7gzly',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'home/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages


            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
      
      
              /////////////////////////////////// facebook login and register
    'facebook'=>array(
      'class' => 'ext.yii-facebook-opengraph.SFacebook',
      'appId'=>'1496410543921343', // needed for JS SDK, Social Plugins and PHP SDK
      'secret'=>'67a87e9dc3300cf8e707838d3fe543f0', // needed for the PHP SDK
      'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
      ),
      ////end facebook
      
      
      
      
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
      //'adminEmail' => 'test@ukprosolutions.com',
        'webSite' => 'http://test.com/e7gzly',
     'languages' => array(
            'en' => 'English',
            'ar' => 'العربية',
        ),
        'default_language' => 'ar',
    ),
);
