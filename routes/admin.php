<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\RoleController;
use \App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TermsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\admin\BootFaqController;
use App\Http\Controllers\admin\ExpenseController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\LastNewsController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\admin\HandPaymentController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\MainCategoryController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\PaymentCardsController;
use \App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\PublicSettingController;
use App\Http\Controllers\admin\PaymentMethodsController;
use App\Http\Controllers\admin\SupportTicketsController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Admin Login
    Route::controller(AdminController::class)->group(function () {
        Route::match(['post', 'get'], '/', 'login')->name('admin_login');
        Route::match(['post', 'get'], 'login', 'login')->name('admin_login');
        // Admin Dashboard
        Route::group(['middleware' => 'auth:admin'], function () {
            // update admin password
            Route::match(['post', 'get'], 'update_admin_password', 'update_admin_password');
            // check Admin Password
            Route::post('check_admin_password', 'check_admin_password');
            // Update Admin Details
            Route::match(['post', 'get'], 'update_admin_details', 'update_admin_details');
            Route::get('logout', 'logout')->name('logout');
        });
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('dashboard', 'dashboard')->name('dashboard.welcome');
        });
    });

    Route::group(['middleware' => 'auth:admin'], function () {

        ///////////////// Start Public Settings
        ///

        Route::controller(PublicSettingController::class)->group(function () {
            Route::match(['post', 'get'], 'public-setting/update', 'update');
            Route::match(['post', 'get'], 'public-setting/seo-data', 'updateSeo');
            Route::match(['post', 'get'], 'public-setting/robots-data', 'updateRobots');
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
        Route::group(['can' => 'products'], function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('products', 'index');
                Route::match(['post', 'get'], 'product/add', 'store');
                Route::match(['post', 'get'], 'product/update/{slug}', 'update')->name('product.update');
                Route::post('product/delete/{id}', 'delete');
                Route::get('/get-attribute-values/{attributeId}', 'getAttributeValues');
                Route::get('/get-subcategories', 'getSubCategories')->name('get.subcategories');
                Route::match(['post', 'get'], 'follow', 'follow');
            });
        });
          ///////////////////  Start Blog Category //////////////////
        ///
        Route::group(['can' => 'blog'], function () {
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
            Route::get('blog/schedule', 'schedule');
            Route::get('blog/archived', 'archived');
        });
        });
        //////////////// Start Faq Controller ////////////////////
        ///
        Route::group(['can' => 'faqs'], function () {
        Route::controller(FaqController::class)->group(function () {
            Route::get('faqs', 'index');
            Route::match(['post', 'get'], 'faq/add', 'store');
            Route::match(['post', 'get'], 'faq/update/{id}', 'update');
            Route::post('faq/delete/{id}', 'delete');
        });
    });

        //////////////// Start Reviews //////////////////////
        ///
        Route::group(['as' => 'reviews.', 'can' => 'reviews'], function () {
            Route::controller(ReviewController::class)->group(function () {
                Route::get('reviews', 'index');
                Route::match(['post', 'get'], 'review/store', 'store');
                Route::match(['post', 'get'], 'review/update/{id}', 'update');
                Route::match(['post', 'get'], 'review/status/{id}', 'status');
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
            Route::get('order/show/{id}', 'show')->name('order.show');
            Route::post('order/delete/{id}','delete')->name('order.delete');
            Route::get('orders/status/{status}','OrdersStatus');
        });
        ########################### End Orders #######################

        ######################### Start Users Controllers ###########

        Route::controller(UsersController::class)->group(function () {
            Route::get('users', 'index');
            Route::match(['post', 'get'], 'user/add', 'store');
            Route::get('user/show/{id}', 'show')->name('user.show');
            Route::get('user/show/transactions/{id}', 'show')->name('user.show.transactions');
            Route::post('user/addbalance/{id}', 'AddBalance');
            Route::post('user/deletebalance/{id}', 'DeleteBalance');
            Route::match(['post', 'get'], 'user/ban/{id}', 'Ban')->name('user.ban');
            Route::match(['post', 'get'], 'user/unban/{id}', 'Unban')->name('user.unban');
        });
        ####################### End User Controllers ##################

        ########################## Start Employeers Controllers #######################
        Route::group(['can' => 'employees'], function () {
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('employees', 'index');
            Route::match(['post', 'get'], 'employee/add', 'store');
            Route::match(['post', 'get'], 'employee/update/{id}', 'update');
            Route::post('employee/delete/{id}', 'delete');
        });
    });
        ############################ End Employeers Controlles ####################
        ############################# Start Roles #########################
        Route::group(['can' => 'roles'], function () {
            Route::controller(RoleController::class)->group(function () {
                Route::get('roles', 'index');
                Route::match(['post', 'get'], 'role/add', 'store');
                Route::match(['post', 'get'], 'role/update/{id}', 'update');
                Route::post('role/delete/{id}', 'destroy');
            });
        });
        ############################# End Roles ############################

        ############################ Start Last News ####################

        Route::group(['can' => 'news'], function () {
            Route::controller(LastNewsController::class)->group(function () {
                Route::get('news', 'index');
                Route::match(['post', 'get'], 'news/add', 'store');
                Route::match(['post', 'get'], 'news/update/{id}', 'update');
                Route::post('news/delete/{id}', 'delete');
            });
        });
        ############################ End Last News ######################

        ############################ Start Chat Boot ##################

        Route::group(['can' => 'boot'], function () {
            Route::controller(BootFaqController::class)->group(function () {
                Route::get('bootfaqs', 'index');
                Route::match(['post', 'get'], 'bootfaq/add', 'store');
                Route::match(['post', 'get'], 'bootfaq/update/{id}', 'update');
                Route::post('bootfaq/delete/{id}', 'delete');
            });
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
                Route::get('tickets/{status}', 'tickets')->where('status', 'all|purchases|orders|urgent|normal|answered|closed');
                Route::get('ticket-show/{id}', 'showTicket')->name('ticket_detail');
                Route::match(['post', 'get'], 'send-message/{id}', 'sendMessage')->name('send_message');
            });
        });
        ################### End Support Ticket Controller ##################
        ################### Start Reports Controller #######################
        Route::group(['prefix' => 'reports', 'as' => 'reports.', 'can' => 'reports'], function () {
            Route::controller(ReportController::class)->group(function () {
                Route::get('index', 'index');
            });
        });
        ################### End Reports Controller #########################

        ################### Start Wallet Controller #######################
        Route::group(['prefix' => 'wallet', 'as' => 'wallet.', 'can' => 'wallet'], function () {
            Route::controller(WalletController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                   ############## Payments Report ###########
                   Route::get('payments','WalletPayments');
                   Route::get('payment/show/{id}','PaymentShow');
            });
        });
        ################### End Wallet Controller #########################
           ################### Start Expense Controller #######################
           Route::group(['can' => 'expense'], function () {
            Route::controller(ExpenseController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['post', 'get'], 'expense/add', 'store');
                Route::match(['post', 'get'], 'expense/update/{id}', 'update');
                Route::post('expense/delete/{id}', 'delete');
            });
        });
        ################### End Expense Controller #########################
        ################## Start PaymentMethods Controller #################
        Route::controller(PaymentMethodsController::class)->group(function(){
            Route::get('wallet/payment-methods','index');
        });
        ################## End PaymentMethods Controller ###################

        ################ Start PaymentMethods Card #####################

        Route::controller(PaymentCardsController::class)->group(function(){
            Route::get('wallet/payments/card','index');
            Route::match(['post','get'],'wallet/payment/card/store','store');
            Route::match(['post','get'],'wallet/payment/card/update/{id}','update');
            Route::match(['post','get'],'wallet/payment/card/delete/{id}','delete');
        });
        ################# End PaymentMethods Card #####################

        ################ Start PaymentMethods Hand #####################

        Route::controller(HandPaymentController::class)->group(function(){
            Route::get('wallet/payments/hand','index');
            Route::match(['post','get'],'wallet/payment/hand/store','store');
            Route::match(['post','get'],'wallet/payment/hand/update/{id}','update');
            Route::match(['post','get'],'wallet/payment/hand/delete/{id}','delete');
        });
        ################# End PaymentMethods Hand #####################
        ################# Start Page Controller ######################
        Route::controller(PagesController::class)->group(function(){
            Route::get('pages','index');
            Route::match(['post','get'],'page/store','store');
            Route::match(['post','get'],'page/update/{id}','update');
            Route::match(['post','get'],'page/delete/{id}','delete');
        });
        ################## End Page Controller #######################
    });
});
