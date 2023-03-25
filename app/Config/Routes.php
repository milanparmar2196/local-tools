<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomepageController::index');
$routes->get('/category/(:num)', 'HomepageController::category');
$routes->get('/get-posts', 'HomepageController::getPosts');
$routes->get('/get-zipcodes', 'HomepageController::getZipcodes');
$routes->get('lang/{locale}', 'Language::index');
$routes->get('login', 'Home::login');
$routes->match(['get', 'post'], 'Home/loginAuth', 'Home::loginAuth');
$routes->get('register', 'Home::register');
$routes->match(['get', 'post'], 'Home/insert', 'Home::insert');
 
$routes->get('logout', 'Home::Logout');

$routes->get('forgot-password', 'Home::ForgotPassword');
$routes->match(['get', 'post'], '/password_reset', 'Home::password_reset');
// Reset Password
$routes->get('/reset_password', 'Home::reset_password');
$routes->match(['get', 'post'], '/change_password', 'Home::change_password');

/*---------------------------------
************ Product routes ************************
-----------------------------------*/
$routes->get('/product/(:any)', 'ProductController::index/$1');
// Product Add to cart
$routes->match(['get', 'post'], '/cart/add_to_cart', 'ProductController::add_to_cart');

/*---------------------------------
************************************
-----------------------------------*/
// cart
$routes->match(['get', 'post'], '/product/cart', 'CartController::sendcart');
$routes->match(['get', 'post'], '/cart', 'CartController::index');

//   Checkout Routes
$routes->match(['get', 'post'], '/checkout', 'Checkout::index');

/*---------------------------------
************************************
-----------------------------------*/

// Business User Routes
/*$routes->group('seller', static function ($routes) {
    $routes->get('profile', 'Business\BusinessController::index');
    $routes->get('blog', 'Admin\Blog::index');
});*/

    $routes->group("seller",['filter' => 'authGuard'], function ($routes) {

    //user profile
    $routes->get("/", "Seller\SellerController::index");
    $routes->get("profile", "Seller\SellerController::index");
    $routes->get("manage-profile", "Seller\SellerController::manage_profile");
    $routes->match(['get','post'], 'update-profile', 'Seller\SellerController::update_profile');
    $routes->get('change-password', 'Seller\SellerController::change_password');
    $routes->match(['get','post'], 'update-password', 'Seller\SellerController::update_password');
    $routes->match(['get','post'], 'document', 'Seller\SellerController::document');
    $routes->match(['get','post'], 'seller-account', 'Seller\SellerController::seller_account');
    $routes->match(['get','post'], 'add-product', 'Seller\SellerProductController::index');
    $routes->match(['get','post'], 'SellerProductController/get_subcategory', 'Seller\SellerProductController::get_subcategory');
    $routes->match(['get','post'], 'SellerProductController/get_state', 'Seller\SellerProductController::get_state');
    $routes->match(['get','post'], 'SellerProductController/get_city', 'Seller\SellerProductController::get_city');
    $routes->match(['get','post'], 'add_posts', 'Seller\SellerProductController::add_posts');
    $routes->match(['get','post'], 'SellerProductController/get_price', 'Seller\SellerProductController::get_price');

	


    });
    
    $routes->group("buyer",['filter' => 'authGuard'], function ($routes) {
    $routes->get("profile", "Buyer\BuyerController::index");  
    $routes->get("manage-profile", "Buyer\BuyerController::manage_profile");
    $routes->match(['get','post'], 'update-profile', 'Buyer\BuyerController::update_profile');
    $routes->get('change-password', 'Buyer\BuyerController::change_password');
    $routes->match(['get','post'], 'update-password', 'Buyer\BuyerController::update_password');
    $routes->match(['get','post'], 'document', 'Buyer\BuyerController::document');
    $routes->get('buyer-account', 'Buyer\BuyerController::buyer_account');
    $routes->get('buyer-orders', 'Buyer\BuyerController::buyer_orders');
    $routes->match(['get','post'], 'buyer_orders', 'Buyer\BuyerController::buyer_orders');   
    $routes->match(['get','post'], 'orders_modal', 'Buyer\BuyerController::orders_modal');    
    $routes->match(['get','post'], 'buyer_invoices', 'Buyer\BuyerController::buyer_invoices');
    $routes->match(['get','post'], 'invoicedetails_modal', 'Buyer\BuyerController::invoicedetails_modal');
});

$routes->match(['get','post'], 'payments', 'Common::payments'); 
$routes->match(['get','post'], '/addnewbank', 'Common::addnewbank');
$routes->get('/editpaidbank', 'Common::editpaidbank');

$routes->match(['get','post'], 'billings', 'Common::billings'); 
$routes->match(['get','post'], '/addbilling', 'Common::addbilling');
$routes->get('/editbilling', 'Common::editbilling');


$routes->match(['get','post'], 'notification', 'Common::notification'); 


