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
        Route::get('manage/{id?}','Customer\CustomerManagerController@index');
        Route::get('edit/{id}','Customer\CustomerManagerController@edit');
        Route::get('new','Customer\CustomerManagerController@add');
        Route::post('save','Customer\CustomerManagerController@store');
        
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
        //Route::get('pos_consumption/{socid?}','Societe\SocieteController@pos_consumption');
    });


});


