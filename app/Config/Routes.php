<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('admin', function($routes)
{
	$routes->get('/', 'Admin::index');
    $routes->get('login', 'Admin::login');
    $routes->get('logout', 'Admin::logout');
    $routes->get('profile', 'Admin::profile');
	$routes->get('posts', 'Admin::posts');
	$routes->get('users', 'Admin::users');
	$routes->get('create', 'Admin::create');
	$routes->get('savePost', 'Admin::savePost');
	$routes->get('get_users', 'Admin::get_users');
	$routes->get('get_posts', 'Admin::get_posts');
});
$routes->get('test', 'Upload::index');
$routes->get('contact', 'Contact::index');
$routes->get('about', 'About::index');
$routes->match(['get','post'], 'blog/create', 'Blog::create');
$routes->get('blog/(:segment)','Blog::view/$1');
$routes->get('blog', 'Blog::index');
$routes->get('(:any)', 'Blog::view/$1');
$routes->post('comment/(:any)', 'Comment::saveComment');
// $routes->post('comment/(:any)/(:any)', 'Reply::saveReply');
$routes->post('reply/(:any)', 'Reply::saveReply');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
