<?php


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth','isAdmin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

});


Route::group(['middleware' => ['auth']],function() {
    Route::get('/', function () {
        return View::make('welcome');
    });
    Route::group(['prefix' => 'customers', 'as' => 'customers.'], function(){
        
        // Route::get('manage/{id?}','Customer\CustomerManagerController@index');
        // Route::get('edit/{id}','Customer\CustomerManagerController@edit');
        // Route::get('new','Customer\CustomerManagerController@add');
        // Route::post('save','Customer\CustomerManagerController@store');


        Route::get('create','Customer\CustomerManagerController@create');
        Route::post('saveCustomerDetails','Customer\CustomerManagerController@saveCustomerDetails');
        Route::post('customerAjax','Customer\CustomerManagerController@customerAjax');
        Route::get('viewAllCustomers','Customer\CustomerManagerController@viewAllCustomers');
        Route::get('details/{id}','Customer\CustomerManagerController@show');
        Route::get('edit/{id}','Customer\CustomerManagerController@edit');
        Route::post('update/{id}','Customer\CustomerManagerController@update');
        
        
    });
    
    Route::group(['prefix' => 'sms', 'as' => 'sms.'], function(){
        Route::get('new','CRM\SMSController@start');
        Route::post('step-2','CRM\SMSController@confirmAudience');
        Route::post('step-3','CRM\SMSController@confirmMessage');
        Route::get('step-3','CRM\SMSController@confirmMessage');
        Route::post('test','CRM\SMSController@sendTest');
        Route::post('schedule','CRM\SMSController@scheduleMessage');
    });
    /* ##########-------------Grow Routes--------------############*/
    Route::group(['prefix' => 'grow', 'as' => 'grow.'], function(){
        Route::get('index','Custom\GrowController@index');
        Route::get('growArea','Custom\GrowController@growArea');
        Route::get('settings/room','Custom\GrowController@room');

        Route::get('settings/global','Custom\GrowController@global');
        Route::post('saveColorSettings','Custom\GrowController@saveColorSettings');
        Route::post('settings/roomAjax','Custom\GrowController@settingsRoomAjax');

        
        Route::get('mgt_gui','Custom\GrowController@mgtGUI');
        Route::post('roomAjax','Custom\GrowController@roomAjax');
        Route::get('getroomAjax','Custom\GrowController@getroomAjax');
        Route::get('getplantAjax','Custom\GrowController@getplantAjax');
        Route::post('ajaxSearchGrowTable','Custom\GrowController@ajaxSearchGrowTable');
        Route::post('ajaxRequestGrowModal','Custom\GrowController@ajaxRequestGrowModal');
        Route::post('plantAjaxFileUpload','Custom\GrowController@plantAjaxFileUpload');

        Route::post('growAreaAdd','Custom\GrowController@growAreaAdd');
        Route::post('growAreaEdit','Custom\GrowController@growAreaEdit');
        Route::post('growAreaAjax','Custom\GrowController@growAreaAjax');

        Route::get('growing/index','Custom\GrowController@growIndex');
        Route::post('growing/growingAddGrow','Custom\GrowController@growingAddGrow');
        Route::post('growingAjax','Custom\GrowController@growingAjax');

        Route::get('history/index','Custom\GrowController@historyIndex');
        Route::post('history/searchResult','Custom\GrowController@historySearchResult');
    });
    /* End*/

    /* ###########------------POS route-------------------##########*/
    Route::group(['prefix' => 'cashdesk', 'as' => 'cashdesk.'], function(){
        Route::get('affIndex','CashDesk\POSController@affIndex');
    });
    /* ##########-----------societe---------------------########### */
    Route::group(['prefix' => 'societe', 'as' => 'societe.'], function(){
        Route::get('modal_card','Societe\SocieteController@modal_card');
        Route::get('pos_consumption','Societe\SocieteController@pos_consumption');
        
    });

    /* ##########-------------Product-------------------########### */
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('index','Product\ProductController@index');
        Route::get('createWareHouse','Product\ProductController@createWareHouse');
        Route::get('card','Product\ProductController@card');
        Route::post('getProduct','Product\ProductController@getProduct');
        Route::get('productNameList','Product\ProductController@productNameList');

        Route::get('viewAllProducts','Product\ProductController@viewAllProducts');
    });


});


