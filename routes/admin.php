<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\RoleController;
use \App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TermsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\BootFaqController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\LastNewsController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\MainCategoryController;
use App\Http\Controllers\admin\NotificationController;
use \App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\PublicSettingController;
use App\Http\Controllers\admin\SupportTicketsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Admin Login

    Route::controller(AdminController::class)->group(function () {
        Route::match(['post', 'get'], '/', 'login')->name('admin_login');
        Route::match(['post', 'get'], 'login', 'login')->name('admin_login');
        // Admin Dashboard
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('dashboard', 'dashboard')->name('dashboard.welcome');
            // update admin password
            Route::match(['post', 'get'], 'update_admin_password', 'update_admin_password');
            // check Admin Password
            Route::post('check_admin_password', 'check_admin_password');
            // Update Admin Details
            Route::match(['post', 'get'], 'update_admin_details', 'update_admin_details');
            Route::get('logout', 'logout')->name('logout');
        });
    });
    Route::group(['middleware' => 'auth:admin'], function () {

        ///////////////// Start Public Settings
        ///

        Route::controller(PublicSettingController::class)->group(function () {
            Route::match(['post', 'get'], 'public-setting/update', 'update');
        });


        ///////////// Start Main Categories
        Route::controller(MainCategoryController::class)->group(function () {
            Route::get('main-categories', 'index');
            Route::match(['post', 'get'], 'main-category/add', 'store');
            Route::match(['post', 'get'], 'main-category/update/{id}', 'update');
            Route::post('main-category/delete/{id}', 'delete');
        });

        ///////////////////// Start Sub Categories

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('sub-categories/{id}', 'index');
            Route::match(['post', 'get'], 'sub-category/add/{id}', 'store');
            Route::match(['post', 'get'], 'sub-category/update/{id}', 'update');
            Route::post('sub-category/delete/{id}', 'delete');
        });

        ////////////////////// Start Products ///////////////////////////////
        Route::controller(ProductController::class)->group(function () {
            Route::get('products', 'index');
            Route::match(['post', 'get'], 'product/add', 'store');
            Route::match(['post', 'get'], 'product/update/{slug}', 'update')->name('product.update');
            Route::post('product/delete/{id}', 'delete');
            Route::get('/get-attribute-values/{attributeId}', 'getAttributeValues');
            Route::get('/get-subcategories', 'getSubCategories')->name('get.subcategories');

            Route::match(['post', 'get'], 'follow', 'follow');
        });
        //////////////// Start Faq Controller ////////////////////
        ///
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/add', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
        ///////////////////  Start Blog Category //////////////////
        ///
        Route::controller(BlogCategoryController::class)->group(function () {
            Route::get('blog_category', 'index');
            Route::match(['post', 'get'], 'blog_category/add', 'store');
            Route::match(['post', 'get'], 'blog_category/update/{id}', 'update');
            Route::post('blog_category/delete/{id}', 'delete');
        });
        ///////////////////  Start Blog //////////////////
        ///
        Route::controller(BlogController::class)->group(function () {
            Route::get('blogs', 'index');
            Route::match(['post', 'get'], 'blog/add', 'store');
            Route::match(['post', 'get'], 'blog/update/{id}', 'update');
            Route::post('blog/delete/{id}', 'delete');
        });
        //////////////// Start Reviews //////////////////////
        ///
        Route::group(['as' => 'reviews.', 'can' => 'reviews'], function () {
            Route::controller(ReviewController::class)->group(function () {
                Route::get('reviews', 'index');
                Route::match(['post', 'get'], 'review/store', 'store');
                Route::match(['post', 'get'], 'review/update/{id}', 'update');
                Route::post('review/delete/{id}', 'delete');
            });
        });
        ################################## Start Terms Pages ################
        Route::controller(TermsController::class)->group(function () {
            Route::match(['post', 'get'], 'terms', 'Terms');
            Route::match(['post', 'get'], 'return-policy', 'ReturnPolicy');
            Route::match(['post', 'get'], 'privacy-policy', 'PrivacyPolicy');
        });
        ################################## End Terms Pages ###################

        ########################### Start Providers ############################
        Route::controller(ProviderController::class)->group(function () {
            Route::get('providers', 'index');
            Route::match(['post', 'get'], 'provider/add', 'store');
            Route::match(['post', 'get'], 'provider/update/{id}', 'update');
            Route::post('provider/delete/{id}', 'delete');
        });
        ########################### End Providers ############################

        ########################## Start Orders #######################
        Route::controller(OrdersController::class)->group(function () {
            Route::get('orders', 'index');
        });
        ########################### End Orders #######################

        ######################### Start Users Controllers ###########

        Route::controller(UsersController::class)->group(function () {
            Route::get('users', 'index');
            Route::match(['post', 'get'], 'user/add', 'store');
            Route::get('user/show/{id}', 'show');
            Route::post('user/addbalance/{id}', 'AddBalance');
            Route::post('user/deletebalance/{id}', 'DeleteBalance');
            Route::match(['post', 'get'], 'user/ban/{id}', 'Ban')->name('user.ban');
            Route::match(['post', 'get'], 'user/unban/{id}', 'Unban')->name('user.unban');
        });
        ####################### End User Controllers ##################

        ########################## Start Employeers Controllers #######################
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('employees', 'index');
            Route::match(['post', 'get'], 'employee/add', 'store');
            Route::match(['post', 'get'], 'employee/update/{id}', 'update');
            Route::post('employee/delete/{id}', 'delete');
        });
        ############################ End Employeers Controlles ####################
        ############################# Start Roles #########################
        Route::controller(RoleController::class)->group(function () {
            Route::get('roles', 'index');
            Route::match(['post', 'get'], 'role/add', 'store');
            Route::match(['post', 'get'], 'role/update/{id}', 'update');
            Route::post('role/delete/{id}', 'destroy');
        });
        ############################# End Roles ############################

        ############################ Start Last News ####################

        Route::controller(LastNewsController::class)->group(function () {
            Route::get('news', 'index');
            Route::match(['post', 'get'], 'news/add', 'store');
            Route::match(['post', 'get'], 'news/update/{id}', 'update');
            Route::post('news/delete/{id}', 'delete');
        });
        ############################ End Last News ######################

        ############################ Start Chat Boot ##################
        Route::controller(BootFaqController::class)->group(function () {
            Route::get('bootfaqs', 'index');
            Route::match(['post', 'get'], 'bootfaq/add', 'store');
            Route::match(['post', 'get'], 'bootfaq/update/{id}', 'update');
            Route::post('bootfaq/delete/{id}', 'delete');
        });
        ############################ End Chart Boot ####################
        ############################ Start Notifications ##################
        Route::controller(NotificationController::class)->group(function () {
            Route::get('notifications', 'index');
            Route::match(['post', 'get'], 'notification/add', 'store');
            Route::match(['post', 'get'], 'notification/update/{id}', 'update');
            Route::post('notification/delete/{id}', 'delete');
        });
        ################### Start Support Ticket Controller ################
        Route::group(['prefix' => 'support', 'as' => 'support.', 'can' => 'support'], function () {
            Route::controller(SupportTicketsController::class)->group(function () {
                Route::get('tickets', 'index');
                Route::get('ticket-show/{id}', 'showTicket');
                Route::match(['post', 'get'], 'send-message/{id}', 'sendMessage');
            });
        });
        ################### End Support Ticket Controller ##################
    });
});