/*--- */
 $routes->get('orders', 'Seller\SellerController::orders');
$routes->match(['get','post'], 'orders', 'Seller\SellerController::orders');   
$routes->match(['get','post'], 'orders_modals', 'Seller\SellerController::orders_modals');    
$routes->match(['get','post'], 'invoices', 'Seller\SellerController::invoices');
$routes->match(['get','post'], 'invoicedetails_modals', 'Seller\SellerController::invoicedetails_modals');
$routes->match(['get','post'], 'allnotifications', 'Common::allnotifications');
$routes->match(['get','post'], 'deletenotifications', 'Common::deletenotifications');
$routes->match(['get','post'], 'deleteproduct', 'Seller\SellerController::deleteproduct');
$routes->match(['get','post'], 'changestatus', 'Seller\SellerController::changestatus');

$routes->match(['get','post'], 'products', 'Seller\SellerController::products');
$routes->match(['get','post'], 'membership', 'Seller\SellerController::membership');

/*-- */

/* ---------------------------------
    ************************************
----------- USer routes  ------------- */
$routes->get('/profile', 'Profile::index', ['filter' => 'authGuard']);

// Admin routes

$routes->match(['get', 'post'], 'admin_login', 'UserController::admin_login', ["filter" => "noauth"]);

$routes->group("admin", ["filter" => "auth"], function ($routes) {
    // users
    $routes->get("/", "Admin\AdminController::index");
    $routes->get("logout", "UserController::logout");
    $routes->get("users", "Admin\UserController::users");
    $routes->match(['get','post'], 'update_status', 'Admin\UserController::update_status');
    $routes->get('users/(:num)', 'Admin\UserController::users_data/$1');
    
    // category routes

    $routes->get("category", "Admin\CategoryController::index");
    $routes->match(['get','post'], 'category/create', 'Admin\CategoryController::create_category');
    $routes->match(['get','post'], 'category/create-sub-category', 'Admin\CategoryController::create_subcategory');
    $routes->match(['get','post'], 'category/update_status', 'Admin\CategoryController::update_status');
    $routes->match(['get','post'], 'category/delete_category', 'Admin\CategoryController::delete_category');
    $routes->get('category/(:num)/edit', 'Admin\CategoryController::edit_category/$1');
    $routes->get('category/(:num)/edit-sub-category', 'Admin\CategoryController::edit_subcategory/$1');
    $routes->match(['get','post'], 'category/update', 'Admin\CategoryController::update');
    $routes->match(['get','post'], 'category/update-sub-category', 'Admin\CategoryController::update_sub_category');
    $routes->get('category/(:num)/view_subcategory', 'Admin\CategoryController::view_subcategory/$1');
    
    // Brands Rotes

    $routes->get("brands", "Admin\BrandsController::index");
    $routes->get("brands/create", "Admin\BrandsController::brand");
    $routes->match(['get','post'], 'brands/createbrands', 'Admin\BrandsController::create_brands');
    $routes->match(['get','post'], 'brands/update_status', 'Admin\BrandsController::update_status');
    $routes->match(['get','post'], 'category/delete_brand', 'Admin\BrandsController::delete_brand');
    $routes->get('brand/(:num)/edit', 'Admin\BrandsController::edit/$1');
    $routes->match(['get','post'], 'brands/updatebrands', 'Admin\BrandsController::update_brands');

    // Taxes

    $routes->get("tax", "Admin\TaxController::index");
    $routes->get("tax/create-tax", "Admin\TaxController::create_tax");
    $routes->match(['get','post'], 'tax/create', 'Admin\TaxController::create');
    $routes->match(['get','post'], 'tax/update_status', 'Admin\TaxController::update_status');
    $routes->match(['get','post'], 'tax/delete_tax', 'Admin\TaxController::delete_tax');
    $routes->get('tax/(:num)/edit', 'Admin\TaxController::edit/$1');
    $routes->match(['get','post'], 'tax/updatetax', 'Admin\TaxController::update_tax');

    // Subscription Plans

    $routes->get("subscription", "Admin\SubscriptionStore::index");
    $routes->get("subscription/create-plan", "Admin\SubscriptionStore::create_subscription_plan");
    $routes->match(['get','post'], 'subscription/create', 'Admin\SubscriptionStore::create');
    $routes->match(['get','post'], 'subscription/update_status', 'Admin\SubscriptionStore::update_status');
    $routes->match(['get','post'], 'subscription/delete_plan', 'Admin\SubscriptionStore::delete_plan');
    $routes->get('subscription/(:num)/edit', 'Admin\SubscriptionStore::edit/$1');
    $routes->match(['get','post'], 'subscription/update-plan', 'Admin\SubscriptionStore::update_plan');


});


// Editor routes
$routes->group("editor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "EditorController::index");
});
$routes->get('logout', 'UserController::logout');

//...

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
