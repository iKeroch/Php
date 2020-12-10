<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->add('/perfil', 'Home::profile');

//Rotas de autenticacao
$routes->add('/auth/cadastro', 'AuthController::register');
$routes->add('/auth/entrar', 'AuthController::login');
$routes->add('/auth/sair', 'AuthController::logout');
$routes->add('/auth/esqueci-senha', 'AuthController::forget');
$routes->add('/auth/redefinir/(:any)', 'AuthController::reset/$1');
$routes->add('/auth/redefinir', 'AuthController::reset');

//Rotas da plataforma

$routes->add('/plataforma', 'UserController::index');
$routes->add('/usuarios/deletar/(:any)', 'UserController::delete/$1');
$routes->add('/usuarios/criar', 'UserController::create');
$routes->add('/usuarios', 'UserController::index');
$routes->add('/usuarios/(:any)', 'UserController::edit/$1');

//Rotas de estudos
$routes->add('/estudos', 'StudyController::index');
$routes->add('/estudos/quiz', 'StudyController::quiz');

//Rotas do calendario

$routes->add('/calendario', 'CalendarController::index');
$routes->add('/calendario/deleta/(:any)', 'CalendarController::delete/$1');
$routes->add('/calendario/criar', 'CalendarController::criar');

$routes->add('/sapatilhas', 'SBalletShoesController::index');
$routes->add('/alongamentos', 'AlongamentoController::index');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
