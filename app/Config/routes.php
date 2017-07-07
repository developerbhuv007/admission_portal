<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'FetProfiler', 'action' => 'login'));
	Router::connect('/fet-profiler/logout',array('controller' => 'FetProfiler', 'action' => 'logout'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/fet-profiler',array('controller' => 'FetProfiler', 'action' => 'index'));
	Router::connect('/fet-profiler/faculty',array('controller' => 'FetProfiler', 'action' => 'faculty'));
	Router::connect('/fet-profiler/student',array('controller' => 'FetProfiler', 'action' => 'student'));
	Router::connect('/fet-profiler/students',array('controller' => 'FetProfiler', 'action' => 'getData'));
	Router::connect('/fet-profiler/staff',array('controller' => 'FetProfiler', 'action' => 'getStaffData'));
	Router::connect('/fet-profiler/students/:id',array('controller' => 'FetProfiler', 'action' => 'student'),array('pass' => array('id')));
	Router::connect('/fet-profiler/error-page',array('controller' => 'FetProfiler', 'action' => 'errorpage'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
